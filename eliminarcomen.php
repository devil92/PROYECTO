<?php
include("db_configuration.php");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar comentario</title>
  </head>
  <body>
    <?php
         //CREATING THE CONNECTION
         $connection = new mysqli("localhost", "root", "", "forololo");
         //TESTING IF THE CONNECTION WAS RIGHT
         if ($connection->connect_errno) {
             printf("Connection failed: %s\n", $mysqli->connect_error);
             exit();
         }
         //MAKING A SELECT QUERY
         /* Consultas de selección que devuelven un conjunto de resultados */
         $op1='delete from comentarios where id_comentario='.$_GET["id"];
         
         if ($result = $connection->query($op1)){
           echo "Comentario eliminado"."</br>";
         }
		
         header('Refresh:5; url=comentarios.php',true,303);


         ?>