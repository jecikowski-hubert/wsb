<?php
session_start();
require_once "connect.php";
	
	$do=$_POST['do'];
	
if(($do == 1) || ($do == 2)) {
	
	$name = $_POST['name'];
	$number = $_POST['number'];
	$status = $_POST['status'];
	$currency = $_POST['currency'];
	$insurance = $_POST['insurance'];
	$customer = $_POST['customer'];

	if($do == 1) {
		if($polaczenie->query("INSERT INTO `card` (name, number, status, currency, insurance, account_id) VALUES ('$name', '$number', '$status',
        '$currency', '$insurance', '$customer')"))
		{
            $_SESSION['komunikat']="Dodano kartę";
		}
		else
		{
			
            $_SESSION['komunikat']="Wystąpił błąd";
		}
	}
	
	if($do == 2) {
		$id = $_POST['id_card'];
		if($polaczenie->query("UPDATE `card` SET `name` = '$name', `number` = '$number', `status` = '$status', `currency` = '$currency', `insurance` = '$insurance', `account_id` = '$customer' WHERE `id` = $id"))
		{
			$_SESSION['komunikat']="Edycja karty przebiegła pomyślnie";
		}
		else
		{
			$_SESSION['komunikat']="Edycja karty zakończona niepowodzeniem";
		}
	}
}

	if($do == 3) {
		$id = $_POST['id_card'];
		
		if($polaczenie->query("DELETE FROM `card` WHERE `id` = $id")) {
			$_SESSION['komunikat'] = "Usunięto kartę";
		}
		else {
			$_SESSION['komunikat']="Nie udało się usunąć karty";
		}
    }
    
	header("Location: cards.php");
	exit();
?>