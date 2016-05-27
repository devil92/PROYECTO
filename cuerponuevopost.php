<?php
include("db_configuration.php");
?>
<html lang="en">
  <head>
<link type="text/css" href="colorbox.css" rel="stylesheet" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo post</title>
  </head>
  <body>

<?php if (!isset($_POST["nombre_post"])) : ?> 
<?php $temilla=$_GET['temaso']; ?>
<?php
echo "<form id='form-login' method='post' action='cuerponuevopost.php?temasaso=$temilla' >";
echo "<p><label for='nombre_post'>Nombre Post:</label></p>";
echo "<input name='nombre_post' type='text' class='nombre_post' ></input>";
echo "<p><label for='texto_post'>Texto post:</label></p>";
echo "<textarea name='nuevopost'></textarea>";
echo "</br>";
echo "<input type='submit' value='Guardar' name='Guardar' />";
echo "</form>";
echo "</body>";
echo "</html>";
?>
<?php else: ?>
<?php
session_start();
      //CREATING THE CONNECTION
      $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
	  			  if (!$connection->set_charset("utf8")){}
      //MAKING A SELECT QUERY
	  if($result2 = $connection->query("select * from usuarios where nickusuario='".$_SESSION['usuario']."';"));
	  $obj2 = $result2->fetch_object();
		$id=$obj2->id_usuario;		

		$idtema=$_GET['temasaso'];	
      /* Consultas de selección que devuelven un conjunto de resultados */
      if($result = $connection->query("insert into post (id_usuario,id_tema,nombre_post,texto_post) VALUES ('".$id."','".$idtema."','".$_POST['nombre_post']."','".$_POST['nuevopost']."')")) {
	  echo "<p>El comentario se ha enviado correctamente</p>";
	  }else{ 
		  echo "<p>No se ha podido enviar el comentario</p>";
	  }
	  
	  header("Refresh:3; url=indexlolo.php?carga=2&id_tema=$idtema",true,303);


	  
?>
<?php endif ?>  