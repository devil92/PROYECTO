<?php

session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['tipoacceso']) && $_SESSION['tipoacceso'] == 'admin'){

?>
<?php
include("db_configuration.php");
?>
<html>
<head></head>
<body>
<div id="cuerpo">
 <?php if (!isset($_POST["Enviar"])) : ?> 
                <form id="form-login" method="post" action="anadircomen.php" >
					<p><label for="nickusuario">Id usuario:</label></p>
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
					<p><label for="nombrepost">Nombre post:</label></p>
<select class="registro" name="id_post">
<optgroup>
<?php //CREATING THE CONNECTION
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
$consultar="SELECT * FROM post;";
var_dump($consultar);
if ($result = $connection->query($consultar)) {
      	$result2 = $connection->query("SELECT * FROM post");
	while($obj = $result2->fetch_object()) {
		echo "<option value=\"".$obj->id_post."\">".$obj->nombre_post."</option>";
		echo "<br>";

	}//cierra el WHILE
?>
	</optgroup>
	</select>
<?php
}//cierra el primer IF
?>	

                    <p><label for="texto_comen">Texto comentario:</label></p>
                        <textarea name="texto_comen" type="text" id="texto_comen" class="texto_comen" ></textarea>

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
      if ($result = $connection->query("insert into comentarios (id_usuario,id_post,texto_comen) VALUES ('".$_POST['id_usuario']."','".$_POST['id_post']."','".$_POST['texto_comen']."')")) {
	  echo "<p>El comentario se ha creado correctamente</p>";
	  }else{
		 
		  echo "<p>No se ha podido crear el comentario</p>";
	  }
	  
	  header('Refresh:5; url=comentarios.php',true,303);


	  
?>	  
<?php endif ?>
<?php
}else{
        echo "<p>No tiene los permisos adecuados</p>";
    header("Refresh:0; url=indexlolo.php",true,303);
}