<?php
include("db_configuration.php");
?>
<?php
			$post = $_GET["id_post"];
			
          //CREATING THE CONNECTION
          $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $mysqli->connect_error);
              exit();
          }
          //MAKING A SELECT QUERY
          /* Consultas de selección que devuelven un conjunto de resultados */
          if ($result = $connection->query("SELECT * FROM post,usuarios where post.id_usuario=usuarios.id_usuario and id_post=".$post.";")) {
///              printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    }
	
//		$result2 = $connection->query("SELECT * FROM post,usuarios,comentarios where post.id_usuario=usuarios.id_usuario and comentarios.id_usuario=usuarios.id_usuario and id_post=".$post.";");
		$result2 = $connection->query("SELECT * FROM usuarios,comentarios where usuarios.id_usuario=comentarios.id_usuario and comentarios.id_post=".$post.";");


              $obj = $result->fetch_object() ;
                   //PRINTING EACH ROW
				   echo "<tr><td>#".$obj->id_post." - ".$obj->nombre_post."</td></tr>";
				   echo "<table border='solid' width='1020' >";				   
				   echo "<tr>";
				   
				   echo "<td class='postusuario'>";
						echo "<table style='text-align:center; width:100%;'>";
						
						echo "<tr><td align='left'>#".$obj->id_usuario."</td></tr>";
						echo "<tr><td><img width='100' height='100' src='".$obj->foto."'/></td></tr>";
						echo "<tr><td >".$obj->nickusuario."</td></tr>";
						echo "<tr><td>".$obj->fechahora_creacion."</td></tr>";
						echo "<tr><td>".$obj->tipoacceso."</td></tr>";
						
						echo "</table>";
						
				   echo "</td>";
				   
				   echo "<td class='postcuerpo'>";
						echo "<table style='width:100%;'>";
						echo "<tr><td>#".$obj->id_post."</td></tr>";
						echo "<tr><td>".$obj->texto_post."</td></tr>";
						echo "</table>";
				   echo "</td>";
				   
				   echo "</tr>";	
					
					
					 while($obj2 = $result2->fetch_object()) {
						 
						echo "<tr><td>";

						echo "<table style='text-align:center; width:100%;'>";
							echo "<tr><td align='left'>#".$obj2->id_usuario."</td></tr>";
							echo "<tr><td><img width='100' height='100' src='".$obj2->foto."'/></td></tr>";
							echo "<tr><td >".$obj2->nickusuario."</td></tr>";
							echo "<tr><td>".$obj2->fechahora_comen."</td></tr>";
							echo "<tr><td >".$obj->tipoacceso."</td></tr>";
							
						echo "</table>";

						echo "</td><td class='postcuerpo'>";
						
						echo "<table style='width:100%;'>";
						echo "<tr><td>#".$obj2->id_comentario."</td></tr>";
						echo "<tr><td>".$obj2->texto_comen."</td></tr>";
						echo "</table>";
						
						echo "</td></tr>";

						 
					 }
				
						
				   
				   echo "</table>";
				   
				   if(isset($_SESSION["usuario"])){
					   // hago un formulario con el textarea y submit(boton) y crear un php llamado action=nuevocomentario.php donde se haga el insert
					   // y crear un input oculto hiden con la id del post
					   echo "<form action='nuevocomentario.php' method='POST' align='right'>";
					   echo "</br>";
					   echo "<textarea name='texto_comen' height='250px'></textarea>";
					   echo "</br>";		   
					   echo "<input name='id_post' type='hidden' value='".$post."'/>";
					   echo "<input type='submit' value='Guardar' name='Guardar' />";
					   echo "</form>";
				   }					
?>