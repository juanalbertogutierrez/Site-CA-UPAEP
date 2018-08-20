<?php
	include ("seguridad.php"); 
	include("funciones.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Perfil Cap</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style>
		a:link {color:white;}
		a:visited{color: green;}
		a:active{color: red;}
	</style>
	<script type="text/javascript">
		function editar(){
			document.fvalida.submit();
		}
	</script>
</head>
<body style="color:black; background-color:#D0CBCB " width="100%">
	<header>
			<?php 
				cabecera();
			?>
	</header>
	<div>
	<br>
		<?php
			include("conex.php");
			$link=Conectarse();
		?>
		<table border="0" width="50%" align="center">
			<?php
				$mat=$_SESSION['matricula'];
				if($_POST){
					$tipo=$_POST['tipo'];
					if($tipo=='edita'){
						$result=mysql_query("select * from integrante where matricula='$mat'",$link);
						$row=mysql_fetch_array($result);
						$img='fotos/'.$mat.'.jpg';
						if(is_file($img)){
							$img='fotos/'.$mat.'.jpg';
						}
						else{
							$img='imagenes/perfilicono.png';
						}
						echo "<form action='perfil.php' method='POST' name='fvalida'><table border='0' align='center'><tr height='100%'>
								<td width='30%' rowspan='12' align='center' valign='top'><img src=$img width='100' height='100'><br>
									<button type='submit' class='btn btn-success' value='update' name='tipo'>Guardar</button>
									</td>
								<td width='10%'' align='right'></td><td width='40%'></td>
								</tr><tr>
								<td width='10%' align='center' style='background-color:#C32828; color:white;'><h5>Nombre:</h5></td>
								<td width='40%' style='background-color:grey; color:black;'><h5><input type='text' name='nombre' value='$row[1]'> </h5></td>
								</tr><tr>
								<td align='center' style='background-color:#C32828; color:white;'> <h5>Apellido paterno: </h5></td>
								<td style='background-color:grey; color:black;'><h5> <input type='text' name='ap' value='$row[2]'></h5> </td>
								</tr><tr>
								<td align='center' style='background-color:#C32828; color:white;'> <h5>Apellido Materno: </h5></td>
								<td style='background-color:grey; color:black;'><h5> <input type='text' name='am' value='$row[3]'></h5> </td>
								</tr><tr>
								<td align='center' style='background-color:#C32828; color:white;'><h5> ID: </h5></td>
								<td style='background-color:grey; color:black;'><h5> <input type='text' name='id' value='$row[4]'></h5> </td>
								</tr><tr>
								<td align='center' style='background-color:#C32828; color:white;'><h5> Correo: </h5></td>
								<td style='background-color:grey; color:black;'><h5> <input type='text' name='mail' value='$row[5]'></h5> </td>
								</tr><tr>
								<td align='center' style='background-color:#C32828; color:white;'><h5> Carrera: </h5></td>
								<td style='background-color:grey; color:black;'>
									<h5>
										<select name='carrera'>
											<option selected value='$row[6]'>$row[6]</option>
											<option value='Ingeniería en Software'>Ingenieria en Software</option>
											<option value='Ingeniería en Sistemas Computacionales'>Ingenieria en Sistemas Computacionales</option>
										</select>
										
									</h5>
								</td>
								</tr><tr>
								<td align='center' style='background-color:#C32828; color:white;'><h5> Semestre: </h5></td>
								<td style='background-color:grey; color:black;'>
									<h5> 
										<select name='semestre'>
											<option selected value='$row[7]'>$row[7]</option>
											<option value='Primero'>Primero </option>
											<option value='Segundo'>Segundo </option>
											<option value='Tercero'>Tercero </option>
											<option value='Cuarto'>Cuarto </option>
											<option value='Quinto'>Quinto </option>
											<option value='Sexto'>Sexto </option>
											<option value='Séptimo'>Séptimo </option>
											<option value='Octavo'>Octavo </option>
											<option value='Noveno'>Noveno </option>
											<option value='Décimo'>Décimo </option>
											<option value='Undécimo'>Undécimo</option>
											<option value='Duodécimo'>Duodécimo</option>
										</select>
									</h5> 
								</td>
								</tr><tr>
								<td align='center' style='background-color:#C32828; color:white;'><h5> ID uva: </h5></td>
								<td style='background-color:grey; color:black;'><h5> <input type='text' name='uva' value='$row[9]'></h5> </td>
								</tr><tr>
								<td align='center' style='background-color:#C32828; color:white;'><h5> Password: </h5></td>
								<td style='background-color:grey; color:black;'><h5> <input type='password' name='pass' value='' required></h5> </td>
								</tr> </table> </form>";
					}
					if($tipo=='update'){
						$nom=$_POST['nombre'];
						$ap=$_POST['ap'];
						$am=$_POST['am'];
						$id=$_POST['id'];
						$mail=$_POST['mail'];
						$carrera=$_POST['carrera'];
						$semestre=$_POST['semestre'];
						$uva=$_POST['uva'];
						$pass=$_POST['pass'];
						$check=mysql_query("select * from integrante where matricula='$mat' AND password=MD5('$pass');");
						if($raw=mysql_fetch_array($check)){
							$result=mysql_query("update integrante set nombre='$nom',ap='$ap',am='$am',id='$id',correo='$mail',carrera='$carrera',semestre='$semestre' where matricula='$mat';",$link);
							echo "<script type=''>
									alert('Datos modificados');
									location.href='pefil.php';
									</script>";
						}
						else{
							echo "<script type=''>
									alert('Contraseña incorrecta');
									location.href='pefil.php';
									</script>";
						}
					}
					if($tipo=='foto'){
						$img='fotos/'.$mat.'.jpg';
						if(is_file($img)){
							$img='fotos/'.$mat.'.jpg';
						}
						else{
							$img='imagenes/perfilicono.png';
						}
						echo "<form action='perfil.php' method='POST' name='fvalida' enctype='multipart/form-data'><table border='0' align='center'><tr height='100%'>
								<td rowspan='3'width='30%' align='center' valign='top'><img src=$img width='100' height='100'><br><br>
									<button type='submit' class='btn btn-success' value='upfoto' name='tipo'>Guardar</button>
									</td>
								<td width='10%'' align='right'></td><td width='40%'></td>
								</tr><tr>
								<td align='center' style='background-color:#C32828; color:white;'><h5> Examinar: </h5></td>
								<td style='background-color:grey; color:white;'><h5> <input type='file' name='archivo'></h5> </td>
								</tr><tr>
								<td align='center' style='background-color:#C32828; color:white;'><h5> Password: </h5></td>
								<td style='background-color:grey; color:black;'><h5> <input type='password' name='pass' value='' required></h5> </td>
								</tr> </table> </form>";
					}
					if($tipo=='upfoto'){
						$nombre = $_FILES['archivo']['name'];
						$tipo=$_FILES['archivo']['type'];
						$tamanio=$_FILES['archivo']['size'];
						$ruta=$_FILES['archivo']['tmp_name'];
						$destino="fotos/".$mat.".jpg";
						$pass=$_POST['pass'];
						$check=mysql_query("select * from integrante where matricula='$mat' AND password=MD5('$pass');");
						if($raw=mysql_fetch_array($check)){
							if($nombre!=""){
								if(unlink($destino)){
									if(copy($ruta,$destino)){
										echo "<script type=''>
										alert('Foto modificada');
										location.href='pefil.php';
										</script>";
									}
									else{
										echo "<script type=''>
										alert('Error al modificar foto');
										location.href='pefil.php';
										</script>";
									}
								}
								else{
									echo "<script type=''>
										alert('Error al modificar foto');
										location.href='pefil.php';
										</script>";
								}
							}
							else{
								echo "<script type=''>
										alert('No existe el archivo');
										location.href='pefil.php';
										</script>";
							}
						}
						else{
							echo "<script type=''>
									alert('Contraseña incorrecta');
									location.href='pefil.php';
									</script>";
						}
					}
					if($tipo=='pass'){
						$img='fotos/'.$mat.'.jpg';
						if(is_file($img)){
							$img='fotos/'.$mat.'.jpg';
						}
						else{
							$img='imagenes/perfilicono.png';
						}
						echo "<form action='perfil.php' method='POST' name='fvalida'><table border='0' align='center'><tr height='100%'>
								<td rowspan='4'width='30%' align='center' valign='top'><img src=$img width='100' height='100'><br><br>
									<button type='submit' class='btn btn-success' value='uppass' name='tipo'>Guardar</button>
									</td>
								<td width='10%'' align='right'></td><td width='40%'></td>
								</tr><tr>
								<td align='center' style='background-color:#C32828; color:white;'><h5> Password nueva: </h5></td>
								<td style='background-color:grey; color:black;'><h5> <input type='password' name='nuepass'></h5> </td>
								</tr><tr>
								<td align='center' style='background-color:#C32828; color:white;'><h5> Confirmar password: </h5></td>
								<td style='background-color:grey; color:black;'><h5> <input type='password' name='confpass'></h5> </td>
								</tr><tr>
								<td align='center' style='background-color:#C32828; color:white;'><h5> Password vieja: </h5></td>
								<td style='background-color:grey; color:black;'><h5> <input type='password' name='pass' value='' required></h5> </td>
								</tr> </table> </form>";
					}
					if($tipo=='uppass'){
						$confpass=$_POST['confpass'];
						$nuepass=$_POST['nuepass'];
						$pass=$_POST['pass'];
						echo "$confpass $nuepass $pass";
						$check=mysql_query("select * from integrante where matricula='$mat' AND password=MD5('$pass');");
						if($raw=mysql_fetch_array($check)){
							if(!strcmp($nuepass,$confpass)){
								$result=mysql_query("update integrante set password=MD5('$nuepass') where matricula='$mat';",$link);
								echo "<script type=''>
									alert('Password modificada');
									location.href='pefil.php';
									</script>";
							}
							else{
								echo "<script type=''>
									alert('Las contraseñas no coinciden');
									location.href='pefil.php';
									</script>";
							}
							
						}
						else{
							echo "<script type=''>
									alert('Contraseña incorrecta');
									location.href='pefil.php';
									</script>";
						}
					}
				}
				else{
					$result=mysql_query("select * from integrante where matricula='$mat'",$link);
					$row=mysql_fetch_array($result);
					$img='fotos/'.$mat.'.jpg';
					if(is_file($img)){
						$img='fotos/'.$mat.'.jpg';
					}
					else{
						$img='imagenes/perfilicono.png';
					}
					echo "<tr height='100%'>
							<td width='30%' rowspan='12' align='center' valign='top'><img src=$img width='100' height='100'><br>
								<form action='perfil.php' method='POST' name='fvalida'>
									<br><br>
									<button type='submit' class='btn btn-success' value='edita' name='tipo'>Editar informacion</button></form>
								<form action='perfil.php' method='POST' name='fvalida'>
									<br><br>
									<button type='submit' class='btn btn-success' value='pass' name='tipo'>Editar contraseña</button></form>
								<form action='perfil.php' method='POST' name='fvalida'>
									<br><br>
									<button type='submit' class='btn btn-success' value='foto' name='tipo'>Editar foto</button>
								</form></td>
							<td width='10%'' align='right'></td><td width='40%'></td>
							</tr><tr>
							<td width='10%' align='center' style='background-color:#C32828; color:white;'><h5>Nombre:</h5></td>
							<td width='40%' style='background-color:grey; color:white;'><h5> $row[1] $row[2] $row[3]</h5></td>
							</tr><tr>
							<td align='center' style='background-color:#C32828; color:white;'> <h5>Matricula: </h5></td>
							<td style='background-color:grey; color:white;'><h5>$row[0] </h5> </td>
							</tr><tr>
							<td align='center' style='background-color:#C32828; color:white;'><h5> ID: </h5></td>
							<td style='background-color:grey; color:white;'><h5> $row[4]</h5> </td>
							</tr><tr>
							<td align='center' style='background-color:#C32828; color:white;'><h5> Correo: </h5></td>
							<td style='background-color:grey; color:white;'><h5> $row[5]</h5> </td>
							</tr><tr>
							<td align='center' style='background-color:#C32828; color:white;'><h5> Carrera: </h5></td>
							<td style='background-color:grey; color:white;'><h5> $row[6]</h5></td>
							</tr><tr>
							<td align='center' style='background-color:#C32828; color:white;'><h5> Semestre: </h5></td>
							<td style='background-color:grey; color:white;'><h5> $row[7]</h5> </td>
							</tr><tr>
							<td align='center' style='background-color:#C32828; color:white;'><h5> Categoria:</h5></td>
							<td style='background-color:grey; color:white;'><h5> $row[10]</h5> </td>
							</tr><tr>
							<td align='center' style='background-color:#C32828; color:white;'><h5> ID uva: </h5></td>
							<td style='background-color:grey; color:white;'><h5>$row[9]</h5> </td>
							</tr>";
				}
				mysql_free_result($result);
				mysql_close($link);
			?>
		</table>
	<br>
	<br>
	</div>
	<footer style="background-color: grey;color: white ;align:center" >
		<h2 align="center">Reference of production, especification the Academic Chapter </h2>
	</footer>
</body>
</html>
