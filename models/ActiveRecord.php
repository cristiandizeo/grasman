<?php

namespace Model;

class ActiveRecord
{

    // Base DE DATOS
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Errores
    protected static $errores = [];


    // Definir la conexión a la BD
    public static function setDB($database)
    {
        self::$db = $database;
    }

    // Validación
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
        static::$errores = [];
        return static::$errores;
    }

    // Registros - CRUD
    public function guardar()
    {
        $resultado = '';
        if (!is_null($this->id)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Buscar registros 
    public static function where($columna, $valor, $limit = null, $offset = null, $args = null)
    {
        $valores = [];
        if($args){
        foreach ($args as $key => $value) {
            if ($value != "") {
                $valores[] = "{$key}='{$value}'";
            }
        }
    }

        $query = "SELECT * FROM " . static::$tabla  . " WHERE ${columna} = '${valor}'";
        
        if (count($valores) > 0) {
            $query .= " AND " . join(' AND ', $valores);
        }
        if($limit){
        $query .= " LIMIT ${limit}";
    }
        if($offset){
        $query .= " OFFSET ${offset}";
    }
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function buscador()
    {
        $valores = [];
        foreach (static::$columnasDB as $columna) {
            $valores[] = "$columna";
        }
        $resultado = [];
        $contador = count($valores);
        for ($i = 0; $i < $contador; $i++) {
            $query = "SELECT";
            $query .= " DISTINCT " . $valores[$i];
            $query .= " FROM " . static::$tabla;
            $query .= " WHERE visible = 1";
            
            $resultado[$i] = self::consultarSQL($query);
        }
        return $resultado;
    }

    // Busca un registro por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla  . " WHERE id = ${id}";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    // crea un nuevo registro
    public function crear()
    {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        // Resultado de la consulta
        $resultado = self::$db->query($query);
        return $resultado;
    }


    public function lastId()
    {
        $resultado = static::$db->insert_id;
        return $resultado;
    }
    public function actualizar()
    {

        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .=  join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        return $resultado;
    }

    // Eliminar un registro
    public function eliminar()
    {
        // Eliminar el registro
        $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();
        }

        return $resultado;
    }

    public static function consultarSQL($query)
    {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // liberar la memoria
        $resultado->free();

        // retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }



    // Identificar y unir los atributos de la BD
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    // Subida de archivos
    public function setImagen($imagen)
    {
        // Elimina la imagen previa
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->name = $imagen;
        }
    }
    public static function imgId()
    {
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'vehiculoId') {
                $query = "SELECT name," . $columna;
                $query .= " FROM " . static::$tabla;
                $query .= " GROUP BY " . $columna;
                $resultado = self::consultarSQL($query);
                // debuguear($resultado);
                return $resultado;
            }
        }
    }

    // Elimina el archivo
    public function borrarImagen()
    {
        // Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . trim($this->name));
        
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . trim($this->name));
        }
    }
}