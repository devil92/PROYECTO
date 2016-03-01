<?php
include("db_configuration.php");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar foro</title>
  </head>
  <body>
    <?php
         //CREATING THE CONNECTION
         $connection = new mysqli("127.4.136.2:3306", "adminz2xUtyZ", "w3z4Rg5Rx-zQ", "forololo");
         //TESTING IF THE CONNECTION WAS RIGHT
         if ($connection->connect_errno) {
             printf("Connection failed: %s\n", $mysqli->connect_error);
             exit();
         }
         //MAKING A SELECT QUERY
         /* Consultas de selección que devuelven un conjunto de resultados */
         $op1='delete from foro where id_foro='.$_GET["id"];
         
         if ($result = $connection->query($op1)){
           echo "Foro eliminado"."</br>";
         }
		
         header('Refresh:5; url=foros.php',true,303);


         ?>