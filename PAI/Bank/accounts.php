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
                if(isset($_SESSION['komunikat']))
                {
                    echo'<div class="alert alert-warning">
                        '.$_SESSION['komunikat'].'
                    </div>';
                    unset($_SESSION['komunikat']);
                }
                $account_list = $polaczenie->query("
                    SELECT 
                    a.id, a.name, a.number, a.funds, a.currency, c.name AS `imie`, c.surname AS `nazwisko`
                    FROM account a
                    LEFT JOIN account_to_customer atc ON a.id = atc.id_account
                    LEFT JOIN customer c ON c.id = atc.id_customer");

                    $konta_klienta = $polaczenie->query("
                    SELECT id, name, surname FROM customer");
                    
                    $last_account = $polaczenie->query("SELECT MAX(id)+1 AS `max` FROM account");
                ?>
                
                <?php
		
                if(isset($_GET['do']) && $_GET['do']==1) 
                {
                    $first = rand(10, 99);
                    $second = 1090;
                    $third = rand(10000000, 99900000);
                    $fourth = rand(100000000000,999000000000)
                ?>
                
                <form action = "accounts_backend.php" method = "POST" class = "form-horizontal" > <br>
                    <input type = "hidden" name = "do" value = "1">
                    <?php
                        while($la = $last_account->fetch_assoc())
						{
                    ?>
                            <input type = 'hidden' name = "last_account_id" value = "<?php echo $la['max']; ?>">
                    <?php
                        }
                    ?>

                    <label for="">Nazwa konta</label>
                    <input type = "text" name = "name" class = "form-control"> <br>
                    
                    <label for="">Numer konta</label>
                    <input type = "number" name = "number" class = "form-control" value = "<?php echo $first.$second.$third.$fourth; ?>"> <br>
                    
                    <label for="">Waluta</label>
                    <select name= "currency" class="form-control" id="exampleSelect1">
                        <option value="PLN">PLN</option>
                        <option value="EUR">EUR</option>
                    </select> <br>
         
                    <label for="">Klient</label>
                    <select name= "customer" class="form-control selectpicker" id="select-country" data-live-search="true">
						<?php 
							
							while($kon_kl = $konta_klienta->fetch_assoc())
							{
						?>
								<option data-tokens="<?php echo $kon_kl['name'].' '. $kon_kl['surname'] ?>" value="<?php echo $kon_kl['id']; ?>">
									<?php echo $kon_kl['name'].' '.$kon_kl['surname'] ; ?>
								</option>
						<?php
							}
						?>
					  </select>
                            <br><br>
                    
                    <input type = "reset" class = "btn btn-default" value = "Wyczyść">
                    <input type = "submit" class = "btn btn-success" value = "Dodaj">
                            <br><br>
                <?php
                }
                
                if(isset($_GET['do']) && $_GET['do']==2) 
                {
                    $id_account = $_GET['id'];
                    $prz = $polaczenie->query("SELECT * FROM account WHERE id = $id_account");
                    while($p = $prz->fetch_assoc()) 
                    {
                ?>
                <form action = "accounts_backend.php" class = "form-horizontal" method="POST">
                    <input type = "hidden" name = "do" value = "2">
                    <input type = "hidden" name = "id_account" value = "<?php echo $id_account; ?>">
                    <label for="">Nazwa karty</label>
                    <input type = "text" name = "name" class = "form-control" value = "<?php echo $p['name']; ?>"> <br>
                    
                    <label for="">Numer karty</label>
                    <input type = "number" name = "number" class = "form-control" value = "<?php echo $p['number']; ?>"> <br>
                    
                    <div class="form-group">
						<label for="exampleInputEmail1">Kwota</label>
						<input name="funds" type="number" class="form-control" id="exampleInputEmail1" step="0.01" placeholder="Podaj kwotę">
						<small id="emailHelp" class="form-text text-muted">Maksymalna wartość to 1 000 000 000</small>
					</div>
                    
                    <label for="">Waluta</label>
                    <select name= "currency" class="form-control" id="exampleSelect1">
                        <option value="PLN">PLN</option>
                        <option value="EUR">EUR</option>
                    </select> <br>
                    
                    <label for="">Klient</label>
                    <select name= "customer" class="form-control selectpicker" id="select-country" data-live-search="true">
						<?php 
							
							while($kon_kl = $konta_klienta->fetch_assoc())
							{
						?>
								<option data-tokens="<?php echo $kon_kl['name'].' '. $kon_kl['surname'] ?>" value="<?php echo $kon_kl['id']; ?>">
									<?php echo $kon_kl['name'].' '.$kon_kl['surname'] ; ?>
								</option>
						<?php
							}
						?>
					  </select>
                    <input type = "reset" class = "btn btn-default" value = "Wyczyść">
                    <input type = "submit" class = "btn btn-success" value = "Edytuj">

                <?php
                    }
                }
                ?>
                
                <?php
                if(isset($_GET['do']) && $_GET['do']==3) 
                {
                    $id_account = $_GET['id'];
                    $prz = $polaczenie->query("SELECT * FROM account where id = $id_account");
                    while($prz->fetch_assoc()) 
                    {
                ?>
                <form action = "accounts_backend.php" class = "form-horizontal" method="POST">
                    <input type = "hidden" name = "do" value = "3">
                    <input type = "hidden" name = "id_account" value = "<?php echo $id_account; ?>">
                    <input type = "submit" class = "btn btn-danger" value = "Potwierdź usunięcie konta">
                    <br><br>
                </form>
                <?php
                    }
                }
                ?>
				
				<h2>Konta</h2>
				<table class="table table-hover">
					<tr>
						<th>Nazwa</th>
						<th>Numer</th>
						<th>Środki</th>
						<th>Właściciel</th>
                        <th>Akcja <a href="./accounts.php?do=1" class="btn btn-primary btn-sm">Dodaj</a></th>
					</tr>
			<?php
				while($al = $account_list->fetch_assoc())
				{
					$funds = number_format((float)$al['funds'], 2, '.', '');
					$number1 = substr($al['number'], 0, 2);
					$number2 = substr($al['number'], 2, 4);
					$number3 = substr($al['number'], 6, 4);
					$number4 = substr($al['number'], 10, 4);
					$number5 = substr($al['number'], 14, 4);
					$number6 = substr($al['number'], 18, 4);
					$number6 = substr($al['number'], 22, 4);
					$number = $number1." ".$number2." ".$number3." ".$number4." ".$number5." ".$number6;
					echo '<tr>
					<td>'.$al['name'].'</td>
					<td>'.$number.'</td>
					<td>'.$funds.' '.$al['currency'].'</td>
					<td>'.$al['imie'].' '.$al['nazwisko'].'</td>
                    <td><a href="./accounts.php?do=2&id='.$al['id'].'" class = "btn btn-warning btn-sm">Edytuj</a>
					<a href="./accounts.php?do=3&id='.$al['id'].'" class = "btn btn-danger btn-sm">Usuń</a></td>
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