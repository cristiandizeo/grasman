<?php

namespace Model;

class Bicicleta extends ActiveRecord
{

    // Base DE DATOS
    protected static $tabla = 'bicicletas';
    protected static $columnasDB = ['id', 'tipo', 'marca', 'rodado', 'precio', 'descripcion', 'visible'];


    public $id;
    public $tipo;
    public $marca;
    public $rodado;
    public $precio;
    public $descripcion;
    public $visible;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->tipo = $args['tipo'] ?? '';
        $this->marca = $args['marca'] ?? '';
        $this->modelo = $args['rodado'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->visible = $args['visible'] ?? 0;
    }

}