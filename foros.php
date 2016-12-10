<?php

session_start();

    if (isset($_SESSION['tipoacceso'])&&($_SESSION['tipoacceso']=='admin')){
        echo "";
    }
    else {
        echo "<h2>Acceso denegado, redireccionando...</h2>";
        echo "<style>div {display:none;}<style>";
    header('Refresh:1; url=indexlolo.php',True,303);
}
?>
<?php
include("db_configuration.php");
?>
<html lang="en">
  <head>
<link type="text/css" href="colorbox.css" rel="stylesheet" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTADO FOROS</title>
  </head>
  <body>
  <table border="5" id="tablita">
  <tr>
    <td><b><a href="usuarios.php"> Usuarios </a></td></b>
    <td><b><a href="foros.php">Foros</a></td></b>
    <td><b><a href="temas.php">Temas</a></td></b>
    <td><b><a href="post.php">Post</a></td></b>
    <td><b><a href="comentarios.php">Comentarios</a></td></b>
	<td><b><a href="grafica.php">Grafica</a></td></b>
	<td><b><a href="verpdf.php">Generar PDF</a></td></b>
	<td><b><a href="indexlolo.php">Inicio</a></td></b>
    </tr>
    <tr>

    </table>
    <?php

          //CREATING THE CONNECTION
          $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $mysqli->connect_error);
              exit();
          }
          //MAKING A SELECT QUERY
          /* Consultas de selección que devuelven un conjunto de resultados */
          if ($result = $connection->query("SELECT * FROM foro;")) {
///              printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    }
    ?>
<table border="1" id="tabla">
  <tr>
    <td><b>id_usuario</td></b>
    <td><b>id_foro</td></b>
    <td><b>nombre foro</td></b>
	<td><b>Editar</td></b>
	<td><b>Borrar</td></b>
    </tr>
    <tr>
      <?php
               //FETCHING OBJECTS FROM THE RESULT SET
               //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
               while($obj = $result->fetch_object()) {
                   //PRINTING EACH ROW
                   echo "<tr>";
				   echo "<td>".$obj->id_usuario."</td>";
                   echo "<td>".$obj->id_foro."</td>";
                   echo "<td>".$obj->nombre_foro."</td>";
				   echo "<td><a href='editarforo.php?id=".$obj->id_foro."'><img src='editar.jpg'></td>";
				   echo "<td><a href='eliminarforo.php?id=".$obj->id_foro."'><img src='borrar.jpg'></td>";
                   echo "</tr>";
               }
      ?>

    </table>
	<p>
	</a><input name="anadirforos" a class='ajax' href="anadirforo.php" title="Añadir foro" type="submit" id="boton" value="Añadir" class="boton"/></p>
<script src="jquery.min.js"></script>
<script src="jquery.colorbox.js"></script>
<script>
 $(".ajax").colorbox();
</script>

</body>
</html>
