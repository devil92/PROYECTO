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
 <?php if (!isset($_POST["Enviar"])) : ?> 
                <form id="form-login" method="post" action="editarpost.php" >




					<p><label for="nombretema">Nombre tema/foro:</label></p>
<select class="registro" name="id_tema">

<?php //CREATING THE CONNECTION
$connection = new mysqli("localhost", "root", "", "forololo");
$consultar="SELECT temas.id_tema,temas.nombre_tema,foro.id_foro, foro.nombre_foro FROM temas,foro where temas.id_foro=foro.id_foro";
	if ($result = $connection->query($consultar)) {
								$result2 = $connection->query("SELECT id_tema FROM post where id_post=".$_GET['id']);
								$actual=$result2->fetch_object()->id_tema;
					
								while($obj = $result->fetch_object()) {
									var_dump($obj->id_tema);
									if ($actual == $obj->id_tema){
										echo "<option selected value=\"".$obj->id_tema."\">".$obj->nombre_foro."-".$obj->nombre_tema."</option>";
										echo "<br>";
									}else{
										echo "<option value=\"".$obj->id_tema."\">".$obj->nombre_foro."-".$obj->nombre_tema."</option>";
										echo "<br>";
									}

	}//cierra el WHILE
	}


?>

	</select>
<?php
			 //CREATING THE CONNECTION
		$connection = new mysqli("localhost", "root", "", "forololo");
		//TESTING IF THE CONNECTION WAS RIGHT
		if ($connection->connect_errno) {
			printf("Connection failed: %s\n", $connection->connect_error);
			exit();
		}
			$result=$connection->query("SELECT * FROM post where id_post=".$_GET['id']."");
				$obj = $result->fetch_object();
						
                    echo "<p><label for='nombre_post'>Nombre Post:</label></p>";
                    echo "<input name='nombre_post' type='text' id='nombre_post' class='nombre_post' value="."'".$obj->nombre_post."'"."></p>";
						
					echo "<p><label for='texto_post'>texto Post:</label></p>";
					echo "<textarea name='texto_post' type='text' id='texto_post' class='texto_post' >".$obj->texto_post."</textarea>";
					
					echo "<p id='bot'><input name='Enviar' type='submit' id='boton' value='Enviar' class='boton'/></p>";
					echo "<input name='get' type='hidden' id='principa' value=".$_GET['id'].">";
					echo "</form>";
					echo "</div>";
					
?>
<?php else: ?>
</body>
</html>


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
	  $idtema=$_POST['id_tema'];
	  $nombrepost=$_POST['nombre_post'];
	  $textopost=$_POST['texto_post'];
	  $idpost=$_POST['get'];
	  var_dump($_GET);
	  $consulta="UPDATE post SET id_tema=$idtema, nombre_post='$nombrepost', texto_post='$textopost' where id_post=$idpost;";
	  //echo $_POST['enviar'];
		//echo $consulta;
	  if($connection->query($consulta)==true){
                echo "El post se ha modificado correctamente";
			   header('Refresh:2; url=post.php',true,303);
				
            }else{
                echo "No se ha podido modificar el Post seleccionado";   
            }
            unset($connection);
	  

	  
?>
<?php endif ?>
