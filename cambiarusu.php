<?php
include("db_configuration.php");
?>
<?php else: ?>
<?php

 //CREATING THE CONNECTION
      $connection = new mysqli("127.4.136.2:3306", "adminz2xUtyZ", "w3z4Rg5Rx-zQ", "forololo");
      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
      
	  if ($result = $connection->query("UPDATE into usuarios SET (nombre, apellidos, email, contrasena) VALUES ('".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['email']."',md5('".$_POST['contrasena']."')." where nickusuario=$_POST['nickusuario'])))  {
		echo "<p>Su usuario se ha modificado correctamente</p>";
	  }else{
		 
		  echo "<p>Ha habido un error al actualizar su perfil</p>";
	  }
	  

	  
?>
<?php endif ?>