<?php

namespace Model;

class Vehiculo extends ActiveRecord {

    // Base DE DATOS
    protected static $tabla = 'vehiculos';
    protected static $columnasDB = ['id', 'patente', 'precio', 'imagen', 'descripcion', 'tipo', 'marca', 'modelo', 'year', 'km', 'combustible', 'caja'];


    public $id;
    public $patente;
    public $precio;
    public $imagen;
    public $descripcion;
    public $tipo;
    public $marca;
    public $modelo;
    public $year;
    public $km;
    public $combustible;
    public $caja;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->patente = $args['patente'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->marca = $args['marca'] ?? '';
        $this->modelo = $args['modelo'] ?? '';
        $this->year = $args['year'] ?? '';
        $this->km = $args['km'] ?? '';
        $this->km = $args['combustible'] ?? '';
        $this->km = $args['caja'] ?? '';
    }

    public function validar() {

        if(!$this->patente) {
            self::$errores[] = "Debes añadir un patente";
        }

        if(!$this->precio) {
            self::$errores[] = 'El Precio es Obligatorio';
        }

        if( strlen( $this->descripcion ) < 50 ) {
            self::$errores[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
        }

        if(!$this->tipo) {
            self::$errores[] = 'El Número de tipo es obligatorio';
        }
        
        if(!$this->marca) {
            self::$errores[] = 'El Número de Baños es obligatorio';
        }

        if(!$this->modelo) {
            self::$errores[] = 'El Número de lugares de modelo es obligatorio';
        }
        
        if(!$this->km) {
            self::$errores[] = 'Elige un vendedor';
        }

        if(!$this->id )  {
            $this->validarImagen();
        }
        return self::$errores;
    }

    public function validarImagen() {
        if(!$this->imagen ) {
            self::$errores[] = 'La Imagen es Obligatoria';
        }
    }

}