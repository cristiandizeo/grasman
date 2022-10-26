<?php
namespace Model;

class Fileb extends ActiveRecord {
    protected static $tabla = 'filesb';
    protected static $columnasDB = ['id', 'name', 'orden', 'bicicletaId'];

    public $id;
    public $name;
    public $orden;
    public $bicicletaId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->orden = $args['orden'] ?? null;
        $this->bicicletaId = $args['bicicletaId'] ?? null;
    }

}