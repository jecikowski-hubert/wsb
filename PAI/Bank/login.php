<?php

	session_start();
	require_once "connect.php";
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = htmlentities($username, ENT_QUOTES, "UTF-8");
		$password = htmlentities($password, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = $polaczenie->query(
		sprintf("SELECT * FROM customer WHERE username='%s' AND password='%s'",
		mysqli_real_escape_string($polaczenie,$username),
		mysqli_real_escape_string($polaczenie,$password))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['id'] = $wiersz['id'];
				$id_customer = $_SESSION['id'];
				$polaczenie->query("UPDATE `customer` SET `last_login` = CURRENT_TIMESTAMP() WHERE `id` = $id_customer");
				$_SESSION['uzytkownik'] = $wiersz['username'];
				$_SESSION['imie'] = $wiersz['name'];
				$_SESSION['nazwisko'] = $wiersz['surname'];
				$_SESSION['email'] = $wiersz['email'];

				unset($_SESSION['komunikat']);
				$rezultat->free_result();
				header('Location: logged.php');
				
			} 

			else 
			{
					if ($rezultat = $polaczenie->query(
					sprintf("SELECT * FROM employee WHERE username='%s' AND password='%s'",
					mysqli_real_escape_string($polaczenie,$username),
					mysqli_real_escape_string($polaczenie,$password))))
					{
						$ilu_userow = $rezultat->num_rows;
						if($ilu_userow>0)
						{
							$_SESSION['zalogowany'] = true;
							$wiersz = $rezultat->fetch_assoc();
							$_SESSION['id'] = $wiersz['id'];
							$_SESSION['uzytkownik'] = $wiersz['username'];
							$_SESSION['imie'] = $wiersz['name'];
							$_SESSION['nazwisko'] = $wiersz['surname'];
							$_SESSION['email'] = $wiersz['email'];
							$_SESSION['user_type'] = $wiersz['user_type'];
			
							unset($_SESSION['komunikat']);
							$rezultat->free_result();
							header('Location: logged_employee.php');
							
						} 
						else 
						{
							$_SESSION['komunikat'] = 'Błędny login lub hasło';
							header('Location: login.html');
						}
					}
			}
		}
		
		
		$polaczenie->close();
	
?>