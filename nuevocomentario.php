<?php
include("db_configuration.php");
?>
<?php
session_start();
      //CREATING THE CONNECTION
      $connection = new mysqli("127.4.136.2:3306", "adminz2xUtyZ", "w3z4Rg5Rx-zQ", "forololo");
      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //MAKING A SELECT QUERY
	  if($result2 = $connection->query("select * from usuarios where nickusuario='".$_SESSION['usuario']."';"));
	  $obj2 = $result2->fetch_object();
		$id=$obj2->id_usuario;	
      /* Consultas de selección que devuelven un conjunto de resultados */
      if($result = $connection->query("insert into comentarios (id_usuario,id_post,texto_comen) VALUES ('".$id."','".$_POST['id_post']."','".$_POST['texto_comen']."')")) {
	  echo "<p>El comentario se ha enviado correctamente</p>";
	  }else{
		  
		  echo "<p>No se ha podido enviar el comentario</p>";
	  }
	  
	  header("Refresh:5; url=indexlolo.php?carga=3&id_post=".$_POST['id_post'],true,303);


	  
?>	  