<?php
echo "<h4>*Elige un tema:</br></h4>";
echo "<a href='indexlolo.php?tema=tema1'><img style='margin: 5px 5px 5px 5px' width='25px' height='15px' src='/proyecto/img/tema1.png'/></a>";
echo "<a href='indexlolo.php?tema=tema2'><img style='margin: 5px 5px 5px 5px' width='25px' height='15px' src='/proyecto/img/tema2.png'/></a>";
echo "<a href='indexlolo.php?tema=tema3'><img style='margin: 5px 5px 5px 5px' width='25px' height='15px' src='/proyecto/img/tema3.png'/></a></br>";
echo "<a href='indexlolo.php?tema=tema0'>(Por defecto)</a>";
if (isset($_GET['tema'])){
	$_SESSION['tema']=$_GET['tema'];

if (isset($_SESSION['tema'])){
		if ($_SESSION['tema']=='tema1'){
				echo "<style type='text/css'>#temas{background: #ff0000;}
				#temas{background: #ff0000;}
				#login{background: #ff0000;}
				#noticias{background: #737373}
				#main{background:#ff0000;}
				#piedepagina{background: #737373;}
				body{background: red}
				a{color: black;}
				a:hover{color: blue;}
				</style>";
		}
		elseif ($_SESSION['tema']=='tema2'){
				echo "<style type='text/css'>#sidebaraso{background: green;}
				#sidebar{background: green;}
				#login{background: green;}
				#login > h4{color: black;}
				#main{background: black}
				#contenido{background: black;}
				body{background: grey}
				a{color: white;}
				a:hover{color: blue;}
				#footerright{background: darkgreen;}'></style>";
		}
		
		elseif ($_SESSION['tema']=='tema3'){
				echo "<style type='text/css'>#sidebaraso{background: white;}
				#sidebar{background: white;}
				#login{background: white;}
				#login > h4{color: black;}
				#main{background: grey;}
				body{background: blue;}
				#contenido{background: grey;}
				a{color: black;}
				a:hover{color: blue;}
				#footerright{background: #D8D8D8; color: black}'></style>";
		}
		else {
		}
}
	else {}
	}
else {
	
}
//elementos a cambiar color:
                  
//				  tema1          tema2           tema3        
//--------------------------------------------------------				  
//#sidebaraso---> rojo --------- verde --------- blanco
//#sidebar------> rojo --------- verde --------- blanco
//#login--------> rojo --------- verde --------- blanco
//body----------> negro -------- gris ---------- azul
//#main---------> gris --------- negro --------- burdeos
//#contenido----> gris --------- negro --------- burdeos
//#footerright--> rojo oscuro -- verde oscuro -- gris
?>