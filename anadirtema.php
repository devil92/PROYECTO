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
					<p><label for="nombre_tema">Nombre del tema:</label></p>
                        <input name="nombre_tema" type="text" id="nombre_tema" class="nombre_tema" autofocus=""/ ></p>
						
                    <p><label for="descripcion">Descripcion:</label></p>
                        <textarea name="descripcion" type="textarea" id="descripcion" class="descripcion" /></p>
 
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
      if ($result = $connection->query("insert into temas (nombre_tema, id_foro, descripcion) VALUES ('".$_POST['nombre_tema']."','".$_POST['id_foro']."','".$_POST['descripcion']."')")) {

	  echo "<p>El tema se ha creado correctamente</p>";
	  }else{
		 
		  echo "<p>No se ha podido crear el tema</p>";
	  }
	  
	  header('Refresh:5; url=temas.php',true,303);


	  
?>	  
<?php endif ?>