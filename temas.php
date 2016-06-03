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
    <title>LISTADO TEMAS</title>
  </head>
  <body>
  <table border="5" id="tablita" style="margin-top:10px; margin-bottom:10px;">
  <tr>
    <td><b><a href="usuarios.php"> Usuarios </a></td></b>
    <td><b><a href="foros.php">Foros</a></td></b>
    <td><b><a href="temas.php">Temas</a></td></b>
    <td><b><a href="post.php">Post</a></td></b>
    <td><b><a href="comentarios.php">Comentarios</a></td></b>
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
          if ($result = $connection->query("SELECT temas.*, foro.nombre_foro FROM temas, foro WHERE temas.id_foro=foro.id_foro;")) {
            ///  printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    }
    ?>
<table border="1" id="tabla">
  <tr>
    <td><b>id_foro</td></b>
	<td><b>nombre_foro</td></b>
	<td><b>id_tema</td></b>
    <td><b>nombre_tema</td></b>
    <td><b>Descripcion</td></b>
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
                   echo "<td>".$obj->id_foro."</td>";
				   echo "<td>".$obj->nombre_foro."</td>";
				   echo "<td>".$obj->id_tema."</td>";
                   echo "<td>".$obj->nombre_tema."</td>";
                   echo "<td>".$obj->descripcion."</td>";
				   echo "<td><a href='editartema.php?id=".$obj->id_tema."'><img src='editar.jpg'></td>";
				   echo "<td><a href='eliminartema.php?id=".$obj->id_tema."'><img src='borrar.jpg'></td>";
                   echo "</tr>";
               }
      ?>
    </table>
	<p>
	</a><input name="anadirusu" a class='ajax' href="anadirtema.php" title="Añadir temas" type="submit" id="boton" value="Añadir" style="margin-left:300px" class="boton"/ ></p>
<script src="jquery.min.js"></script>
<script src="jquery.colorbox.js"></script>
<script>
 $(".ajax").colorbox();
</script>

</body>
</html>
