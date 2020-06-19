<?php
session_start();
require_once "connect.php";
	
	$do=$_POST['do'];
	
if(($do == 1) || ($do == 2)) {
	
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	if($do == 1) {
		if($polaczenie->query("INSERT INTO `customer` (name, surname, username, email, password) VALUES ('$name', '$surname', '$username',
        '$email', '$password')"))
		{
            $_SESSION['komunikat']="Dodano klienta";
		}
		else
		{
			
            $_SESSION['komunikat']="Wystąpił błąd";
		}
	}
	
	if($do == 2) {
		$id = $_POST['id_customer'];
		if($polaczenie->query("UPDATE `customer` SET `name` = '$name', `surname` = '$surname', `username` = '$username', `password` = '$password', `email` = '$email' WHERE `id` = $id"))
		{
			$_SESSION['komunikat']="Edycja klienta przebiegła pomyślnie";
		}
		else
		{
			$_SESSION['komunikat']="Edycja klienta zakończona niepowodzeniem";
		}
	}
}

	if($do == 3) {
		$id = $_POST['id_customer'];
		
		if($polaczenie->query("DELETE FROM `customer` WHERE `id` = $id")) {
			$_SESSION['komunikat'] = "Usunięto klienta";
		}
		else {
			$_SESSION['komunikat']="Nie udało się usunąć kienta";
		}
    }
    
	header("Location: customers.php");
	exit();
?>