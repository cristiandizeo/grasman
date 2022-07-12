<?php
namespace Model;

class File extends ActiveRecord {
    protected static $tabla = 'files';
    protected static $columnasDB = ['id', 'name', 'vehiculoId'];

    public $id;
    public $name;
    public $vehiculoId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->vehiculoId = $args['vehiculoId'] ?? null;
    }

}