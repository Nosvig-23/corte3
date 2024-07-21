<?php 
	require_once("Autoload.php");

	$objUsuario = new Usuario();

//insertar un usuario

	$insert = $objUsuario->inertUsuario("Gibson",4147412073,"gibson@gmail.com");
	echo $insert;

//modificar un usuario

	$users = $objUsuario->getUsuarios();
	print_r("<pre>");
	print_r($users);
	print_r("<pre>");
	$updateUser = $objUsuario->updateUser(10,"Erick",4140778615,"erick@gmail.com");
	echo $updateUser;

//buscar un usuario

	$users = $objUsuario->getUser(10);
	print_r("<pre>");
	print_r($users);
	print_r("<pre>");

//elminar un usuario

	$delete = $objUsuario->deluser(2);
	echo $delete;
?>
