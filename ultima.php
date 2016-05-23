<?php
include("db_configuration.php");
?>
<html lang="en">
  <head>
<link type="text/css" href="indexlolo.css" rel="stylesheet" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultimas noticias</title>
  </head>
  <body>
<?php

          //CREATING THE CONNECTION
          $connection = new mysqli("phplolo-forololo.rhcloud.com", "adminz2xUtyZ", "w3z4Rg5Rx-zQ", "phplolo");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $mysqli->connect_error);
              exit();
          }
          //MAKING A SELECT QUERY
          /* Consultas de selección que devuelven un conjunto de resultados */
          if ($result = $connection->query("SELECT distinct comentarios.*, post.nombre_post FROM comentarios,post order by comentarios.fechahora_comen limit 5;")) {
///              printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    }
    ?>
<table id="tabla" width="160px">
  <tr>
    <td><b><u>Ultimas noticias</u></td></b>

    </tr>
    <tr>
      <?php
               //FETCHING OBJECTS FROM THE RESULT SET
               //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
               while($obj = $result->fetch_object()) {
                   //PRINTING EACH ROW
                   echo "<tr>";
				   echo "<td>".$obj->nombre_post."</td>";
                   echo "</tr>";
               }
      ?>

    </table>
</body>
</html>