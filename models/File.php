<?php
namespace Model;

class File extends ActiveRecord {
    protected static $tabla = 'files';
    protected static $columnasDB = ['id', 'name', 'orden', 'vehiculoId'];

    public $id;
    public $name;
    public $orden;
    public $vehiculoId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->orden = $args['orden'] ?? '';
        $this->vehiculoId = $args['vehiculoId'] ?? null;
    }

}