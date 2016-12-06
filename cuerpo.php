<?php
include("db_configuration.php");
?>

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
          if ($result = $connection->query("SELECT * FROM foro;")) {
///              printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    }

	//FETCHING OBJECTS FROM THE RESULT SET
               //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
			   echo "<table border='solid black' width='1020' >";
               while($obj = $result->fetch_object()) {
                   //PRINTING EACH ROW
                   echo "<tr>";
                   echo "<td class='cuerpo1'><a href='indexlolo.php?carga=1&id_foro=".$obj->id_foro."'>".$obj->nombre_foro."</a></td>";
				   echo "</tr>";
				   $result2 = $connection->query("select count(post.id_post) as cuenta,temas.nombre_tema,temas.id_tema from post,temas,foro where foro.id_foro=temas.id_foro and foro.id_foro=".$obj->id_foro." group by temas.id_tema order by cuenta asc limit 2;   ");
				   echo "<tr><td><table class='cuerpo2'>";
				   while($obj2 = $result2->fetch_object()) {
					
					echo "<td><a href='indexlolo.php?carga=2&id_tema=".$obj2->id_tema."'>".$obj2->nombre_tema."</a></td>";

					
				   }
				   echo "</tr></table>";
				   echo "</td>";
                   echo "</tr>";
               }
			   echo "</table>";
	
?>