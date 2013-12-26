<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reportes</title>
        <link rel="stylesheet" href="../css/cssReportes.css" type="text/css">
        <link rel="stylesheet" href="../css/cssGeneral.css" type="text/css">
        <script type="text/javascript" src="../js/utils.js"></script>
        <script type="text/javascript" src="../js/jsReportes.js"></script>
    </head>
    <body>
        <div align="center">
            <section id="contenedor">
        <table>
            <h1>Reportes</h1>
            <tr>
                <td><label>Fecha de Competencia</label></td>
                <td><label>Competencia</label></td>
                <td><label>Buscar Competencia</label></td>
                
            </tr>
            <tr>
                <td><input type="date" id="fecha" onkeyup="buscarCompetencia()"></td>
                <td><select id="competencia"></select></td>
                <td><img id="IC" src="../img/play11.png" width="30" height="30" onclick="mostrarCompetencia()" title="Mostrar Competencia"></td>
                <td> 
                    <div id="fin" style="visibility:hidden">
                        <img id="FC" src="../img/log.png" width="30" height="30" onclick="finComp()" title="Finalizar Competencia">
                    </div>
                </td>
            </tr>
        
        
        
        </table>
                <div id="list"></div>
                <aside id="rankings">
                    <article><div id="rank"></div></article>
                    <article id="general"><div id="rankG"></div></article>
                </aside>
                   
                        
                        
                        
        </section>
        </div>
    </body>
</html>