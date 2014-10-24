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
         <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
         <title>Nosotros</title>
        <!-- <link href="http://www.dafont.com/es/the-dead-saloon.font/css?family=thedeadsaloon-regular" type="text/css" rel="stylesheet" />-->
        <!--<link rel="stylesheet" href="../css/slider.css" type="text/css" />-->
         <link rel="stylesheet" href="../css/cssGeneral.css" type="text/css"/>
      </head>
    <body>      
<!--::::::::::::::::::::::::INICIO HEADER Y MENÚ ::::::::::::::::::::::::::::-->
        <?php include_once './components/header.php'; ?>          
        <section class="ScrollContenedor"> 
<!--::::::::::::::::::::::::INICIO SESIÓN:::::::::::::::::::::::::::::::::::-->           
            <nav id="usuario-sesion">                
                <br></br>
                <div>
                    <?php echo " ".
                        ucfirst(strtolower($_SESSION['nombre']))." ".
                        ucfirst(strtolower($_SESSION['apellido']));
                   ?>
                </div>
            </nav>
            <br></br>
            <h1>Western Intelligent System Venezuela</h1>
<!--::::::::::::::::::::::::INICIO PRESENTACION:::::::::::::::::::::::::::::::::::-->     
                <section id="presentacion">
                        <section id="innodite">
                             <img src="../img/innodite.png"/>
                             <p>Innodite es uns empresa tecnológica que busca continuamente mejorar la calidad tanto de entornos productivos 
                                como de nuestra cotidianidad, desarrollando e implementando con carácter 
                                creativo e innovador tecnologías de punta al servicio de nuestros clientes.</p>
                        </section>
                        <section id="asovaqueros">
                             <img src="../img/asovaqueros.png"/>
                             <p>Asovaqueros Bolívar, Asovaqueros Bolívar, Asovaqueros Bolívar, Asovaqueros Bolívar,
                             Asovaqueros Bolívar, Asovaqueros Bolívar, Asovaqueros Bolívar Asovaqueros Bolívar 
                             </p>
                        </section>  
                       
                </section> 
        </section>   <!-- :::::::::::: CIERRE SECTION CONTENEDOR:::::::::::::::::::::-->               
<!--:::::::::::::::::::::::::::INICIO FOOTER ::::::::::::::::::::::::::::::::-->
    <?php include_once './components/footer.php'; ?>   
    </body>
</html>


