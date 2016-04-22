<?php
session_start();
$log=$_POST["txtusuario"]; /// recivo los datos de login
$cont=$_POST["txtpassword"]; // recivo los datos de la contraseña

$con = mysql_connect('localhost', 'root', '')  or die('No se pudo conectar: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db('forololo') or die('No se pudo seleccionar la base de datos');
mysql_set_charset('utf8');

$sql="SELECT * FROM usuario WHERE nickusuario='$log' and contrasena='$cont'"; // realizo la comparación con la base de datos
    $res=mysql_query($sql,$con);
    if($row=mysql_fetch_array($res)){
    $_SESSION['id']=$row['codigou']; // descargo id de la bd
    $_SESSION['nom']=$row['nombre']; // descargo el nombre de la base de datos
	$_SESSION['ns'] = $row['tipoacceso'];
    $ns=$row['tipoacceso']; // descargo el niver de usuario

 
       if($ns=='admin'){ // relizo la comparacion para saber a q menu de usuario me va direcionar si es NivelUsuario 1 va al pagina inicio administrador
            header("refresh:0.1 ;url=usuarios.php");
}else{header("refresh:0.1 ;url=indexlolo.php"); //si el NivelUsuario es mayor o diferente a 1 va la pagina inicio del usuario normal
}
            }else{
        echo"<script language='javascript'>alert('Error En el Usuario o Contraseña Intente de Nuevo'); </script>";
            header("refresh:0.1 ;url=indexlolo.php");
    }


?>