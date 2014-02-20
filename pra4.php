<?php 
class Tablador{
    public function imprimeTabla( $opcionales ){
        $ini= isset($opcionales['ini'])?$opcionales['ini']:1;
        $fin= isset($opcionales['fin'])?$opcionales['fin']:12;
        for($i=$ini;$i<=$fin;$i++){
			$tabla="<table><tr><th colspan=5>Tabla del $i</th></tr>";
            for($j=1;$j<=10;$j++){
                $tabla.= "<tr><td>$i</td><td>*</td><td>$j</td><td>=</td><td>".($i*$j).'</td></tr>';
            }
            $tabla.='</table>';
            echo $tabla,'<br/>';
        }
    }
}

$tablaObj = new Tablador;
if( isset($_GET) )
    $tablaObj->imprimeTabla($_GET);
