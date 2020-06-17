<?php
session_start();
require_once "connect.php";
	
	$do=$_POST['do'];
	
if(($do == 1) || ($do == 2)) {
	
	$name = $_POST['name'];
	$number = $_POST['number'];
	$currency = $_POST['currency'];
    $customer = $_POST['customer'];
    $last_account_id = $_POST['last_account_id'];

    echo $name.' '.$number.' '.$currency.' '.$customer.' '.$last_account_id;

    if($do == 1) 
    {
		if($polaczenie->query("INSERT INTO `account` (name, number, funds, currency) VALUES ('$name', '$number', '0', '$currency')"))
		{
            echo "Dodano konto";
            if($polaczenie->query("INSERT INTO `account_to_customer` (id_account, id_customer) VALUES ('$last_account_id', '$customer')"))
            {
                $_SESSION['komunikat']="Dodano konto";
                echo 'Dodano powiązanie z kontem';
            }
        }
            
	}
	else
	{
        $_SESSION['komunikat']="Wystąpił błąd";
        echo 'zjebałeś';   
	}
	
	if($do == 2) {
        $id = $_POST['id_account'];
        $funds = $_POST['funds'];
		if($polaczenie->query("UPDATE `account` SET `name` = '$name', `number` = '$number', funds = '$funds' `currency` = '$currency' WHERE `id` = $id"))
		{
			$_SESSION['komunikat']="Edycja konta przebiegła pomyślnie";
		}
		else
		{
			$_SESSION['komunikat']="Edycja konta zakończona niepowodzeniem";
		}
	}
}

	if($do == 3) {
		$id = $_POST['id_account'];
		
		if($polaczenie->query("DELETE FROM `account` WHERE `id` = $id")) {
			$_SESSION['komunikat'] = "Usunięto konto";
		}
		else {
			$_SESSION['komunikat']="Nie udało się usunąć konta";
		}
    }
    
	header("Location: accounts.php");
	exit();
?>