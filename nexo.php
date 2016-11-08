<?php 
require_once("clases/AccesoDatos2.php");
require_once("clases/cd.php");
require_once("clases/estacionamiento.php");

$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'foto':
		include("partes/imagen.php");
		break;
	case 'video':
			include("partes/video.html");
		break;	
	case 'MostarBotones':
			include("partes/botonesABM.php");
		break;
	case 'MostrarGrilla':
			include("partes/formGrilla.php");
		break;
	case 'MostarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostrarFormAlta':
			include("partes/formCd.php");
		break;
	case 'MostrarFacturado':
			sleep(3);
			estacionamiento::CrearTablaFacturado();
			include("archivos/tablaFacturacion.php");
		break;
		
	case 'BorrarCD':
			$cd = cd::TraerUnCd($_POST['id']);	
			estacionamiento::sacar($cd->ingreso,$cd->patente);
			$cantidad=$cd->BorrarCd();
			echo $cantidad;

		break;
	case 'GuardarCD':
			$cd = new cd();
			$cd->id=$_POST['id'];
			$cd->patente=$_POST['patente'];
			$cd->ingreso=date("Y-m-d H:i:s"); 

			//$cd->titulo=$_POST['titulo'];
			//$cd->año=$_POST['anio'];
			$cantidad=$cd->GuardarCD();
			
			echo $cantidad;

		break;
	case 'TraerCD':
			sleep(3);
			$cd = cd::TraerUnCd($_POST['id']);		
			echo json_encode($cd) ;

		break;
	default:
		# code...
		break;
}

 ?>