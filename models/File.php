<?php
namespace Model;

class File extends ActiveRecord {
    protected static $tabla = 'files';
    protected static $columnasDB = ['id', 'imagen', 'vehiculoId'];

    public $id;
    public $imagen;
    public $vehiculoId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->imagen = $args['imagen'] ?? '';
        $this->vehiculoId = $args['vehiculoId'] ?? '';
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
    if (!$this->imagen) {
        self::$errores[] = 'Debes agregar alguna imagen';
    }
}
}