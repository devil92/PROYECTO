<?php
include("db_configuration.php");
?>
<?php
session_start();
?> 
<html>
<head><title>RICON DE LOLASO</title></head>
<link rel="stylesheet" type="text/css" href="indexlolo.css"> 
<style type="text/css"> </style> 

<body>
<div id="general">
	<div id="izquierda">
		<div id="cabecera">
			<div id="imagen"><img id="fondo" src="fondo.jpg"></img></div>
		</div>
		<div id="menu"> 
			<ul id="listamenu">
				<li><a href="indexlolo.php">INICIO</a></li>
				<li><a href="indexlolo.php">INFORMATICA</a></li>
				<li><a href="indexlolo.php">DEPORTES</a></li>
				<li><a href="indexlolo.php">E-SPORT</a></li>
				<li><a href="indexlolo.php">JUEGOS</a></li>
			</ul>	
		</div>
		<div id="temas">
			<div id="panel">
			<li><a name="verperfil" href="verperfil.php">Ver Perfil</a></li>
			<li><a name="cambiarperfil" href="mipanel.php">Cambiar datos</a></li>
			<?php if (!isset($_POST["Guardar"])) : ?>
			<form id="confiusu" method="post" action="mipanel.php" >
				<p id="porculero"><label for="nombre">Nuevo Nombre de usuario:</label></p>
                        <input name="cambiarnombre" type="text" id="nickusuario" class="nombre" ></p>
				<p><label for="apellidos">Nuevo Apellido:</label></p>
                        <input name="cambiarapellido" type="text" id="apellidos" class="apellidos" ></p>
						<p><label for="email">Nuevo email:</label></p>
                        <input name="cambiaremail" type="email" id="correo" class="email" ></p>
				<p><label for="pass">Nueva contraseña:</label></p>
                        <input name="cambiarpass" type="password" id="contrasena" class="contrasena" ></p>

				<p><input type="submit" value="Guardar" name="Guardar" /></p>
				
			</form>
			</div>
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
	  $cambiarnombre=$_POST['cambiarnombre'];
	  $cambiarapellido=$_POST['cambiarapellido'];
	  $cambiaremail=$_POST['cambiaremail'];
	  $cambiarpass=$_POST['cambiarpass'];
	  $consulta="UPDATE usuarios SET nombre='$cambiarnombre',apellidos='$cambiarapellido', email='$cambiaremail', contrasena="."'".md5($cambiarpass)."'"." where nickusuario="."'".$_SESSION['usuario']."'".";";
      var_dump($consulta);
	  if($connection->query($consulta)==true){
                echo "Su usuario se ha modificado correctamente";
                session_destroy();
				header('Refresh:5; url=indexlolo.php',true,303);
				
            }else{
                echo "No se ha podido modificar su usuario";   
            }
            unset($connection);
	  

	  
?>
<?php endif ?>
		</div>
	</div>
		<div id="derecha">
			<div id="logo"><img id="logaso" src="logocabeza.jpg"></img></div>
			<div id="login">
				<div id="loginaso">
				<?php  if (!isset($_SESSION['usuario'])) : ?>
				
					<form action="login.php" method="POST">
					<p>Nombre de usuario</p>
						<input type="text" size="12px" align="center" placeholder="usuario" name="txtusuario" />
					<p>Contraseña</p>
						<input type="password" size="12px" align="center" placeholder="contraseña" name="txtpassword" />
					<p>
					<input type="submit" value="Entrar" name="entrar" />
				</form>
				<form action="registrarte.php" method="POST">
					<input type="submit" value="Registrate" name="registrate" />
				</form>
				<?php else: ?>
					<h3>Bienvenido:</h3> <?php
					echo $_SESSION['usuario'];?>
					<p><a href="mipanel.php">Ver perfil</a></p>
					<form action="destroy.php" method="POST">
					<p><input type="submit" value="Desconectar" name="Desconectar" /></p>
					</form>
				<?php endif; ?>
				</div>	
			</div>
			<div id="noticias">Ultimas noticias:</div>
		</div>	
	<div id="piedepagina">
		<table><tr><td style="width:1060px">Todos los derechos reservados www.rincondelolaso.com</td> <td style="width:180px;">©rincondelolaso.com</td></tr></table>
	</div>
	
</div>
</body>
</html>