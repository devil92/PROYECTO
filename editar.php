<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TALLERES FABER</title>
  </head>
  <body>
    <?php

          //CREATING THE CONNECTION
          $connection = new mysqli("localhost", "root", "", "TalleresFaber");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $mysqli->connect_error);
              exit();
          }
          //MAKING A SELECT QUERY
          /* Consultas de selección que devuelven un conjunto de resultados */
          if ($result = $connection->query("SELECT * FROM REPARACIONES where IdReparacion=$_GET['IdReparacion'];")) {
              printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    }
    ?>
</body>
</html>
