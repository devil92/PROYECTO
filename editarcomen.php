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
						<?php
						//CREATING THE CONNECTION
						$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
						$consultar="SELECT * FROM usuarios;";
						if ($result = $connection->query($consultar)) {
							$result2 = $connection->query("SELECT usuarios.id_usuario FROM usuarios,comentarios where usuarios.id_usuario=comentarios.id_usuario and comentarios.id_comentario=".$_GET['id']);
							$actual=$result2->fetch_object()->id_usuario;
		
						while($obj = $result->fetch_object()) {
						var_dump($obj->id_usuario);
							if ($actual == $obj->id_usuario){
								echo "<option selected value=\"".$obj->id_usuario."\">".$obj->nickusuario."</option>";
								echo "<br>";
							}else{
							echo "<option value=\"".$obj->id_usuario."\">".$obj->nickusuario."</option>";
							echo "<br>";
							}
	}//cierra el WHILE
?>

	</select>
<?php
}//cierra el primer IF
?>	
						<?php
									 //CREATING THE CONNECTION
		$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
		//TESTING IF THE CONNECTION WAS RIGHT
		if ($connection->connect_errno) {
			printf("Connection failed: %s\n", $connection->connect_error);
			exit();
		}
			$result=$connection->query("SELECT * FROM comentarios where id_comentario=".$_GET['id']."");
				$obj = $result->fetch_object();
						echo "<p><label for='texto_comen'>texto comen:</label></p>";
                        echo "<textarea name='texto_comen' type='text' class='texto_comen' >".$obj->texto_comen."</textarea></p>";

						echo "<p id='bot'><input name='Enviar' type='submit' id='boton' value='Enviar' class='boton'/></p>";
						echo "<input name='get' type='hidden' value=".$_GET['id'].">";
						echo "</form>";
					echo "</div>";
?>

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