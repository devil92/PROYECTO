<?php
include("db_configuration.php");
?>
<html>
<head></head>
<body>
<div id="cuerpo">
 <?php if (!isset($_POST["nombre_foro"])) : ?> 
                <form id="form-login" method="post" action="editarforo.php" >
					<p><label for="nickusuario">Nick usuario:</label></p>
						<select class="registro" name="id_usuario">
						<optgroup>
						<?php
						//CREATING THE CONNECTION
						$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
						$consultar="SELECT * FROM usuarios;";
						var_dump($consultar);
						if ($result = $connection->query($consultar)) {
								$result2 = $connection->query("SELECT * FROM usuarios");
							while($obj = $result2->fetch_object()) {
								echo "<option value=\"".$obj->id_usuario."\">".$obj->nickusuario."</option>";
								echo "<br>";

							}//cierra el WHILE
						?>
							</optgroup>
							</select>
						<?php
						}//cierra el primer IF
						?>	
                    <p><label for="nombre">Nombre Foro:</label></p>
                        <input name="nombre_foro" type="text" id="nombre" class="nombre" ></p>

                    <p id="bot"><input name="Enviar" type="submit" id="boton" value="Enviar" class="boton"/></p>
					<?php echo "<input name='get' type='hidden' id='principa' value=".$_GET['id'].">";?>
                </form>
            </div>

			<?php else: ?>
			<?php
 //CREATING THE CONNECTION
      $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
	  $idusuario=$_POST['id_usuario'];
	  $nombreforo=$_POST['nombre_foro'];
	  $idforaso=$_POST['get'];
	  //var_dump($_GET);
	  $consulta="UPDATE foro SET id_usuario='$idusuario',nombre_foro='$nombreforo' where id_foro='$idforaso';";
	  //echo $_POST['enviar'];
	  //echo $idea;
	  if($connection->query($consulta)==true){
                echo "Su foro se ha modificado correctamente";
			  header('Refresh:3; url=foros.php',true,303);
				
            }else{
                echo "No se ha podido modificar el foro seleccionado";   
            }
            unset($connection);
	  

	  
?>
<?php endif ?>
</body>
</html>