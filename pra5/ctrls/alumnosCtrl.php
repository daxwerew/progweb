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
					//$nombre = $this->validaTexto($_POST['nombre']);
					//Ahora si le hablo al modelo
					$status = $this->modelo->insertar('jose');
					if( $status ){
						//Cargo vista de bien hecho
						require('vistas/alumnoInsertado.php');
					}else{
						require('vistas/error.php');
					}
					break;
				case 'consulta':
					//Validar datos
					if( isset($_GET['seccion']) ){
						if( preg_match("/D\d+/i",$_GET['seccion']) ){
							
							$listaAlumnos = $this->modelo->consulta($_GET['seccion']);
							if( is_array($listaAlumnos) ){
								//Cargo vista de bien hecho
								require('vistas/alumnoLista.php');
							}else{
								require('vistas/error.php');
							}
							
						}else{
							require('vistas/error.php');
						}
					}else{
						require('vistas/error.php');
					}
					break;
			}
		}else{
			require('vistas/error.php');
		}
	}
}
