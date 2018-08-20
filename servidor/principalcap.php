<?php
	include ("seguridad.php"); 
	include("funciones.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Capitulo ProCop-UPAEP</title>
	<style>
		a:link {color:white;}
		a:visited{color: green;}
		a:active{color: red;}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
<body style="color:black; background-color:#D0CBCB " width="80">
	<header>
			<?php 
				cabeceracap();
			?>
	</header>
	<div id="prim">
	<br>
	<br>
		<table border="0" width="80%" align="center" height="200" >
			<tr height="90%">
				<td align="center">
					<img id="imgprincipal" src="imagenes/cartel1.png" width="1000" height="400" onclick="pagoficial()">
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
		<table width="80%" border="0" align="center">
			<tr height="200">
				<?php
					include("conex.php");
					$link=Conectarse();
					$mat=$_SESSION['matricula'];
					$hoy=getdate();
					$day=intval($hoy['mday']);
					$mon=intval($hoy['mon']);
					$yer=intval($hoy['year']);
					$result=mysql_query("select * from competencias group by nombre_comp limit 3;",$link);
					while ($row=mysql_fetch_array($result)){
						echo "<td width='20%' align='center'><a href='fechascap.php'><img src='imagenes/fecha0.png' width='100' height='100'></a><br>Fecha: $row[0]<br>Comentario: $row[3]<br>Fecha: $row[2]</td>";
					}
				?>
			</tr><tr height="50">
				<td colspan="3" width="100%" align="center">
					<p><h1>Primeros Lugares</h1></p>
				</td>
			</tr><tr height="200">
				<?php
					$arr = array(0 => "Principiante" ,1 => "Medio",2 => "Avanzado" );
					for($i=0;$i<3;$i++){
						$val=(string)$arr[$i];
						$result_Ava=mysql_query("select integrante.nombre as matricula from resultados, integrante where integrante.matricula=resultados.matricula and integrante.categoria='$arr[$i]' group by integrante.matricula limit 3",$link);
						echo "<td width='33%' align='center'><h3>$arr[$i]</h3><br>";
						$cont=1;
						while($raw=mysql_fetch_array($result_Ava)){
							echo "$cont.- $raw[0]<br>";
							$cont++;
						}
						echo "</td>";
					}
					mysql_free_result($result);
					mysql_close($link);
				?>
			</tr>
		</table>
		<br>
		<br>
	</div>
	<div>
		<br>
		<br>
		<table width="80%" border="0" align="center">
			<tr>
				<td width="30%">
					<img src="imagenes/presidentes.png" height="50">
					<p>
						<br>Juan Alberto Gutierrez Canto
						<br>Tel:248-108-8793
						<br>emal: juanalberto.gutierrez@upaep.edu.mx
					</p>
				</td>
				<td width="30%">
					<img src="imagenes/presidentes.png" height="50">
					<p>
						<br>Horacio Jesus Jarquín Vasquez
						<br>Tel:222-222-2222
						<br>emal: horaciojesus.jarquin@upaep.edu.mx
					</p>
				</td>
				<td width="30%">
					<img src="imagenes/presidentes.png" height="50">
					<p>
						<br>Carlos Roberto Martínes Ojeda
						<br>Tel:222-222-2222
						<br>emal: carlosroberto.martinez@upaep.edu.mx
					</p>
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