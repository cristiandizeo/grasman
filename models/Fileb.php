<?php
namespace Model;

class Fileb extends ActiveRecord {
    protected static $tabla = 'filesb';
    protected static $columnasDB = ['id', 'name', 'bicicletaId'];

    public $id;
    public $name;
    public $bicicletaId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->bicicletaId = $args['bicicletaId'] ?? null;
    }

}