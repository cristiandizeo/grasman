<?php

namespace Model;

class Vehiculo extends ActiveRecord
{

    // Base DE DATOS
    protected static $tabla = 'vehiculos';
    protected static $columnasDB = ['id', 'patente', 'tipo', 'estado', 'marca', 'modelo', 'year', 'combustible', 'caja', 'precio', 'km', 'descripcion', 'visible'];


    public $id;
    public $patente;
    public $tipo;
    public $estado;
    public $marca;
    public $modelo;
    public $year;
    public $combustible;
    public $caja;
    public $precio;
    public $km;
    public $descripcion;
    public $visible;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->patente = $args['patente'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->marca = $args['marca'] ?? '';
        $this->modelo = $args['modelo'] ?? '';
        $this->year = $args['year'] ?? '';
        $this->combustible = $args['combustible'] ?? '';
        $this->caja = $args['caja'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->km = $args['km'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->visible = $args['visible'] ?? 0;
    }

    public function validar()
    {

        if (!$this->patente || !$this->tipo || !$this->estado || !$this->marca || !$this->modelo || !$this->year || !$this->combustible || !$this->caja || !$this->precio || !$this->km) {
            self::$errores[] = "Por favor revisá el formulario";
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
        }
}
}