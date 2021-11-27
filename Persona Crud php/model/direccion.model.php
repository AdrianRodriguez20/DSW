<?php

class Direccion extends ModeloBase {

	private $calle;
    private $cp;
    private $provincia;
    private $numero;
	
	function __construct() {
		parent::__construct();
		$this->tabla = "persona";
		$this->clavePrimaria = "dni";
	}


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
