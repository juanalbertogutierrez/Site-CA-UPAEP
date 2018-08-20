<?php
	include ("seguridad.php"); 
	include("funciones.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Mis estadisticas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style>
		a:link {color:white;}
		a:visited{color: green;}
		a:active{color: red;}
	</style>
	<script type="text/javascript">
		function estadisticas(){
			alert('Debes de escribir un usuario correcto!')
				document.fvalida.submit();
		}
	</script>
</head>
<body style="background-color:#D0CBCB " width="80">
	<header>
			<?php 
				cabeceracap();
			?>
	</header>
	<div>
	<br>
	<br>
		<table border="0" width="80%" align="center">
			<tr>
				<td width="90%">
					<?php
						include("conex.php");
						$link=Conectarse();
					?>
					<table border="1" width="90%" align="center">
						<tr style='background-color:#8B1515; color:white;'>
							<td colspan="4"><h1>RESULTADOS</h1>
							</td>
						</tr>
						<tr style='background-color:grey; color:white;'>
							<td align="center">
								Tipo
							</td>
							<td align="center">
								Puntos
							</td>
							<td align="center">
								Problemas
							</td>
							<td align="center">
								tiempos
							</td>
						</tr>
						<?php
							$ma=$_SESSION["matricula"];
							$result=mysql_query("select nombre_comp as competencia, problemas_res as problemas, puntos, tiempo_sol as tiempo from resultados where matricula='$ma'",$link);
							$var=1;
							while ($row=mysql_fetch_array($result)) {
								if($var== 1){
									printf("<tr><td>%s</td><td>%d</td><td>%d</td><td>%d</td>",$row["competencia"],$row["problemas"],$row["puntos"],$row["tiempo"]);
									$var=2;
								}else{
									printf("<tr style='background-color:#C32828; color:white;'><td>%s</td><td>%d</td><td>%d</td><td>%d</td>",$row["competencia"],$row["problemas"],$row["puntos"],$row["tiempo"]);
									$var=1;
								}
							}
							mysql_free_result($result);
						?>
					</table>
					<br>
					<br>
					<table border="0" width="90%" align="center">
						<tr style='background-color:#8B1515; color:white;'>
							<td colspan="4"><h1>COMPETENCIAS INSCRITAS</h1>
							</td>
						</tr>
						<tr>
							<td>
								<?php
									$ma=$_SESSION["matricula"];
									$result=mysql_query("select nombre_comp as competencia, horario, fecha from inscripcion where matricula='$ma'",$link);
									$var=1;
									while ($row=mysql_fetch_array($result)) {
										if($var== 1){
											echo "<form action='estadisticascap.php' method='POST' name='fvalida'><table width='100%' border='1' align='center'><tr style='background-color:grey; color:white;'>
												<td align='center' width='25%'>
													Competencia: $row[0]
												</td>
												<td align='center' width='25%'>
													Horario: $row[1]
												</td>
												<td align='center' width='25%'>
													Fecha: $row[2]
												</td>
												<td rowspan='2' style='background-color:grey; color:black;' width='25%' align='center'>
													<input type='hidden' value='$row[0]' name='competencia'>
													<input type='hidden' value='$row[1]' name='horario'>
													<input type='hidden' value='$row[2]' name='fecha'>
													<button type='submit' class='btn btn-warning' value='update' name='tipo'>Elimina</button>
												</td>
											</tr>
											</table></form>";
											$var=2;
										}else{
											echo "<form action='estadisticascap.php' method='POST' name='fvalida'><table width='100%' border='1' align='center'><tr style='background-color:#C32828; color:white;'>
												<td align='center' width='25%'>
													Competencia: $row[0]
												</td>
												<td align='center' width='25%'>
													Horario: $row[1]
												</td>
												<td align='center' width='25%'>
													Fecha: $row[2]
												</td>
												<td colspan='2' style='background-color:grey; color:black;' width='25%' align='center'>
													<input type='hidden' value='$row[0]' name='competencia'>
													<input type='hidden' value='$row[1]' name='horario'>
													<input type='hidden' value='$row[2]' name='fecha'>
													<button type='submit' class='btn btn-warning' value='update' name='tipo'>Elimina</button>
												</td>
											</table></form>";
											$var=1;
										}
									}
									mysql_free_result($result);
								?>
								</td>
						</tr>
					</table>
				</td>
				<td>
					<img src="imagenes/motiva.png" >
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
<?php
	if($_POST){
		$horario=$_POST['horario'];
		$competencia=$_POST['competencia'];
		$fecha=$_POST['fecha'];
		$mat=$_SESSION['matricula'];
		$result=mysql_query("delete from inscripcion where matricula=$mat and nombre_comp='$competencia'",$link);
		echo "<script type=''> alert('inscripcion cancelada'); location.href='estadisticascap.php'; </script>";
		
	}
	mysql_close($link);
?>