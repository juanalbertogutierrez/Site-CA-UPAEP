<?php
	session_start();
	if (!$_SESSION ) { 
    //si no existe, envio a la página de autentificacion 
    header("Location: index.php"); 
    //ademas salgo de este script 
    exit(); 
    } 
	include("conex.php");
	$link=Conectarse();
	if($_POST){
		$mat=$_SESSION['matricula'];
		$competencia=$_POST['competencia'];
		$horario=$_POST['horario'];
		$fecha=$_POST['fecha'];
		$check=mysql_query("select * from inscripcion where matricula=$mat and nombre_comp='$competencia' and fecha='$fecha';",$link);
		if($resultado=mysql_fetch_array($check)){
			echo "<script type=''>
				alert('El usuario ya esta inscrito en esta fecha'); 
				location.href='fechascap.php'
				</script>";
		}
		else{
			$inscribe=mysql_query("insert into inscripcion values($mat,'$competencia','$horario','$fecha');",$link);
			$checka=mysql_query("select * from inscripcion where matricula=$mat and nombre_comp='$competencia' and horario='$horario' and fecha='$fecha';",$link);
			if($resultado=mysql_fetch_array($checka)){
					echo "<script type=''>
					alert('Usuario inscrito'); 
					location.href='fechascap.php'
					</script>";
			}
			else{
				echo "<script type=''>
				alert('No se pudo inscribir');
				location.href='fechascap.php';
				</script>";
			}
		}
		
		mysql_free_result($inscribe);
	}
	mysql_close($link);
?>