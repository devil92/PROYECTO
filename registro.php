<?php
include("db_configuration.php");
?>
<?php
	 
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
 
	 $query = "INSERT INTO Usuarios (nombre, apellidos, email, contrasena, nickusuario) VALUES ('$_POST[nombre]',$_POST[apellidos]',$_POST[email]', '$_POST[contrasena]', $_POST[nickusuario]')";
	 
	 if (!mysql_query($query, $connection))
	 {
	 die('Error: ' . mysql_error());
	 echo "Error al crear el usuario." . "<br />";
	 }
	 
	 else{
	 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
	 echo "<h4>" . "Bienvenido: " . $_POST['nombre'] . "</h4>";
	 }
	
	 mysql_close($conexion)
	 
	?>
