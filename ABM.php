
<?php
require 'conexion.class.php';

$db=new Conexion();
		
if(isset($_POST['procesar']))
{
		$nom = $_POST['nombre'];
		$ape = $_POST['apellido'];
		$carnet = $_POST['ci'];
		$sexo = $_POST['sexo'];
		$edad = $_POST['edad'];
		$correos = $_POST['correo'];
		$fecha = $_POST['Fecha_Na'];
		$usu = $_POST['usuario'];
		$clav = $_POST['clave'];
		$query="INSERT INTO registro(nombre,apellido,ci,sexo,edad,correo,fecha_Nacimiento,usuario,clave) VALUES ('$nom','$ape','$carnet','$sexo','$edad','$correos','$fecha','$usu','sha1($clav)'";
		$result=$db->query($query);
		if($db->affected_rows<0)
		{
			header("location: usuarios.php?error=Hubo un problema");
		}
		else
		{
			header("location:usuarios.php");
		}
	}




	session_start();	
	if(isset($_POST['ingresa'])){
	$usuario=$_POST['usuario'];
	$clave=$_POST['clave'];	
	$db=new Conexion();
	$query="SELECT * FROM administrador WHERE usuario='$usuario' and clave='$clave'";
	$res=$db->query($query);
	$filas = $res->num_rows;
	if($filas>0){
		$_SESSION['usuario']=$cuenta;
		$_SESSION['clave']=$clave;
		header("location:admi.php");
	}else{
		echo "error en la autentificación";
	}
	//liberar el espacio de la consulta y cerra la conexion
	$db->close();
}

session_start();	
	if(isset($_POST['ingresa'])){
	$usuario=$_POST['usuario'];
	$clave=$_POST['clave'];	
	$db=new Conexion();
	$query="SELECT * FROM registro WHERE usuario='$usuario' and clave='$clave'";
	$res=$db->query($query);
	$filas = $res->num_rows;
	if($filas>0){
		$_SESSION['usuario']=$cuenta;
		$_SESSION['clave']=$clave;
		header("location:transacciones.php");
	}else{
		echo "error en la autentificación";
	}
	//liberar el espacio de la consulta y cerra la conexion
	$db->close();
}

session_start();	
	if(isset($_POST['ingresa'])){
	$usuario=$_POST['usuario'];
	$clave=$_POST['clave'];	
	$db=new Conexion();
	$query="SELECT * FROM administrador WHERE usuario='$usuario' and clave='$clave'";
	$res=$db->query($query);
	$filas = $res->num_rows;
	if($filas>0){
		$_SESSION['usuario']=$cuenta;
		$_SESSION['clave']=$clave;
		header("location:admi.php");
	}else{
		echo "error en la autentificación";
	}
	//liberar el espacio de la consulta y cerra la conexion
	$db->close();
}





	$db=new Conexion();

	if(isset($_POST['editar'])){	
		$nombre = $_POST['nombre'];		
		$apellido=$_POST['apellido'];
		$ci=$_POST['ci'];
		$sexo = $_POST['sexo'];
		$edad = $_POST['edad'];
		$correo=$_POST['correo'];
		$fecha = $_POST['Fecha_Na'];
		$usuario=$_POST['usuario'];	
		$clave=$_POST['clave'];
		$query= "UPDATE registro set nombre = '$nombre',apellido = '$apellido',ci = '$ci',sexo = '$sexo',edad = '$edad',correo = '$correo', fecha_Nacimiento = '$fecha',usuario = '$usuario', clave = 'md5($clave)' WHERE nombre = '$nombre'";
		$result=$db->query($query);

		if($db->affected_rows>0)
		{
			header("location: usuarios.php?error=Hubo un problema");
			imap_alerts("correcto");
		}else
		{
			header("location: usuarios.php");
		}

	}
  ?>