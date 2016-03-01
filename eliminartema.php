<?php
include("db_configuration.php");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar temas</title>
  </head>
  <body>
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
         $op1='delete from temas where id_tema='.$_GET["id"];
         
         if ($result = $connection->query($op1)){
           echo "Tema eliminado"."</br>";
         }
		
         header('Refresh:5; url=temas.php',true,303);


         ?>