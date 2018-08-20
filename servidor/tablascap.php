<?php
	include ("seguridad.php"); 
	include("funciones.php");
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Tablas Cap</title>
	<style>
		a:link {color:white;}
		a:visited{color: green;}
		a:active{color: red;}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript">
		function imprimeAvanzado(){
			document.fvalida.submit();
		}
	</script>
</head>
<body style="color:black; background-color:#D0CBCB " width="80">
	<header>
			<?php 
				cabeceracap();
			?>
	</header>
	<div>
	<br>
		<table border="0" width="80%" align="center">
			<tr height="100%">
				<td width="30%">
					<form action="tablascap.php" method="POST" name="fvalida">
						<br><input type="image" name="opc" value="1" src="imagenes/botontabA.png" width="100%" height="100%" align="left" onclick="imprimeAvanzados()">
						<br><input type="image" name="opc" value="2" src="imagenes/botontabM.png" width="100%" height="100%" align="left">
						<br><input type="image" name="opc" value="3" src="imagenes/botontabP.png" width="100%" height="100%" align="left">
					</form>
				</td>
				<td width="10%"></td>
				<td width="60%">
					<?php
					include("conex.php");
					$link=Conectarse();
					?>
					<table border=1 cellspancing=1 cellpadding=1>
						<?php
						if($_POST){
							$op=$_POST['opc'];
							if($op == 1){
								$result=mysql_query("select integrante.matricula as matricula, sum(resultados.problemas_res) as problemas,sum(resultados.puntos) as puntos, sum(resultados.tiempo_sol) as tiempo from resultados, integrante where integrante.matricula=resultados.matricula and integrante.categoria='Avanzado' group by integrante.matricula limit 10",$link);
								printf("<tr style='background-color:grey; color:white;'><td colspan='4'><h1>Avanzado</h1></td></tr>");
							}if($op == 2){
								$result=mysql_query("select integrante.matricula as matricula, sum(resultados.problemas_res) as problemas,sum(resultados.puntos) as puntos, sum(resultados.tiempo_sol) as tiempo from resultados, integrante where integrante.matricula=resultados.matricula and integrante.categoria='Medio' group by integrante.matricula limit 10",$link);
								printf("<tr style='background-color:grey; color:white;'><td colspan='4'><h1>Medio</h1></td></tr>");
							}if($op == 3){
								$result=mysql_query("select integrante.matricula as matricula, sum(resultados.problemas_res) as problemas,sum(resultados.puntos) as puntos, sum(resultados.tiempo_sol) as tiempo from resultados, integrante where integrante.matricula=resultados.matricula and integrante.categoria='Principiante' group by integrante.matricula limit 10",$link);
								printf("<tr style='background-color:grey; color:white;'><td colspan='4'><h1>Principiantes</h1></td></tr>");
							}
							printf("<tr style='background-color:grey; color:white;'><td>MATRICULA</td><td>PUNTOS ACUMULADOS</td><td>PROBLEMAS RESUELTOS</td><td>TIEMPO ACUMULADO</td></tr>");
							$var=1;
							while ($row=mysql_fetch_array($result)) {
								if($var== 1){
									printf("<tr><td>%d</td><td>%d</td><td>%d</td><td>%d</td>",$row["matricula"],$row["problemas"],$row["puntos"],$row["tiempo"]);
									$var=2;
								}else{
									printf("<tr style='background-color:#C32828; color:white;'><td>%d</td><td>%d</td><td>%d</td><td>%d</td>",$row["matricula"],$row["problemas"],$row["puntos"],$row["tiempo"]);
									$var=1;
								}
							}
							mysql_free_result($result);
						}
						else{
							printf("<h1>SELECCIONA LA CATEGORIA </h1>");
						}
						mysql_close($link);
						?>
					</table>
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
