<?php
include_once("./db_configuration.php");
?>
<html>
<head></head>
<body>
<div id="cuerpo">
<?php if (!isset($_POST["Guardar"])) : ?>
			
			<form id="editusuadmin" method="post" action="editarusu.php" >
				<p id="porculero"><label for="nombre">Nuevo Nombre de usuario:</label></p>
                        <input name="cambiarnombre" type="text" id="nickusuario" class="nombre" ></p>
				<p><label for="apellidos">Nuevo Apellido:</label></p>
                        <input name="cambiarapellido" type="text" id="apellidos" class="apellidos" ></p>
						<p><label for="email">Nuevo email:</label></p>
                        <input name="cambiaremail" type="email" id="correo" class="email" ></p>
				<p><label for="pass">Nueva contraseña:</label></p>
                        <input name="cambiarpass" type="password" id="contrasena" class="contrasena" ></p>
						<?php echo "<input name='idaso' type='hidden' id='principal' value=".$_GET['id'].">";?>
				

				<p><input type="submit" value="Guardar" name="Guardar" /></p>
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
	  $idea=$_POST['idaso'];
	  $consulta="UPDATE usuarios SET nombre='$cambiarnombre',apellidos='$cambiarapellido', email='$cambiaremail', contrasena="."'".md5($cambiarpass)."'"." where id_usuario='$idea';";
	 
      //var_dump($consulta);
	  //echo $idea;
	  if($connection->query($consulta)==true){
                echo "Su usuario se ha modificado correctamente";
			 header('Refresh:5; url=usuarios.php',true,303);
				
            }else{
                echo "No se ha podido modificar su usuario";   
            }
            unset($connection);
	  

	  
?>
<?php endif ?>
</body>
</html>
