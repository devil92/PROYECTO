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
          if ($result = $connection->query("SELECT * FROM usuarios where nickusuario="."'".$_SESSION['usuario']."'".";")) {
///              printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    }

	  
?>
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
			</div>
			<table id="tabla">
				<tr>
				<td><b>id_usuario</td></b>
				<td><b>Nombre</td></b>
				<td><b>Apellidos</td></b>
				<td><b>Email</td></b>
				<td><b>Nickusuario</td></b>
				
<?php
               //FETCHING OBJECTS FROM THE RESULT SET
               //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
               while($obj = $result->fetch_object()) {
                   //PRINTING EACH ROW
                   echo "<tr>";
                   echo "<td>".$obj->id_usuario."</td>";
                   echo "<td>".$obj->nombre."</td>";
                   echo "<td>".$obj->apellidos."</td>";
                   echo "<td>".$obj->email."</td>";
                   echo "<td>".$obj->nickusuario."</td>";
                   echo "</tr>";
               }
?>
			</table>
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
					<p><a href="verperfil.php">Ver perfil</a></p>
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