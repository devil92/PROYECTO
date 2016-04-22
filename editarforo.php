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
 <?php if (!isset($_POST["nombre_foro"])) : ?> 
                <form id="form-login" method="post" action="editarforo.php" >
					<p><label for="nickusuario">Nick usuario:</label></p>
						<select class="registro" name="id_usuario">
						<optgroup>
						<?php
						//CREATING THE CONNECTION
						$connection = new mysqli("localhost", "root", "", "forololo");
						$consultar="SELECT * FROM usuarios;";
						var_dump($consultar);
						if ($result = $connection->query($consultar)) {
								$result2 = $connection->query("SELECT * FROM usuarios where tipoacceso='admin'");
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

						<?php
			
			 //CREATING THE CONNECTION
		$connection = new mysqli("localhost", "root", "", "forololo");
		//TESTING IF THE CONNECTION WAS RIGHT
		if ($connection->connect_errno) {
			printf("Connection failed: %s\n", $connection->connect_error);
			exit();
		}
			$result=$connection->query("SELECT * FROM foro where id_foro=".$_GET['id']."");
				$obj = $result->fetch_object();
                echo    "<p><label for='nombre'>Nombre Foro:</label></p>";
                echo    "<input name='nombre_foro' type='text' id='nombre' class='nombre' value="."'".$obj->nombre_foro."'"."></p>";

                echo    "<p id='bot'><input name='Enviar' type='submit' id='boton' value='Enviar' class='boton'/></p>";
				echo "<input name='get' type='hidden' id='principa' value=".$_GET['id'].">";
                echo "</form>";
            echo "</div>";
			?>

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
	  $nombreforo=$_POST['nombre_foro'];
	  $idforaso=$_POST['get'];
	  //var_dump($_GET);
	  $consulta="UPDATE foro SET id_usuario='$idusuario',nombre_foro='$nombreforo' where id_foro='$idforaso';";
	  //echo $_POST['enviar'];
	  //echo $idea;
	  if($connection->query($consulta)==true){
                echo "Su foro se ha modificado correctamente";
			  header('Refresh:2; url=foros.php',true,303);
				
            }else{
                echo "No se ha podido modificar el foro seleccionado";   
            }
            unset($connection);
	  

	  
?>
<?php endif ?>
</body>
</html>
