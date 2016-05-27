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
    <title>LISTADO POST</title>
  </head>
  <body>
  <table border="5" id="tablita">
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
          if ($result = $connection->query("SELECT post.id_post,post.nombre_post,post.fechahora_creacion,temas.nombre_tema,temas.id_tema,foro.nombre_foro,left(post.texto_post,50) as textocortado FROM post,temas,foro where post.id_tema=temas.id_tema and temas.id_foro=foro.id_foro;")) {
//              printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    }
    ?>
<table border="1" id="tabla">
  <tr>
	<td><b>nombre_foro</td></b>
    <td><b>id_tema</td></b>
	<td><b>nombre_tema</td></b>
	<td><b>id_post</td></b>
    <td><b>nombre_post</td></b>
    <td><b>fechahora_creacion</td></b>
	<td><b>texto_post</td></b>
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
				   echo "<td>".$obj->nombre_foro."</td>";
                   echo "<td>".$obj->id_tema."</td>";
				   echo "<td>".$obj->nombre_tema."</td>";
				   echo "<td>".$obj->id_post."</td>";
                   echo "<td>".$obj->nombre_post."</td>";
                   echo "<td>".$obj->fechahora_creacion."</td>";
				   echo "<td>".$obj->textocortado."</td>";
				   echo "<td><a href='editarpost.php?id=".$obj->id_post."'><img src='editar.jpg'></td>";
				   echo "<td><a href='eliminarpost.php?id=".$obj->id_post."'><img src='borrar.jpg'></td>";
                   echo "</tr>";
               }
      ?>

    </table>
	<p>
	</a><input name="anadirpost" a class='ajax' href="anadirpost.php" title="Añadir post" type="submit" id="boton" value="Añadir" class="boton"/></p>
<script src="jquery.min.js"></script>
<script src="jquery.colorbox.js"></script>
<script>
 $(".ajax").colorbox();
</script>

</body>
</html>
