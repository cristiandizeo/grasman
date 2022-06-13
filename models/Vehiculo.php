<?php

namespace Model;

class Vehiculo extends ActiveRecord
{

    // Base DE DATOS
    protected static $tabla = 'vehiculos';
    protected static $columnasDB = ['id', 'patente', 'tipo', 'marca', 'modelo', 'year', 'combustible', 'caja', 'precio', 'km', 'imagen', 'descripcion'];


    public $id;
    public $patente;
    public $tipo;
    public $marca;
    public $modelo;
    public $year;
    public $combustible;
    public $caja;
    public $precio;
    public $km;
    public $imagen;
    public $descripcion;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->patente = $args['patente'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->marca = $args['marca'] ?? '';
        $this->modelo = $args['modelo'] ?? '';
        $this->year = $args['year'] ?? '';
        $this->combustible = $args['combustible'] ?? '';
        $this->caja = $args['caja'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->km = $args['km'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
    }

    public function validar()
    {

        if (!$this->patente) {
            self::$errores[] = "Debes agregar una patente";
        }
        if (!$this->tipo) {
            self::$errores[] = 'Debes indicar el tipo de vehiculo';
        }
        if (!$this->marca) {
            self::$errores[] = 'Debes agregar una marca';
        }
        if (!$this->modelo) {
            self::$errores[] = 'Debes agregar el modelo';
        }
        if (!$this->year) {
            self::$errores[] = 'Debes agregar el año de fabricación';
        }
        if (!$this->combustible) {
            self::$errores[] = 'Debes agregar el tipo de combustible';
        }
        if (!$this->caja) {
            self::$errores[] = 'Debes indicar el tipo de caja';
        }
        if (!$this->precio) {
            self::$errores[] = 'Debes agregar el precio';
        }
        if (!$this->km) {
            self::$errores[] = 'Debes agregar el kilometraje';
        }
        if (!$this->id) {
            $this->validarImagen();
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
        }
        return self::$errores;
    }

    public function validarImagen()
    {
        if (!$this->imagen) {
            self::$errores[] = 'Debes agregar alguna imagen';
        }
    }
}
