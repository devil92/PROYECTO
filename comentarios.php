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
include_once("db_configuration.php");
?>
<html lang="en">
  <head>
<link type="text/css" href="colorbox.css" rel="stylesheet" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTADO COMENTARIOS</title>
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
			$connection = new mysqli("localhost", "root", "", "forololo");          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $mysqli->connect_error);
              exit();
          }
          //MAKING A SELECT QUERY
          /* Consultas de selección que devuelven un conjunto de resultados */
          if ($result = $connection->query("SELECT comentarios.*,post.nombre_post, usuarios.nickusuario FROM comentarios, post, usuarios where comentarios.id_post=post.id_post and comentarios.id_usuario=usuarios.id_usuario;")) {
///             printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    }
    ?>
<table border="1" id="tabla">
  <tr>
   
    <td><b>id_usuario</td></b>
	<td><b>nickusuario</td></b>
    <td><b>id_post</td></b>
	<td><b>nombre_post</td></b>
	<td><b>id_comentario</td></b>
    <td><b>texto_comen</td></b>
	<td><b>fechahora_comen</td></b>
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
				   echo "<td>".$obj->nickusuario."</td>";
                   echo "<td>".$obj->id_post."</td>";
				   echo "<td>".$obj->nombre_post."</td>";
				   echo "<td>".$obj->id_comentario."</td>";
                   echo "<td>".$obj->texto_comen."</td>";
				   echo "<td>".$obj->fechahora_comen."</td>";
				   echo "<td><a href='editarcomen.php?id=".$obj->id_comentario."'><img src='editar.jpg'></td>";
				   echo "<td><a href='eliminarcomen.php?id=".$obj->id_comentario."'><img src='borrar.jpg'></td>";
                   echo "</tr>";
               }
      ?>

    </table>
	<p>
	</a><input name="anadircomen" a class='ajax' href="anadircomen.php" title="Añadir comen" type="submit" id="boton" value="Añadir" class="boton"/></p>
<script src="jquery.min.js"></script>
<script src="jquery.colorbox.js"></script>
<script>
 $(".ajax").colorbox();
</script>

</body>
</html>
