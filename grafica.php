<?php
include_once('db_configuration.php');
  $contenido = "";
  $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
  if ($connection->connect_errno) {
      printf("Connection failed: %s\n", $mysqli->connect_error);
      exit();
  }
  $contenido = "";
  if ($result = $connection->query("SELECT COUNT(*) AS mas_comentarios, usuarios.nickusuario AS usuarios FROM comentarios,usuarios WHERE comentarios.id_usuario = usuarios.id_usuario GROUP BY usuarios.id_usuario ORDER BY mas_comentarios DESC LIMIT 3")) {
  while($obj = $result->fetch_object()) {
      if($contenido != ""){
        $contenido .= ', ';
      }
       $contenido.= '["'.$obj->usuarios.'", '.$obj->mas_comentarios.']';
  }
//Free the result. Avoid High Memory Usages
$result->close();
unset($obj);
unset($connection);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar','corechart']});
      google.charts.setOnLoadCallback(drawStuff);
      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Usuarios', 'Comentarios'],
          <?php
          echo $contenido;
           ?>
        ]);
        var options = {
          title: 'Comentarios por usuario',
          width: 590,
          legend: { position: 'none' },
          chart: { title: 'Comentarios por usuario',
                   subtitle: 'Cantidad de comentarios por cada uno de los usuarios' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Usuarios'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };
        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
  </head>
  <body>
    <div id="top_x_div" style="width: 900px; height: 500px;margin-top:40px;"></div>
  </body>
</html>