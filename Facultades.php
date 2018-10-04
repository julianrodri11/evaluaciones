<?php

/**
* 
*/
class Facultades
{
	private $_idfacultad;
	private $_facultad;

	function __construct($idfacultad,$facultad)
	{
		$this->$_idfacultad=$idfacultad;
		$this->$_facultad=$facultad;
	}

	public function consultarFacultades()
	{
		return $this->datos();
	}

	public function datos()
	{
		return "array de datos";
	}

}

?>