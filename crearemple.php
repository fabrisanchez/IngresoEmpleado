<?php

include_once 'Database.php';
include_once 'Empleados.php';


$database = new Database();
$db = $database->getConnection();

$item = new Empleados($db);
	 	

if (isset($_POST['identidad']) &&
    isset($_POST['nombres']) && 
    isset($_POST['apellidos']) &&
    isset($_POST['fechanac']) && 
    isset($_POST['sexo']) &&
    isset($_POST['estadocivil']) &&
    isset($_POST['pais']))
{

	    $identidad = $_POST['identidad'];
		$nombres = $_POST['nombres'];
	    $apellidos = $_POST['apellidos'];
	    $fechanac = $_POST['fechanac'];
	    $sexo = $_POST['sexo'];
	    $estadocivil = $_POST['estadocivil'];
	    $pais = $_POST['pais'];	

	    $item->identidad = $identidad;  
        $item->nombres = $nombres;
        $item->apellidos= $apellidos;
        $item->fechanac= $fechanac;
        $item->sexo = $sexo;
        $item->estadocivil = $estadocivil;
        $item->pais = $pais;


	if($item->createEmpleado())
	{
		echo "Se Ingreso correctamente";
		echo "<br>";
		echo "<a href='formularioemple.php'>REGRESAR ATRAS</a>";
	}else
 	{
 		echo "El empleado no se ingreso.";
 	}
   }else{
	echo "<br>";
	echo "ERROR, the ejecution is stop";
}
?>