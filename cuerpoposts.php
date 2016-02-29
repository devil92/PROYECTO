<?php
include_once("db_configuration.php");
?>
<?php
			$tema = $_GET["id_tema"];
			
          //CREATING THE CONNECTION
          $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $mysqli->connect_error);
              exit();
          }
          //MAKING A SELECT QUERY
          /* Consultas de selección que devuelven un conjunto de resultados */
          if ($result = $connection->query("SELECT * FROM post where id_tema=".$tema.";")) {
///              printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    }
	
	echo "<form action='indexlolo.php?carga=4' method='POST' align='right'><input type='submit' value='Nuevo Post' name='nuevopost'/></form>";
	
	echo "<table border='solid' width='1020'>";
               while($obj = $result->fetch_object()) {
                   //PRINTING EACH ROW
                   echo "<tr>";
                   echo "<td class='cuerpo1'><a href='indexlolo.php?carga=3&id_post=".$obj->id_post."'>".$obj->nombre_post."</a></td>";
				   echo "<td class='cuerpo2'>".$obj->fechahora_creacion."</td>";
				   echo "</tr>";
			   }
	echo "</table>";




	
?>