<?php
include 'clsConexion.php';

class clsBarriles extends clsConexion{
    private $fecha;
    private $competencia;
    private $id_inscripcion;
    private $tiempo;
    private $ronda;
    private $total;
    private $salida;
    public function __construct($p=NULL) {
        parent::__construct();
        if (!is_null($p)){
            $this->fecha = $p['fecha'];
            $this->competencia = $p['competencia'];
            $this->id_inscripcion = $p['id_inscripcion'];
            $this->tiempo = $p['tiempo'];
            $this->ronda = $p['ronda'];
            $this->total = $p['total'];
            $this->salida = $p['salida'];
        }
    }
    public function __destruct(){}
    
public function cargarCompetencia(){
     $str = "<option value=''>Seleccione</option>";
                $sql = "select id_competencia,(mc.nombre,cat.nombre) as nombre FROM competencia as comp,modo_competencia as mc,categoria as cat WHERE comp.id_modo_competencia = mc.id_modo_competencia AND comp.id_categoria = cat.id_categoria AND sts='VAL' AND fecha = '$this->fecha'";
                $datos = $this->filtro($sql);
                while($columna = $this->proximo($datos)){
                         $str .= "<option value =$columna[0]>$columna[1]</option>";                                    
                }
                return $str;
}
public function iniciarCompetencia(){
       $update = "UPDATE competencia SET sts='EC' WHERE id_competencia='$this->competencia'";
       $this->filtro($update);
       
        $i = 1;
        $sql= "SELECT vueltas FROM competencia WHERE id_competencia= '$this->competencia'";
        $dats = $this->filtro($sql);
        $arreglo= $this->proximo($dats);
        $this->ronda = 1; 
        $this->total = $arreglo[0];
        $str = "<table id='competidores'> 
                
                <tr>
                    <td>Competidor</td>
                    <td>Vuelta</td>
                    <td>Tiempo</td>
                    <td><label>Ronda $this->ronda-$this->total&nbsp;&nbsp;</label><img id='flecha' src='../img/arrow455.png' width='25' height='25' title='Siguiente Ronda' onclick=\"nextRound($this->ronda,'$this->total','$this->competencia')\" ></td>
                </tr>";
        $r = $this->filtro("select id_inscripcion,comp.nombre,id_competencia "
                . "from inscripcion as insc,competidor as comp  "
                . "where insc.cedula= comp.cedula AND id_competencia= '$this->competencia'  "
                . "order by random()");
        
        $rt =  $this->getNumRows();
            while ($row = $this->proximo($r)) {
               $str .= "<tr>
                            
                            
                            <td >$row[1]</td>
                            <td> $this->ronda</td>
                            <td><input type='number' size='5' min='1' max='99.999' step='01.001'  id='tiempof$i' required/></td>
                                <td>
                                <img src='../img/notes7.png' width='25' height='25' id='agregarf$i' title='Agregar'  onclick=\"agregar(".$i.",'$row[0]','$row[2]','$this->ronda')\" >
                                
                            </td>
                        </tr>
                        
                        ";
               $i++;
            }
        $str .= "</table>";
        
        $this->cerrarConexion();
        return ($rt > 0) ? $str : "NULL";
}
public function agregarTiempo(){
  
 $a= $this->filtro("INSERT INTO ranking(id_inscripcion,salida,vuelta, tiempo) VALUES ($this->id_inscripcion,$this->salida,$this->ronda, $this->tiempo)") ? true : false;
 if ($a!= 1){
     return 'NULL';
 } else{
 $i = 1;
        $str = "<table id='ranking'> 
                <tr>
                    <td>Posicion</td>
                    <td>Competidor</td>
                    <td>Tiempo</td>
                </tr>";
        $r = $this->filtro("select nombre, tiempo FROM inscripcion as insc,competidor as comp,(select  DISTINCT ON (id_inscripcion) id_inscripcion , tiempo from ranking order by id_inscripcion,tiempo ASC) rank WHERE rank.id_inscripcion = insc.id_inscripcion AND insc.cedula=comp.cedula AND insc.id_competencia = $this->competencia order by rank.tiempo");
        $rt =  $this->getNumRows();
            while ($row = $this->proximo($r)) {
               $str .= "<tr>
                            <td>$i</td>
                            <td >$row[0]</td>
                            <td >$row[1]</td>
                          
                        </tr>
                        
                        ";
               $i++;
            }
        $str .= "</table>";
        $this->cerrarConexion();
        return ($rt >0) ? $str : "NULL";
  
 
 }
}

public function nextRound(){
    $i = 1;
    $this->ronda= $this->ronda +1;
    
    
   if($this->ronda <= $this->total){
      
        $str = "<table id='competidores'> 
                <tr>
                    
                    <td>Competidor</td>
                    <td>Vuelta</td>
                    <td>Tiempo</td>
                    <td><label>Ronda $this->ronda-$this->total&nbsp;&nbsp;</label><img src='../img/arrow455.png' width='25' height='25' title='Siguiente Ronda' onclick=\"nextRound($this->ronda,'$this->total','$this->competencia')\" ></td>
                </tr>";
        $r = $this->filtro("select id_inscripcion,comp.nombre,id_competencia "
                . "from inscripcion as insc,competidor as comp  "
                . "where insc.cedula= comp.cedula AND id_competencia= '$this->competencia'  "
                . "order by random()");
        
        $rt =  $this->getNumRows();
            while ($row = $this->proximo($r)) {
               $str .= "<tr>
                            
                            
                            <td >$row[1]</td>
                            <td> $this->ronda</td>
                            <td><input type='number' size='5' min='0' max='99.999' step='00.001'  id='tiempof$i' required/></td>
                            <td>
                                <img src='../img/notes7.png' width='25' height='25' id='agregarf$i' title='Agregar'  onclick=\"agregar(".$i.",'$row[0]','$row[2]','$this->ronda')\" >
                                
                            </td>
                        </tr>
                        
                        ";
               $i++;
            }
        $str .= "</table>";
        
        $this->cerrarConexion();
        return ($rt > 0) ? $str : " ";
   } 
}

public function rankGeneral(){
    $i = 1;
        $str = "<table id='rankG'> 
                <tr>
                    <td>Posicion</td>
                    <td>Competidor</td>
                    <td>Vuelta</td>
                    <td>Tiempo</td>
                </tr>";
        $r = $this->filtro("SELECT comp.nombre,vuelta,tiempo FROM inscripcion as insc,competidor as comp,ranking as rank WHERE rank.id_inscripcion= insc.id_inscripcion AND insc.cedula = comp.cedula ORDER BY vuelta,tiempo ASC");
        $rt =  $this->getNumRows();
            while ($row = $this->proximo($r)) {
               $str .= "<tr>
                            <td>$i</td>
                            <td >$row[0]</td>
                            <td >$row[1]</td>
                            <td >$row[2]</td>
                        </tr>
                        
                        ";
               $i++;
            }
        $str .= "</table>";
        $this->cerrarConexion();
        return ($rt > 0) ? $str : " ";
}
public function finCompetencia(){
   $update = "UPDATE competencia SET sts='FC' WHERE id_competencia='$this->competencia'";
    $this->filtro($update);
    $this->cerrarConexion();
        return 1;
}
}//Fin Clase

?>
