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
				$_SESSION['komunikat'] = 'Błędny login lub hasło';
				header('Location: login.html');
			}
		}
		
		$polaczenie->close();
	
?>