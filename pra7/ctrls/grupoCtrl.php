<?php
class grupoCtrl{
	public $modelo;
	function __construct(){
		//Definimos el modelo
		require('mdls/grupoMdl.php');
		$this->modelo = new grupoMdl();
	}

	function ejecutar(){
		if( !isset($_GET['accion']) ){
			$error='no hay accion';
			require('vistas/error.php');
			die;
		}

		switch( $_GET['accion'] ){
			case 'consulta':
				//Validar datos
				//Datos requeridos
				if( !isset($_GET['seccion']) ){
					$error='no se indico grupo';
					require('vistas/error.php');
					die;
				}
				if( !preg_match("/^([a-z]{2}\d{3}|[a-z]?\d{4})-[a-z]\d{2}$/i",$_GET['seccion']) ){
					$error='grupo incorrecta';
					require('vistas/error.php');
					die;
				}
				//Datos opcionales
				if( !isset($_GET['orden'])){
					$_GET['orden']='';
				}


				//Llamada al modelo	
				$listaAlumnos = $this->modelo->listaEstudiantes($_GET['seccion'],$_GET['orden']);
				//Carga vista dependiendo de la respuesta del modelo
				if( is_array($listaAlumnos) ){
					require('vistas/grupoLista.php');
				}else{
					$error='falla interna';
					require('vistas/error.php');
				}
				break;
			default:
				$error='accion incorrecta';
				require('vistas/error.php');
		}
	}
}
