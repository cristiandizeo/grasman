<?php
namespace Model;

class Imagenes extends ActiveRecord {
    protected static $tabla = 'imagenes';
    protected static $columnasDB = ['id', 'name', 'orden', 'seccion'];

    public $id;
    public $name;
    public $orden;
    public $seccion;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->name = $args['orden'] ?? '';
        $this->seccion = $args['seccion'] ?? null;
    }

}