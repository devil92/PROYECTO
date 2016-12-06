<html>
<head>
</head>
<body>
<style>
#principal {
  width: 800px;
  margin: 10px auto;
  overflow-y: auto;
}

#imagen {
    width: 300px;
    float:left;
}

#datos {
  float: left;
  width: 400px;
}

img {
  width: 250px;
  margin: 10px;
}

</style>
<?php

	$v2=array(
	array('id' => 0 ,'Nombre' => 'Paco','Apellidos' => 'Lopez', 'Direccion' => 'San Jacinto' , 'Telefono' => '611111111','email' => 'pacaso@gmail.com', 'imagen' => 'paco.jpg'),
	array('id' => 0 ,'Nombre' => 'Pepe','Apellidos' => 'Ruiz', 'Direccion' => 'San Vicente de Paul' , 'Telefono' => '611111112','email' => 'pepaso@gmail.com', 'imagen' => 'pepe.jpg'),
	array('id' => 0 ,'Nombre' => 'Antonio','Apellidos' => 'Benitez', 'Direccion' => 'San Juan de Dios' , 'Telefono' => '611111113','email' => 'antoniaso@gmail.com', 'imagen' => 'antonio.jpg'),
	array('id' => 0 ,'Nombre' => 'Juan','Apellidos' => 'Manquete', 'Direccion' => 'Evangelista' , 'Telefono' => '611111114','email' => 'juanaso@gmail.com', 'imagen' => 'juan.jpg'),
	array('id' => 0 ,'Nombre' => 'Santi','Apellidos' => 'Perdidas', 'Direccion' => 'Pages del corro' , 'Telefono' => '611111115','email' => 'santiaso@gmail.com', 'imagen' => ''),
	array('id' => 0 ,'Nombre' => 'Pedro','Apellidos' => 'Negro', 'Direccion' => 'Lopez de Gomara' , 'Telefono' => '611111116', 'email' => 'pedraso@gmail.com','imagen' => ''),
  array('id' => 0 ,'Nombre' => 'Vicente','Apellidos' => 'Frente', 'Direccion' => 'Luz Arriero' , 'Telefono' => '611111117','email' => 'vicentaso@gmail.com', 'imagen' => ''),
	array('id' => 0 ,'Nombre' => 'Norberto','Apellidos' => 'Rodriguez', 'Direccion' => 'Febo' , 'Telefono' => '611111118','email' => 'norbertaso@gmail.com', 'imagen' => ''),
	array('id' => 0 ,'Nombre' => 'Daniel','Apellidos' => 'Boniato', 'Direccion' => 'San Gabriel' , 'Telefono' => '611111119','email' => 'danielaso@gmail.com', 'imagen' => ''),
	array('id' => 0 ,'Nombre' => 'Arturo','Apellidos' => 'Duros', 'Direccion' => 'Ardilla' , 'Telefono' => '611111110','email' => 'arturaso@gmail.com', 'imagen' => ''),
	);

	$datos=$v2[$_GET['id']];

 ?>
<div id="principal">
 <div id="imagen">
   <img src="<?php echo $datos['imagen'];?>">
 </div>
 <div id="datos">
 <h3><?php echo $datos['Nombre']." ".$datos['Apellidos'];?></h3>
 <b>Contact Information</b>
 <p><b>Email</b> <?php echo $datos['email'];?></p>
 <p><b>Phone</b> <?php echo $datos['Telefono'];?></p>
 </br>
 <p><a>StanfordWho listing</a></p>
 <p><a>URL of this page</a></p>
</div>
</div>
</body>
</html>
