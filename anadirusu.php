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
                <form id="form-login" method="post" action="anadirusu.php" >
                                        <p><label for="nickusuario">Nombre de usuario:</label></p>
                        <input name="nickusuario" type="text" id="nickusuario" class="nickusuario" autofocus=""/ ></p>

                    <p><label for="nombre">Nombre:</label></p>
                        <input name="nombre" type="text" id="nombre" class="nombre" ></p>

                    <p><label for="apellidos">Apellidos:</label></p>
                        <input name="apellidos" type="text" id="apellidos" class="apellidos" /></p>


                    <p><label for="email">Correo:</label></p>
                        <input name="email" type="text" id="email" class="email" /></p>

                    <p><label for="pass">Contraseña:</label></p>
                        <input name="contrasena" type="password" id="contrasena" class="pass" / ></p>

                                        <p><label for="tipoacceso">Tipo de usuario:</label></p>
                                                <select id="tipoacceso" name="tipoacceso">
                                                        <option value="usuario">usuario</option>
                                                        <option value="admin">admin</option>
                                                </select>

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
      if ($result = $connection->query("insert into usuarios (nombre, apellidos, email, contrasena, nickusuario, tipoacceso) VALUES ('".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['email']."',md5('".$_POST['contrasena']."'),'".$_POST['nickusuario']."','".$_POST['tipoacceso']."')")) {

	  echo "<p>El usuario se ha creado correctamente</p>";
	  }else{
		 
		  echo "<p>El correo o nombre de usuario esta en uso</p>";
	  }
	  
	  header('Refresh:5; url=usuarios.php',true,303);


	  
?>
<?php endif ?>
<?php
}else{
        echo "<p>No tiene los permisos adecuados</p>";
    header("Refresh:0; url=indexlolo.php",true,303);
}




