<?php

	session_start();
	require_once "connect.php";
		
		$sender = $_POST['sender'];
		$receiver = $_POST['receiver'];
		$value = $_POST['value'];
		
		if($polaczenie->query("INSERT INTO `transfers` (`send_account_id`, `receive_account_id`, `value`) 
				VALUES ('$sender', '$receiver', '$value');"))
		{
				if($polaczenie->query("UPDATE `account` SET funds = funds - '$value' WHERE id = '$sender';"))
				{
					if($polaczenie->query("UPDATE `account` SET funds = funds + '$value' WHERE id = '$receiver';"))
					{
						echo "Wykonano przelew";
					}
				}
				
		}
		
		else
		{
			echo "Wystąpił błąd!";
		}
		
		header("Location: ./to_my_account.php");
		exit();

?>