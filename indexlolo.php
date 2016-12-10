<?php
include("db_configuration.php");

?>
<?php
session_start();
?> 
<html>
<head>
<title>RICON DE LOLASO</title>

 <script src="tinymce/js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

</head>
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
					<li><a href='indexlolo.php'>Inicio</a></li>

			</ul>	
		</div>
		<div id="temas" border="1px">
		<?php
		if(!isset($_GET["carga"])){
			echo "<p><b>Foros</b><p>";
			include("cuerpo.php");
		}elseif($_GET["carga"]==1){
			echo "<p><b>Temas</b></p>";
			include("cuerpotemas.php");
		}elseif($_GET["carga"]==2){
			echo "<p><b>Posts</b></p>";
			include("cuerpoposts.php");
		}elseif($_GET["carga"]==3){
			include("fichapost.php");
		}elseif($_GET["carga"]==4){
			include("cuerponuevopost.php");
		}
			?>
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
					<?php include("cambiar_tema_color.php"); ?>
					<p><a href="verperfil.php">Ver Perfil</a></p>
					<?php
					
					if ($_SESSION["tipoacceso"] == "admin") {
                    					echo "<p><a href=\"usuarios.php\">Administracion</a></p>";
					}
					?>
					<form action="destroy.php" method="POST">
					<p><input type="submit" value="Desconectar" name="Desconectar" /></p>
					</form>
				<?php endif; ?>
				</div>	
			</div>
			<div id="noticias">
			<?php
			include("ultima.php");
			?>
			</div>
		</div>	
	<div id="piedepagina">
		<table><tr><td style="width:1060px">Todos los derechos reservados www.rincondelolaso.com</td> <td style="width:180px;">©rincondelolaso.com</td></tr></table>
	</div>
	
</div>
</body>
</html>