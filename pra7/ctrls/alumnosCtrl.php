<?php
class alumnosCtrl{
	public $modelo;
	function __construct(){
		//Definimos el modelo
		require('mdls/alumnosMdl.php');
		$this->modelo = new alumnosMdl();
	}
	
	function ejecutar(){
		if( isset($_GET['accion']) ){
			switch( $_GET['accion'] ){
				case 'insertar':
					//Validar datos
					if( !isset($_GET['alumno_nombre']) || empty($_GET['alumno_nombre']) ){
						$error='no se recibio alumno para insertar';
						require('vistas/error.php');
					}

					if( !preg_match("/^([a-z| ]+$/i",$_GET['alumno_nombre']) ){
						$error='nombre de alumno no convencional';
						require('vistas/error.php');
						die;
					}

					$nombre = $_GET['alumno_nombre'];

					
					//Ahora si le hablo al modelo
					$status = $this->modelo->insertar($nombre);
					if( $status ){
						//Cargo vista de bien hecho
						require('vistas/alumnoInsertado.php');
					}else{
						require('vistas/error.php');
					}
					break;
			}
		}else{
			$error='No hay accion';
			require('vistas/error.php');
		}
	}
}
