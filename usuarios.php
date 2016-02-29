<?php
include_once("db_configuration.php");
?>
<html lang="en">
  <head>
<link type="text/css" href="colorbox.css" rel="stylesheet" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTADO USUARIOS</title>
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
          if ($result = $connection->query("SELECT * FROM usuarios;")) {
///              printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    }
    ?>
<table border="1" id="tabla">
  <tr>
    <td><b>id_usuario</td></b>
    <td><b>Nombre</td></b>
    <td><b>Apellidos</td></b>
    <td><b>Email</td></b>
    <td><b>Contrasena</td></b>
    <td><b>Nickusuario</td></b>
	<td><b>Tipo de usuario</td></b>
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
                   echo "<td>".$obj->nombre."</td>";
                   echo "<td>".$obj->apellidos."</td>";
                   echo "<td>".$obj->email."</td>";
                   echo "<td>".$obj->contrasena."</td>";
                   echo "<td>".$obj->nickusuario."</td>";
				   echo "<td>".$obj->tipoacceso."</td>";
				   echo "<td><a href='editarusu.php?id=".$obj->id_usuario."'><img src='editar.jpg'></td>";
				   echo "<td><a href='eliminarusu.php?id=".$obj->id_usuario."'><img src='borrar.jpg'></td>";
                   echo "</tr>";
               }
      ?>

    </table>
	<p>
	</a><input name="anadirusu" a class='ajax' href="anadirusu.php" title="Añadir usuario" type="submit" id="boton" value="Añadir" class="boton"/></p>
<script src="jquery.min.js"></script>
<script src="jquery.colorbox.js"></script>
<script>
 $(".ajax").colorbox();
</script>

</body>
</html>
