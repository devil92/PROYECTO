<?php

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'admin'){

?>
<?php
include("db_configuration.php");
?>
<html>
<head></head>
<body>
<div id="cuerpo">
 <?php if (!isset($_POST["Enviar"])) : ?> 
                <form id="form-login" method="post" action="anadirforo.php" >
					<p><label for="nickusuario">Id usuario:</label></p>
<select class="registro" name="id_usuario">
<optgroup>
<?php
//CREATING THE CONNECTION
$connection = new mysqli("phplolo-forololo.rhcloud.com", "adminz2xUtyZ", "w3z4Rg5Rx-zQ", "phplolo");
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
                </form>
            </div>
</body>
</html>
<?php else: ?>
<?php
      //CREATING THE CONNECTION
      $connection = new mysqli("phplolo-forololo.rhcloud.com", "adminz2xUtyZ", "w3z4Rg5Rx-zQ", "phplolo");
      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
      if ($result = $connection->query("insert into foro (id_usuario, nombre_foro) VALUES ('".$_POST['id_usuario']."','".$_POST['nombre_foro']."')")) {

	  echo "<p>El foro se ha creado correctamente</p>";
	  }else{
		 
		  echo "<p>No se ha podido crear el foro</p>";
	  }
	  
	  header('Refresh:5; url=foros.php',true,303);


	  
?>	  
<?php endif ?>
<?php
}else{
	echo "<p>No tiene los permisos adecuados</p>";

}
header("Refresh:5; url=indexlolo.php",true,303);
	?>