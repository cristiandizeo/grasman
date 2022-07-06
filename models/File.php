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

    public function validar()
    {
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
    if (!$this->name) {
        self::$errores[] = 'Debes agregar alguna imagen';
    }
}
}