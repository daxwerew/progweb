<?php
	if( isset($_GET['controlador']) ){
		switch( $_GET('controlador') ){
			case 'alumno':
				//Llamar al controlador
				require('ctrls/alumnosCtrl.php');
				$controlador = new alumnosCtrl();
			break;
		}
	}else{
		//Llamar al controlador default
		require('ctrls/alumnosCtrl.php');
		$controlador = new alumnosCtrl();
		
	}
	
	
	$controlador->ejecutar();
	
	
