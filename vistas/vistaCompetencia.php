<?php
    session_start();
    if (!isset($_SESSION['perfil']))
        header("Location: ../index.php");
?>
<!--Desarrollado por Innodite 
    RIF:  J-40270256-6
    Contacto
        Javier Urbano     0416-583.38.09
        Anthony Filgueira 0426-594.00.45
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro De Competencias</title>
        <link rel="stylesheet" href="../css/cssCompetencia.css" type="text/css">
        <link rel="stylesheet" href="../css/cssGeneral.css" type="text/css">
        <script type="text/javascript" src="../js/utils.js"></script>
        <script type="text/javascript" src="../js/jsCompetencia.js"></script>
    </head>
    <body>
           <header id="logo-menu">
              <a href= "vistaPrincipal.php"><img id="logo" src="../img/asovaqueros.png"/></a>
          
        </header> 
<!--::::::::::::::::::::::::INICIO CONTENEDOR:::::::::::::::::::::::::::::::::::-->                
            <section id="contenedor">

<!--::::::::::::::::::::::::INICIO SESIÓN Y MENÚ:::::::::::::::::::::::::::::::::::-->
<!--:::::::::::::::::::::::::::::: SESIÓN :::::::::::::::::::::::::::::::::::-->           
            <nav id="usuario-sesion">
                    <br></br>
                    <div>
                        <?php echo "".
                                ucfirst(strtolower($_SESSION['nombre']))." ".
                                ucfirst(strtolower($_SESSION['apellido']));
                        ?>
                    </div>
 <!--::::::::::::::::::::::::::::::::MENÚ:::::::::::::::::::::::::::::::::::-->             
                    <div id="posicion-menu"><?php include 'vistaMenu.php';?></div>
                    <div> <a href="../sesion.php"><img id="logo-off" src="../img/off.png" title="Salir"></a></div>
            </nav>
<!--::::::::::::::::::::::::FIN SESIÓN Y MENÚ:::::::::::::::::::::::::::::::::::-->
            <br></br>
            <h1>REGISTRO DE COMPETENCIAS</h1>
                <section id="competencia">
                    <form> <!-- action="../controladores/ctrCompetencia.php" method="POST" -->
                        <table>
                            <tr>
                                <td><label>Fecha</label></td>
                                <td><label>Competencia</label></td>
                                <td><label>Categoria</label></td>
                                <td><label>% Premio</label></td>
                                <td><label>% Casa</label></td>
                                <td><label>Inscripcion</label></td>
                                <td><label>Vueltas</label></td>
                            </tr>
                            <tr>
                                <td><input id="date" type="date" name="dateFecha" value="" required></td>
                                <td><select id="tipo_comp"></select></td>
                                <td><select id="categoria"></select></td>
                                <td><input class="size" id="premio" type="text" name="txtPremio" onkeyup="evalPorcUp('premio','casa')" required></td>
                                <td><input class="size" id="casa" type="text" name="txtCasa" readonly="" required></td>
                                <td><input id="inscripcion" type="text" name="txtInscripcion" required></td>
                                <td><input class="size" id="rondas" type="text" name="txtVueltas" required></td>
                                <td>
                                    <img id="imgadd" title="Agregar" src="../img/add_med.png" onclick="cargar()">
                                    <img id="imgbus" title="Buscar" src="../img/lupa_med.png" onclick="buscar()">
                                </td>
                            </tr>
                        </table>
                    </form>
                </section>
                <div id="list"></div>
            </section>
<!-- :::::::::::::::::::::: FIN CONTENEDOR::::::::::::::::::::::::::::-->                  
        <footer>                
            <p id="footer">Copyright © 2014 Western Intelligent System Venezuela</p>
        </footer>         
          
    </body>
</html>