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
                <form id="form-login" method="post" action="anadirtema.php" >
					<p><label for="nombreforo">Nombre foro:</label></p>
<select class="registro" name="id_foro">
<optgroup>
<?php //CREATING THE CONNECTION
$connection = new mysqli("localhost", "root", "", "forololo");
$consultar="SELECT * FROM foro;";
var_dump($consultar);
if ($result = $connection->query($consultar)) {
      	$result2 = $connection->query("SELECT * FROM foro");
	while($obj = $result2->fetch_object()) {
		echo "<option value=\"".$obj->id_foro."\">".$obj->nombre_foro."</option>";
		echo "<br>";

	}//cierra el WHILE
?>
	</optgroup>
	</select>
<?php
}//cierra el primer IF
?>	
					<p><label for="nombre_tema">Nombre del tema:</label></p>
                        <input name="nombre_tema" type="text" id="nombre_tema" class="nombre_tema" autofocus=""/ ></p>
						
                    <p><label for="descripcion">Descripcion:</label></p>
                        <textarea name="descripcion" type="textarea" id="descripcion" class="descripcion" /></textarea></p>
						
                    <p id="bot"><input name="Enviar" type="submit" id="boton" value="Enviar" class="boton"/></p>
					<?php echo "<input name='get' type='hidden' id='principa' value=".$_GET['id'].">";?>
                </form>
            </div>
</body>
</html>


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
	  $nombreforo=$_POST['nombre_foro'];
	  $descripcion=$_POST['descripcion'];
	  $idtema=$_POST['get'];
	  //var_dump($_GET);
	  $consulta="UPDATE temas SET nombre_foro='$nombreforo', descripcion='$descripcion' where id_tema='$idtema';";
	  //echo $_POST['enviar'];
	  //echo $idea;
	  if($connection->query($consulta)==true){
                echo "Su foro se ha modificado correctamente";
			  // header('Refresh:3; url=foros.php',true,303);
				
            }else{
                echo "No se ha podido modificar el foro seleccionado";   
            }
            unset($connection);
	  

	  
?>
<?php endif ?>
</body>
</html>