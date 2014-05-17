<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'clsConexion.php';
include '../controladores/ctrPdf.php';
$comp = $_GET['comp'];


    $bd = new clsConexion();
    $heade = array('jose','1','2.134');
    $header = array('Competidor','Tiempo','Vuelta','Salida');
    $pdf = new ctrPdf();
    $pdf->SetFont('Arial','',10);
    $pdf->AddPage();
    $pdf->BasicTable($header);
    $sql = "SELECT nombre,tiempo,vuelta,salida,id_competencia
FROM ranking rank,inscripcion insc,competidor compe 
WHERE rank.id_inscripcion = insc.id_inscripcion 
AND insc.cedula = compe.cedula AND insc.id_competencia="."$comp"."";
    $datos = $bd->filtro($sql);
    $out = array();
        while($columna = $bd->proximo($datos)){
                     $out[] = array(
                         'nombre'=>$columna[0],
                         'tiempo'=>$columna[1],
                         'vuelta'=>$columna[2],
                         'salida'=>$columna[3]); 
                      
                }
                $bd->cerrarFiltro($datos);
		$bd->cerrarConexion();
    $pdf->DinamicTable($out);
    $pdf->Output('exacto.pdf','I');
  
?>