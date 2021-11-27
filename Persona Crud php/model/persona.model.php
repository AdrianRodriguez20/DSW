<?php


class Persona extends ModeloBase {

	private $nombre;
    private $apellidos;
    private $dni;
   	private $edad;
	private $direccion;
	
	function __construct() {
		parent::__construct();
		$this->tabla = "persona";
		$this->clavePrimaria = "dni";
	}

	 // METODOS (GET)
    public function __get($name)
	{
	  return $this->$name;
	}
 
	 // METODOS (SET)
	public function __set($name, $value)
	{
	  return $this->$name = $value;
	}


}


