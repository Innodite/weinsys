<?php
    session_start();
    if (!isset($_SESSION['perfil']))
        header("Location: ../index.php");
?>
<!--Desarrollado por www.innodite.com
    RIF:  J-40270256-6
    Contacto
        Javier Urbano     0416-583.38.09
        Anthony Filgueira 0426-594.00.45
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
       
        <title>Inscripci&oacute;n</title>
        <link rel="stylesheet" href="../css/cssInscripcion.css" type="text/css">
        <link rel="stylesheet" href="../css/cssGeneral.css" type="text/css"/>
 

        <script type="text/javascript" src="../js/utils.js"></script>
        <script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/jsModIns.js"></script>
<!--        <script type="text/javascript" src="../js/jsInscripcion.js"></script>-->
        <style>
            .hack-ig {
                width: 30px;
            }
        </style>
    </head>
    <body>
<!--::::::::::::::::::::::::INICIO HEADER Y MENÚ ::::::::::::::::::::::::::::-->
        <?php include_once './components/header.php'; ?>
<!--::::::::::::::::::::::::INICIO CONTENEDOR:::::::::::::::::::::::::::::::::::-->                
        <section class="ScrollContenedor">

<!--::::::::::::::::::::::::INICIO SESIÓN :::::::::::::::::::::::::::::::::::-->
<!--:::::::::::::::::::::::::::::: SESIÓN :::::::::::::::::::::::::::::::::::-->           
            <nav id="usuario-sesion">
                    <br></br>
                    <div>
                        <?php echo "".
                                ucfirst(strtolower($_SESSION['nombre']))." ".
                                ucfirst(strtolower($_SESSION['apellido']));
                        ?>
                    </div>
            </nav>
<!--::::::::::::::::::::::::FIN SESIÓN Y MENÚ:::::::::::::::::::::::::::::::::::-->
                 <br></br>
                 <h1>INSCRIPCION DE COMPETIDORES</h1>
                 <section>                
        <form> <!-- action="../controladores/ctrInscripcion.php" method="POST" -->
          <div id="mi"><!--Inicio Modalidad Individual-->
            <table>
                <tr>
                    <td colspan="4" style="text-align: left">
                        I<input id="i" type="radio" name="asdf" class="hack-ig" value="i" checked>
                        G<input id="g" type="radio" name="asdf" class="hack-ig" value="g">
                    </td>   
                </tr>
                <tr>
                    <td>Cedula</td>
                    <td>Competidor</td>
                    <td>Fecha de Nacimiento</td>
                    <td>Competencia</td> 
                </tr>
                <tr>
                    <td><input  class="input" id="cedula"      type="text"                                required></td>
                    <td><input  class="input" id="nombre"      type="text"                                required></td>
                    <td><input  class="input" id="edad"        type="date"   placeholder="dd-mm-aaaa"     required></td>
                    <td><select class="input" id="competencia"></select>                                           </td>                     
                    <td>
                        <input id="comp" type="hidden" value="N">
                        <img id="imgadd"  title="Agregar" src="../img/add_med.png" >
                        <img id="imgbus"  title="Buscar"  src="../img/lupa_med.png">
                    </td>
                </tr>   
            </table>
                            </div> <!-- Fin Modalidad Individual-->
                            <div id="mg" hidden><!-- Inicio Modalidad Grupal-->
            <table>
                <tr>
                    <td colspan="4" style="text-align: left"> 
                        I<input id="i2" type="radio" name="asdf2" class="hack-ig" value="i2">
                        G<input id="g2" type="radio" name="asdf2" class="hack-ig" value="g2">
                    </td>
                </tr>
               <tr>
                    <td>Equipo</td>
                    <td>Competencia</td> 
               </tr>
               <tr>
                   <td><select class="input" id="equipos"></select></td>
                   <td><select class="input" id="competenciaE"></select> </td>
                   <td>
                        <img id="imgaddE"  title="Agregar" src="../img/add_med.png" >
                        <img id="imgbusE"  title="Buscar"  src="../img/lupa_med.png">
                   </td>
               </tr>
            </table>
                            </div>   <!--Fin Modalidad Grupal-->                         
        </form>
                </section>
            <div id="list"><table></table></div>
                </section>
<!-- :::::::::::::::::::::: FIN CONTENEDOR::::::::::::::::::::::::::::-->                  
<!--:::::::::::::::::::::::::::INICIO FOOTER ::::::::::::::::::::::::::::::::-->
    <?php include_once './components/footer.php'; ?>       
    </body>
</html>
