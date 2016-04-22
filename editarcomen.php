<?php

session_start();

    if (isset($_SESSION['tipoacceso'])&&($_SESSION['tipoacceso']=='admin')){
        echo "";
    }
    else {
        echo "<h2>Acceso denegado, redireccionando...</h2>";
        echo "<style>div {display:none;}<style>";
    header('Refresh:1; url=indexlolo.php',True,303);
}
?>
<?php
include("db_configuration.php");
?>
<html>
<head></head>
<body>
<div id="cuerpo">
 <?php if (!isset($_POST["texto_comen"])) : ?> 
                <form method="post" action="editarcomen.php" >
					<p><label for="nickusuario">Nick usuario:</label></p>
						<select class="registro" name="id_usuario" value=".$_POST['nickusuario'].">
						<optgroup>
						<?php
						//CREATING THE CONNECTION
						$connection = new mysqli("localhost", "root", "", "forololo");
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
                    <p><label for="texto_comen">texto comen:</label></p>
                        <textarea name="texto_comen" type="text" class="texto_comen" ></textarea></p>

                    <p id="bot"><input name="Enviar" type="submit" id="boton" value="Enviar" class="boton"/></p>
					<?php 
					echo "<input name='get' type='hidden' value=".$_GET['id'].">";
					?>
                </form>
            </div>


			<?php else: ?>
			<?php
 //CREATING THE CONNECTION
      $connection = new mysqli("localhost", "root", "", "forololo");
      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
	  $idusuario=$_POST['id_usuario'];
	  $textocomen=$_POST['texto_comen'];
	  $idcomen=$_POST['get'];
	  //echo $_GET['id'];
	  //var_dump($_GET);
	  $consulta="UPDATE comentarios SET id_usuario='$idusuario', texto_comen='$textocomen' where id_comentario='$idcomen';";
	  //echo $_POST['enviar'];
	  //echo $idea;
	  if($connection->query($consulta)==true){
                echo "Su comentario se ha modificado correctamente";
			  header('Refresh:3; url=comentarios.php',true,303);
				
            }else{
                echo "No se ha podido modificar el comentario seleccionado";   
            }
            unset($connection);
	  

	  
?>
<?php endif ?>
</body>
</html>