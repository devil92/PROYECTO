<?php

session_start();

    if (isset($_SESSION['tipoacceso'])&&($_SESSION['tipoacceso']=='admin')){
        echo "";
    }
    else {
        echo "<h2>Acceso denegado, redireccionando...</h2>";
        echo "<style>div {display:none;}<style>";
    header('Refresh:1; url=indexlolo.php',True,303);
}
?>
<?php
include("db_configuration.php");
?>
<html>
<head></head>
<body>
<div id="cuerpo">

<?php if (!isset($_POST["Guardar"])) : ?>
			<?php
			
			 //CREATING THE CONNECTION
      $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
			$result=$connection->query("SELECT * FROM usuarios where id_usuario=".$_GET['id']."");
				$obj = $result->fetch_object();

			echo "<form id='editusuadmin' method='post' action='editarusu.php' >";
			echo "<p id='porculero'><label for='nombre'>Nuevo Nombre de usuario:</label></p>";
            echo "  <input name='cambiarnombre' type='text' id='nickusuario' class='nombre' value="."'".$obj->nickusuario."'"."></p>";
			echo " <p><label for='apellidos'>Nuevo Apellido:</label></p>";
            echo " <input name='cambiarapellido' type='text' id='apellidos' class='apellidos' value="."'".$obj->apellidos."'"."></p>";
			echo "	<p><label for='email'>Nuevo email:</label></p>";
            echo "  <input name='cambiaremail' type='email' id='correo' class='email' value="."'".$obj->email."'"."></p>";
			echo "	<label for='tipoacceso'>Tipo de usuario:</label></p>";
			echo "			<select id='tipoacceso' name='tipoacceso'>";
			echo "				<option value='usuario'>usuario</option>";
			echo "				<option value='admin'>admin</option>";
			echo "			</select>";
			echo "	<p><label for='pass'>Nueva contraseña:</label></p>";
            echo "   <input name='cambiarpass' type='password' id='contrasena' class='contrasena' ></p>";
			echo "<input name='idaso' type='hidden' id='principal' value=".$_GET['id'].">";
				

			echo "	<p><input type='submit' value='Guardar' name='Guardar' /></p>";
            echo "</div>";
			?>
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
