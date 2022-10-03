<?php
namespace Model;

class Imagenes extends ActiveRecord {
    protected static $tabla = 'imagenes';
    protected static $columnasDB = ['id', 'name', 'seccion'];

    public $id;
    public $name;
    public $seccion;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->seccion = $args['seccion'] ?? null;
    }

}