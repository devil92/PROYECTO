<?php
include("db_configuration.php");
?>
<?php
			$foro = $_GET["id_foro"];
			
          //CREATING THE CONNECTION
          $connection = new mysqli("localhost", "root", "", "forololo");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $mysqli->connect_error);
              exit();
          }
          //MAKING A SELECT QUERY
          /* Consultas de selección que devuelven un conjunto de resultados */
          if ($result = $connection->query("SELECT * FROM temas where id_foro=".$foro.";")) {
///              printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    }
	
	echo "<table border=solid black;>";
               while($obj = $result->fetch_object()) {
                   //PRINTING EACH ROW
                   echo "<tr>";
                   echo "<td class='cuerpo1'><a href='indexlolo.php?carga=2&id_tema=".$obj->id_tema."'>".$obj->nombre_tema."</td>";
				   echo "</tr>";
			   }
	echo "</table>";




	
?>