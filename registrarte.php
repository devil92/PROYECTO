<?php
include("db_configuration.php");
?>
<html>
    <head><title>Formulario</title>
    <meta charset="utf-8">
    <link type="text/css" href="registrarte.css" rel="stylesheet" />
	</head>
</head>
<body>
<div id="contenedor">
<div id="cuerpo">
<?php if (!isset($_POST["submit"])) : ?> 
                <form id="form-login" method="post" action="registrarte.php" >
					<p><label for="nickusuario">Nombre de usuario:</label></p>
                        <input name="nickusuario" type="text" id="nickusuario" class="nickusuario" autofocus="" required/ ></p>
						
                    <p><label for="nombre">Nombre:</label></p>
                        <input name="nombre" type="text" id="nombre" class="nombre" required></p>

                    <p><label for="apellidos">Apellidos:</label></p>
                        <input name="apellidos" type="text" id="apellidos" class="apellidos" required/></p>

 
                    <p><label for="email">Correo:</label></p>
                        <input name="email" type="email" id="email" class="email" required/></p>
 
                    <p><label for="pass">Contraseña:</label></p>
                        <input name="contrasena" type="password" id="contrasena" class="pass" required/ ></p>
 
                    <p id="bot"><input name="submit" type="submit" id="boton" value="Registrar" class="boton"/></p>
                </form>
            </div>

</div>
</body>
</html>
<?php else: ?>
<?php
      //CREATING THE CONNECTION
      $connection = new mysqli("127.4.136.2:3306", "adminz2xUtyZ", "w3z4Rg5Rx-zQ", "forololo");
      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
      if ($result = $connection->query("insert into usuarios (nombre, apellidos, email, contrasena, nickusuario) VALUES ('".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['email']."',md5('".$_POST['contrasena']."'),'".$_POST['nickusuario']."')")) {

	  echo "<p>Su usuario se ha creado correctamente</p>";
	  }else{
		 
		  echo "<p>El correo o nombre de usuario esta en uso</p>";
	  }
	  
	  header('Refresh:5; url=indexlolo.php',true,303);


	  
?>	  
<?php endif ?>
