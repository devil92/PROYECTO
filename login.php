<?php
include("db_configuration.php");
?>
<?php
session_start();
?>

<?php
//CREATING THE CONNECTION
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
}
//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
/* Consultas de selección que devuelven un conjunto de resultados */
$consulta="SELECT * FROM usuarios where nickusuario='".$_POST["txtusuario"]."' and contrasena=md5('".$_POST["txtpassword"]."');";
var_dump($consulta);
if ($result = $connection->query($consulta)) {
    if ($result->num_rows===0) {
      echo "LOGIN O PASS INVALIDO";
      } else {

      $_SESSION["usuario"]=$_POST["txtusuario"];
      //vemos si es admin
      	$result2 = $connection->query("SELECT * FROM usuarios where nickusuario='".$_POST["txtusuario"]."' and contrasena=md5('".$_POST["txtpassword"]."');");
	while($obj = $result2->fetch_object()) {
		$_SESSION["tipoacceso"]=$obj->tipoacceso;
	}

      header("location: indexlolo.php");
      }

    } else {
        echo "NO VALIDO";
    }


?>


