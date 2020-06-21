<html lang="PL">
<?php include ('./head.html'); ?>
<body>

    <div id="page-container">
        <div id="content-wrap">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="logged.php"><img src="logo.png" height="50px" width="50px" alt="logo"></a>
              
                <div class="collapse navbar-collapse" id="navbarColor01">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="./logged_employee.php">Pulpit</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./customers.php">Klienci</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./accounts.php">Konta</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./cards.php">Karty</a>
                    </li>
                  </ul>
                  <a href="./logout.php" class="btn btn-secondary">Wyloguj</a>
                </div>
			</nav>
        
				<div class="main-container">
					
			<?php
				session_start();
                require_once "connect.php";
                if(!isset($_SESSION['zalogowany']))
				{
					header('Location: ./login.html');
				}
                if(isset($_SESSION['komunikat']))
                {
                    echo'<div class="alert alert-warning">
                        '.$_SESSION['komunikat'].'
                    </div>';
                    unset($_SESSION['komunikat']);
                }
                $customer_list = $polaczenie->query("SELECT * FROM customer");
                ?>
                
                <?php
		
                if(isset($_GET['do']) && $_GET['do']==1) 
                {
                ?>
                
                <form action = "customers_backend.php" method = "POST" class = "form-horizontal" > <br>
                    <input type = "hidden" name = "do" value = "1">
                    
                    <label for="">Imię</label>
                    <input type = "text" name = "name" class = "form-control"> <br>
                    
                    <label for="">Nazwisko</label>
                    <input type = "text" name = "surname" class = "form-control"> <br>
                    
                    <label for="">Login</label>
                    <input type = "number" name = "username" class = "form-control" value = "<?php echo (rand(1000000000,9000000000)); ?>"> <br>
                    
                    <label for="">E-mail</label>
                    <input type = "email" name = "email" class = "form-control"> <br>
                    
                    <label for="">Hasło</label>
                    <input type = "text" name = "password" class = "form-control"> <br>

                            <br><br>
                    
                    <input type = "reset" class = "btn btn-default" value = "Wyczyść">
                    <input type = "submit" class = "btn btn-success" value = "Dodaj">
                            <br><br>
                <?php
                }
                
                if(isset($_GET['do']) && $_GET['do']==2) 
                {
                    $id_customer = $_GET['id'];
                    $customer = $polaczenie->query("SELECT * FROM customer WHERE id = $id_customer");
                    while($p = $customer->fetch_assoc()) 
                    {
                ?>
                <form action = "customers_backend.php" class = "form-horizontal" method="POST">
                    <input type = "hidden" name = "do" value = "2">
                    <input type = "hidden" name = "id_customer" value = "<?php echo $id_customer; ?>">
                    <label for="">Imię</label>
                    <input type = "text" name = "name" class = "form-control" value = "<?php echo $p['name']; ?>"> <br>
                    
                    <label for="">Nazwisko</label>
                    <input type = "surname" name = "surname" class = "form-control" value = "<?php echo $p['surname']; ?>"> <br>
                    
                    <label for="">Login</label>
                    <input type = "number" name = "username" class = "form-control" value = "<?php echo $p['username']; ?>"> <br>
                    
                    <label for="">E-mail</label>
                    <input type = "email" name = "email" class = "form-control" value = "<?php echo $p['email']; ?>"> <br>
                    
                    <label for="">Hasło</label>
                    <input type = "text" name = "password" class = "form-control" value = "<?php echo $p['password']; ?>"> <br>
                <?php
                    }
                ?>
					  </select>
                    <input type = "reset" class = "btn btn-default" value = "Wyczyść">
                    <input type = "submit" class = "btn btn-success" value = "Edytuj">

            <?php
                }
            ?>
                
                <?php
                if(isset($_GET['do']) && $_GET['do']==3) 
                {
                    $id_customer = $_GET['id'];
                    $prz = $polaczenie->query("SELECT * FROM customer WHERE id = $id_customer");
                    while($prz->fetch_assoc()) 
                    {
                ?>
                <form action = "customers_backend.php" class = "form-horizontal" method="POST">
                    <input type = "hidden" name = "do" value = "3">
                    <input type = "hidden" name = "id_customer" value = "<?php echo $id_customer; ?>">
                    <input type = "submit" class = "btn btn-danger" value = "Potwierdź usunięcie klienta">
                    <br><br>
                </form>
                <?php
                    }
                }
                ?>
				
				<h2>Karty</h2>
				<table class="table table-hover">
					<tr>
						<th>Imię</th>
						<th>Nazwisko</th>
						<th>Login</th>
						<th>E-mail</th>
						<th>Ostatnie logowanie</th>
                        <th>Akcja <a href="./customers.php?do=1" class="btn btn-primary btn-sm">Dodaj</a></th>
					</tr>
			<?php
				while($cl = $customer_list->fetch_assoc())
				{
					echo '<tr>
					<td>'.$cl['name'].'</td>
					<td>'.$cl['surname'].'</td>
					<td>'.$cl['username'].'</td>
					<td>'.$cl['email'].'</td>
                    <td>'.$cl['last_login'].'</td>
                    <td><a href="./customers.php?do=2&id='.$cl['id'].'" class = "btn btn-warning btn-sm">Edytuj</a>
					<a href="./customers.php?do=3&id='.$cl['id'].'" class = "btn btn-danger btn-sm">Usuń</a></td>
					</tr>
					';
				}
			?>
					
				</table>
				
				</div>
				
        <?php include ('footer.html'); ?>
      </div>


</body>
</html>