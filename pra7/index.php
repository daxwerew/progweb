<?php
	if( isset($_GET['controlador']) ){
		switch( $_GET['controlador'] ){
			case 'alumno':
				//Controlador Alumnos
				require('ctrls/alumnosCtrl.php');
				$controlador = new alumnosCtrl();
			break;
			case 'grupo':
				//Controlador Grupos
				require('ctrls/grupoCtrl.php');
				$controlador = new grupoCtrl();
			break;
			default:
				$error='controlador incorrecto';
				require('vistas/error.php');
				die;
		}
	}else{
		//Controlador default
		require('ctrls/alumnosCtrl.php');
		$controlador = new alumnosCtrl();
		
	}
	
	
	$controlador->ejecutar();
	
	
