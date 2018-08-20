<?php
	include ("seguridad.php"); 
	include("funciones.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Fechas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style>
		a:link {color:white;}
		a:visited{color: green;}
		a:active{color: red;}
	</style>
</head>
<body style="color:black; background-color:#D0CBCB " width="100%">
	<header>
			<?php 
				cabeceracap();
			?>
	</header>
	<div>
		<br>
		<br>
		<?php
			include("conex.php");
			$link=Conectarse();
		?>
		<table width="80%" border="0" align="center">
			<tr>
				<td>
					<?php
						$hoy=getdate();
						$day=intval($hoy['mday']);
						$mon=intval($hoy['mon']);
						$yer=intval($hoy['year']);
						$newtab=0;
						$result=mysql_query("select * from competencias group by fecha, nombre_comp;",$link);
						while ($row=mysql_fetch_array($result)){
							$var=1;
							$nom=$row[0];
							$fec=$row[2];
							$detalle=mysql_query("select * from competencias where nombre_comp='$nom'and fecha='$fec';",$link);
							echo "<form action='inscribir.php' method='POST' name='inscribe'><table border='1'style='background-color:#6E1A1A; color:white;' width='100%'>";
							while ($raw=mysql_fetch_array($detalle)){
								$lon=sizeof($raw);
								$eshoy=explode("-", $raw['fecha']);
								$dayf=intval($eshoy[2]);
								$monf=intval($eshoy[1]);
								$yerf=intval($eshoy[0]);
								if($day <= $dayf && $mon <= $monf && $yer <= $yerf){
									$newtab=1;
									if($var== 1){
										if($raw['comentario']!=''){
											printf("<tr align='center'><td rowspan='$lon' width='500'>%s</td><td rowspan='$lon' width='500'>%s del mes %s del año %s</td><td width='500'>%s</td><td width='500'><input type='radio' name='horario' value='$raw[1]'> %s</td><td rowspan='$lon' width='500'><button type='submit' class='btn btn-default' value='Inscribirme' name='inscribirme'>Inscribirme</button></td></tr>",$raw["nombre_comp"],$eshoy[2],$eshoy[1],$eshoy[0],$raw["comentario"],$raw["horario"]);
										}
										else{
											printf("<tr align='center'><td rowspan='$lon' width='500'>%s</td><td width='500' rowspan='$lon'>%s del mes %s del año %s</td><td width='500'> Sin comentario </td><td width='500'><input type='radio' name='horario' value='$raw[1]'> %s</td><td rowspan='$lon' width='500'><button type='submit' class='btn btn-default' value='Inscribirme' name='inscribirme'>Inscribirme</button></td></tr>",$raw["nombre_comp"],$eshoy[2],$eshoy[1],$eshoy[0],$raw["horario"]);
										}
										$var=2;
									}
									else{
										if($raw['comentario']!=''){
											printf("<tr align='center'><td>%s</td><td><input type='radio' name='horario' value='$raw[1]'>%s</td></tr>",$raw["comentario"],$raw["horario"]);
										}
										else{
											printf("<tr align='center'><td> Sin comentario </td><td><input type='radio' name='horario' value='$raw[1]'>%s</td></tr>",$raw["horario"]);
										}
										$var=1;
									}
								}
							}
							mysql_free_result($detalle);
							if($newtab==1){
								echo("<input type='hidden' name='competencia' value='$nom'><input type='hidden' name='fecha' value='$row[2]'></form></table><br><br></td></tr><tr><td>");
								$newtab=0;
							}
							
						}
						mysql_free_result($result);
						mysql_close($link);
					?>
				</td>
				<td>

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