<?php
	function cabecera() { ?>
		<html>
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="est_menu.css">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
			<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		</head>
		<body width="100%">
			<div id="header" style="background-color:#C32828; color:white;" link="white" vlink="white">
				<table border="0" width="90%"  align="center" id="tab">
					<tr height="10">
						<td width="30%" align="left" valign="top">
							<table width="100%" >
								<tr>
									<td>
										<a href="principaladm.php" target="_self">
											<img src="imagenes/capicono.png" width="80%" height="15%" >
										</a>
									</td>
									<td>
										<a href="http://www.upaep.mx" target="_blank">
											<img src="imagenes/upaepicono.png" width="100%" height="30%">
										</a>
									</td>
								</tr>
							</table>
							
						</td>
						<td width="60%">
							<ul class="nav">
								<li><a>COMPETENCIAS</a>
									<ul>
										<li><a href="busqueda_comp_elimina.php" target="_self">MODIFICAR</a></li>
										<li><a href="busqueda_comp_mod.php" target="_self">ELIMINAR</a></li>				
										<li><a href="anade_competencia.php" target="_self">AÑADIR</a></li>
										<li><a href="anade_imacompetencia.php" target="_self">AÑADIR IMAGEN</a></li>
									</ul>
								</li>
								<li><a>RESULTADOS</a>
									<ul>
										<li><a href="busqueda_mod.php" target="_self">MODIFICAR</a></li>
										<li><a href="busqueda_elimina.php" target="_self">ELIMINA</a></li>				
										<li><a href="anade_resultados.php" target="_self">AÑADIR</a></li>
									</ul>
								</li>
								<li><a>PROBLEMAS</a>
									<ul>
										<li><a href="problemasadmin_el.php" target="_self">ELIMINA</a></li>				
										<li><a href="problemasadmin.php" target="_self">AÑADIR</a></li>
										<li><a href="problemasadmin_mos.php" target="_self">MOSTRAR</a></li>
									</ul>
								</li>
								<li><a>TEMAS</a>
									<ul>
										<li><a href="temasadmin_el.php" target="_self">ELIMINA</a></li>				
										<li><a href="temasadmin_add.php" target="_self">AÑADIR</a></li>
										<li><a href="temasadmin_mos.php" target="_self">MOSTRAR</a></li>
									</ul>
								</li>
							</ul>
						</td>
						<td width="20%">
							<table border="0" width="100%" valign="top">
								<tr>
									<td >
										<a href="perfil.php" target="_self">
											<?php
												$mat=$_SESSION['matricula'];
												$img='fotos/'.$mat.'.jpg';
												if(is_file($img)){
													echo "<img src=$img  width='30' height='30'>";
												}
												else{
													echo "<img src='imagenes/perfilicono.png' width='30' height='30'>";
												}
											?>
										</a>
									</td>
									<td>
										<a href="http://www.facebook.com" target="_blank">
											<img src="imagenes/faceicono.png" width="30" height="30">
										</a>
									</td>
									<td>
										<a href="https://twitter.com/" target="_blank">
											<img src="imagenes/twicono.png" width="30" height="30">
										</a>
									</td>
									<td>
										<a href="salir.php">
											<img src="imagenes/logout.png" width="30" height="30">
										</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			
		</body>
		</html>
<?php 
	}
	
	function cabeceracap () {
?>
	<html>
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="est_menu.css">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
			<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		</head>
		<body width="100%">
			<div id="header" style="background-color:#C32828; color:white;" link="white" vlink="white">
		<table border="0" width="90%"  align="center" >
			<tr height="10">
				<td width="30%" align="left" valign="top">
					<table width="100%" >
						<tr>
							<td>
								<a href="principalcap.php" target="_self">
									<img src="imagenes/capicono.png" width="80%" height="15%" >
								</a>
							</td>
							<td>
								<a href="http://www.upaep.mx" target="_blank">
									<img src="imagenes/upaepicono.png" width="100%" height="30%">
								</a>
							</td>
						</tr>
					</table>
					
				</td>
				<td width="60%">
					<ul class="nav">
						<li><a>TORNEO</a>
							<ul>
								<li><a href="tablascap.php" target="_self">TABLA</a></li>
								<li><a href="estadisticascap.php" target="_self">MIS ESTADISTICAS</a></li>				
								<li><a href="fechascap.php" target="_self">FECHAS</a></li>
							</ul>
						</li>
						<li><a href="competenciascap.php" target="_self">COMPETENCIAS</a></li>
						<li><a href="problemascap_lista.php" target="_self">PROBLEMAS</a></li>									
						<li><a href="temascap_lista.php" target="_self">TEMAS</a></li>
					</ul>
				</td>
				<td width="20%">
					<table border="0" width="100%" valign="top">
						<tr>
							<td >
								<a href="perfil.php" target="_self">
									<?php
												$mat=$_SESSION['matricula'];
												$img='fotos/'.$mat.'.jpg';
												if(is_file($img)){
													echo "<img src=$img  width='30' height='30'>";
												}
												else{
													echo "<img src='imagenes/perfilicono.png' width='30' height='30'>";
												}
											?>
								</a>
							</td>
							<td>
								<a href="http://www.facebook.com" target="_blank">
									<img src="imagenes/faceicono.png" width="30" height="30">
								</a>
							</td>
							<td>
								<a href="https://twitter.com/" target="_blank">
									<img src="imagenes/twicono.png" width="30" height="30">
								</a>
							</td>
							<td>
								<a href="salir.php">
									<img src="imagenes/logout.png" width="30" height="30">
								</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
		</body>
		</html>

<?php } ?>
