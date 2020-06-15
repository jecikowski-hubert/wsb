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
            echo "jest ok";
		}
		else
		{
            $_SESSION['komunikat']="Wystąpił błąd";
            echo "błąd";
		}
	}
	
	if($do == 2) {
		$id = $_POST['id'];
		if($polaczenie->query("UPDATE `card` SET `skrot` = '$skrot', `pelna` = '$pelna' WHERE `przedmiot`.`id_przedmiot` = $id_przedmiot"))
		{
			$_SESSION['komunikat']="Edycja przedmiotu przebiegła pomyślnie";
		}
		else
		{
			$_SESSION['komunikat']="Edycja przedmiotu zakończona niepowodzeniem";
		}
	}
}

	if($do == 3) {
		$id_przedmiot = $_POST['id_przedmiot'];
		
		if($polaczenie->query("DELETE FROM `przedmiot` WHERE `id_przedmiot` = $id_przedmiot")) {
			$_SESSION['komunikat'] = "Usunięto przedmiot";
		}
		else {
			$_SESSION['komunikat']="Nie udało się usunąć przedmiotu";
		}
    }
    
	header("Location: cards.php");
	exit();
?>