<?php
include_once("db_configuration.php");
?>
<html>
<head></head>
<body>
<div id="cuerpo">
 <?php if (!isset($_POST["Enviar"])) : ?> 
                <form id="form-login" method="post" action="anadirpost.php" >
					<p><label for="nombreforo">Nombre foro:</label></p>
<select class="registro" name="id_tema">
<optgroup>
<?php //CREATING THE CONNECTION
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
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
      if ($result = $connection->query("insert into post (id_tema, nombre_post,texto_post) VALUES ('".$_POST['id_tema']."','".$_POST['nombre_post']."','".$_POST['texto_post']."')")) {

	  echo "<p>El post se ha creado correctamente</p>";
	  }else{
		 
		  echo "<p>No se ha podido crear el post</p>";
	  }
	  
	  header('Refresh:5; url=post.php',true,303);


	  
?>	  
<?php endif ?>