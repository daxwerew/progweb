<?php
class alumnosMdl{
	public $bd_driver;
	
	function __construct(){
		//podrias aqui construir manejador bd
	}
	
	function insertar($nombre){
		//Va ir a insertar a la base de datos
		
		//si todo salio bien
		return true;
		//sino
		return false;
	}
}
