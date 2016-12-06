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
 <?php if (!isset($_POST["Enviar"])) : ?> 
                <form id="form-login" method="post" action="editarpost.php" >
					

					<p><label for="nombretema">Nombre tema:</label></p>
<select class="registro" name="id_tema">
<optgroup>
<?php //CREATING THE CONNECTION
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
$consultar="SELECT * FROM temas;";
var_dump($consultar);
if ($result = $connection->query($consultar)) {
      	$result2 = $connection->query("SELECT * FROM temas");
	while($obj = $result2->fetch_object()) {
		echo "<option value=\"".$obj->id_tema."\">".$obj->nombre_tema."</option>";
		echo "<br>";

	}//cierra el WHILE
?>
	</optgroup>
	</select>
<?php
}//cierra el primer IF
?>	

						
                    <p><label for="nombre_post">Nombre Post:</label></p>
                        <input name="nombre_post" type="text" id="nombre_post" class="nombre_post" ></p>
						
					<p><label for="texto_post">texto Post:</label></p>
						<textarea name="texto_post" type="text" id="texto_post" class="texto_post" >	
						</textarea>
                    <p id="bot"><input name="Enviar" type="submit" id="boton" value="Enviar" class="boton"/></p>
					<?php echo "<input name='get' type='hidden' id='principa' value=".$_GET['id'].">";?>
                </form>
            </div>
</body>
</html>

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
	  $idtema=$_POST['id_tema'];
	  $nombrepost=$_POST['nombre_post'];
	  $textopost=$_POST['texto_post'];
	  $idpost=$_POST['get'];
	  var_dump($_GET);
	  $consulta="UPDATE post SET id_tema='$idtema', nombre_post='$nombrepost', texto_post='$textopost' where id_post='$idpost';";
	  //echo $_POST['enviar'];
		echo $consulta;
	  if($connection->query($consulta)==true){
                echo "El post se ha modificado correctamente";
			  // header('Refresh:3; url=foros.php',true,303);
				
            }else{
                echo "No se ha podido modificar el Post seleccionado";   
            }
            unset($connection);
	  

	  
?>
<?php endif ?>
