 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<title>probando</title>
 </head>
 <body>
 	<h1>hola soy la plantilla</h1>
 	<?php

 	function show_error(){
	$error = new errorController();
	$error->index();
}
 	//VERIFICAMOS SI EXISTE EL CONTROLADOR
if(isset($_GET['controller'])){
	$nombre_controlador = $_GET['controller'].'Controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
	$nombre_controlador = controller_default;
	
}else{
	show_error();
	exit();
}

if(class_exists($nombre_controlador)){	
	$controlador = new $nombre_controlador();
	
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
		$action = $_GET['action'];
		$controlador->$action();
	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$action_default = action_default;
		$controlador->$action_default();
	}else{
		show_error();
	}
}else{
	show_error();



}
?>

 
 </body>
 </html>

 