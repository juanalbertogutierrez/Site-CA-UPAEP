<?php
	include ("seguridad.php"); 
	include("funciones.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Competencias Cap</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style>
		a:link {color:white;}
		a:visited{color: green;}
		a:active{color: red;}
	</style>
	<script type="text/javascript">
		var cont=0,car=1;
		function cambia(){
			if(cont==0){
				document.getElementById("imgprincipal").src="imagenes/cartel1.png";
				cont++
				car=1;
			}else if(cont==1){
				document.getElementById("imgprincipal").src="imagenes/cartel2.png";
				cont++
				car=2
			}else{
				document.getElementById("imgprincipal").src="imagenes/cartel3.png";
				cont=0;
				car=3;
			}
		}
		function seleccion(tipo){
			if(tipo== 1){
				document.getElementById("imgprincipal").src="imagenes/cartel1.png";
				cont=0;
				car=1;
			}else if( tipo == 2){
				document.getElementById("imgprincipal").src="imagenes/cartel2.png";
				cont=1;
				car=2;
			}else{
				document.getElementById("imgprincipal").src="imagenes/cartel3.png";
				cont=2;
				car=3;
			}
		}

		function inicio(){
			setInterval(cambia,10000);
		}
		function pagoficial(){
			if(car==1){
				window.open("http://geeks.e-consulta.com/appinnovation2016/");
			}if(car==2){
				window.open("https://www.ibm.com/mx-es/");
			}if(car==3){
				window.open("http://fepro.cs.buap.mx/2016/Convocatoria.html");
			}
		}
		window.onload=inicio;

	</script>
</head>
<body style="color:black; background-color:#D0CBCB " width="100%">
	<header>
			<?php 
				cabeceracap();
			?>
	</header>
	<div  width="80%">
	<br>
	<br>
		<table border="0" width="80%" align="center" height="200">
			<tr height="90%">
				<td align="center">
					<img id="imgprincipal" src="imagenes/cartel1.png" width="90%" height="90%" onclick="pagoficial()">
				</td>
			</tr>
			<tr height=10%>
				<td align="center">
					<input type="image" src="imagenes/botonimg.png" name="cartel1" onclick="seleccion(1)" width="15" height="15">
					<input type="image" name="cartel1" onclick="seleccion(2)" width="15" height="15" src="imagenes/botonimg.png">
					<input type="image" name="cartel1" onclick="seleccion(3)" width="15" height="15" src="imagenes/botonimg.png">
				</td>
			</tr>
		</table>
		<br>
		<br>
	</div>
	<div style="background-color: gray ; color:white; ">
		<br>
		<br>
		<table border="0" width="80%" align="center" height="400">
			<tr>
				<td width="50%" align="center">
					<img src="imagenes/RPC.png">
					<br><a href="https://acm.javeriana.edu.co/maratones/">Sitio oficial</a>
					<br><a href="http://registro.redprogramacioncompetitiva.com/">Registro competencia</a>
				</td>
				<td width="50%" align="center">
					<img src="imagenes/GP.png">
					<br><a href="http://blogs.iteso.mx/acm/">Sitio oficial</a>
					<br><a href="http://registro.redprogramacioncompetitiva.com/">Registro competencia</a>
				</td>
			</tr>
		</table>
		<br>
		<br>
	</div>	
	<footer style="background-color: grey;color: white ;align:center" >
		<h2 align="center">Reference of production, especification the Academic Chapter </h2>
	</footer>
</body>
</html> 