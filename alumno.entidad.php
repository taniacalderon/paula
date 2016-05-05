<?php

class Alumno
{
    private $identificacion;
    private $Nombres;
    private $Apellidos;
    private $telefono;
    private $direccion;
	private $correomisena;
	
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>