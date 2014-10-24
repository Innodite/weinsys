<?php
    session_start();
    if (!isset($_SESSION['perfil']))
        header("Location: ../index.php");
?>
<!--
Desarrollado por www.innodite.com
    RIF:  J-40270256-6
    Contacto
        Javier Urbano     0416-583.38.09
        Anthony Filgueira 0426-594.00.45
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modo De Competencia</title>
        
         <link rel="stylesheet" href="../css/cssGeneral.css" type="text/css"/>
        <script type="text/javascript" src="../js/utils.js"></script>
        <script type="text/javascript" src="../js/jsModoCompetencia.js"></script>
    </head>
    <body >
<!--::::::::::::::::::::::::INICIO HEADER Y MENÚ ::::::::::::::::::::::::::::-->
        <?php include_once './components/header.php'; ?>
<!--::::::::::::::::::::::::INICIO CONTENEDOR:::::::::::::::::::::::::::::::::::-->                
        <section class="ScrollContenedor">
        
<!--::::::::::::::::::::::::INICIO SESIÓN:::::::::::::::::::::::::::::::::::-->
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
            <h1>TIPO DE COMPETENCIA</h1>       
        <section id="modCompetencia">
            <form>
                <table>
                    <tr>
                        <td>Modo de Competencia</td>
                        <td>Modalidad</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txtNombre" id="txtNombre" value="" autofocus required>
                        </td>
                        <td>
                            <select id="lblModalidad">
                                <option  value="individual">Individual</option>
                                <option  value="grupo">Grupo</option>
                            </select>
                        </td>
                        <td> 
                            <img id="imgadd" title="Agregar" src="../img/add_med.png" onclick="cargar()">
                            <img id="imgbus" title="Buscar"  src="../img/lupa_med.png" onclick="buscar()">
                        </td>
                    </tr>                
                </table>
            </form>  
        </section>
                <div id="list"></div>
       </section>
<!-- :::::::::::::::::::::: FIN CONTENEDOR::::::::::::::::::::::::::::-->                  
<!--:::::::::::::::::::::::::::INICIO FOOTER ::::::::::::::::::::::::::::::::-->
    <?php include_once './components/footer.php'; ?>       
    </body>
   
</html>

