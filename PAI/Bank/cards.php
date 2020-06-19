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

                if(isset($_SESSION['komunikat']))
                {
                    echo'<div class="alert alert-warning">
                        '.$_SESSION['komunikat'].'
                    </div>';
                    unset($_SESSION['komunikat']);
                }

                require_once "connect.php";
                $cards_list = $polaczenie->query("
                    SELECT 
                    c.id,
                    c.name,
                    c.number,
                    CASE
                        WHEN c.status = 1 THEN 'Aktywna'
                        ELSE 'Nieaktywna'
                    END AS `status`,
                    c.currency,
                    CASE
                        WHEN c.insurance = 1 THEN 'Ubezpieczona'
                        ELSE 'Nieubezpieczona'
                    END AS `ubezpieczenie`,
                    CONCAT(cu.name, ' ', cu.surname) AS `owner`
                    FROM card c
                    LEFT JOIN customer cu ON c.account_id = cu.id");

                    $konta_klienta = $polaczenie->query("
					SELECT id, name, surname FROM customer");
                ?>
                
                <?php
		
                if(isset($_GET['do']) && $_GET['do']==1) 
                {
                ?>
                
                <form action = "cards_backend.php" method = "POST" class = "form-horizontal" > <br>
                    <input type = "hidden" name = "do" value = "1">
                    
                    <label for="">Nazwa karty</label>
                    <input type = "text" name = "name" class = "form-control"> <br>
                    
                    <label for="">Numer karty</label>
                    <input type = "number" name = "number" class = "form-control" value = "<?php echo (rand(5100000000000000,5500000000000000)); ?>"> <br>
                    
                    <label for="">Status</label>
                    <select name= "status" class="form-control" id="exampleSelect1">
                        <option value="1">Aktywna</option>
                        <option value="0">Nieaktywna</option>
                    </select> <br>
                    
                    <label for="">Waluta</label>
                    <select name= "currency" class="form-control" id="exampleSelect1">
                        <option value="PLN">PLN</option>
                        <option value="EUR">EUR</option>
                    </select> <br>
                    
                    <label for="">Ubezpieczenie</label>
                    <select name= "insurance" class="form-control" id="exampleSelect1">
                        <option value="1">Tak</option>
                        <option value="0">Nie</option>
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
                    $id_card = $_GET['id'];
                    $prz = $polaczenie->query("SELECT * FROM card WHERE id = $id_card");
                    while($p = $prz->fetch_assoc()) 
                    {
                ?>
                <form action = "cards_backend.php" class = "form-horizontal" method="POST">
                    <input type = "hidden" name = "do" value = "2">
                    <input type = "hidden" name = "id_card" value = "<?php echo $id_card; ?>">
                    <label for="">Nazwa karty</label>
                    <input type = "text" name = "name" class = "form-control" value = "<?php echo $p['name']; ?>"> <br>
                    
                    <label for="">Numer karty</label>
                    <input type = "number" name = "number" class = "form-control" value = "<?php echo $p['number']; ?>"> <br>
                    
                    <label for="">Status</label>
                    <select name= "status" class="form-control" id="exampleSelect1">
                        <option value="1">Aktywna</option>
                        <option value="0">Nieaktywna</option>
                    </select> <br>
                    
                    <label for="">Waluta</label>
                    <select name= "currency" class="form-control" id="exampleSelect1">
                        <option value="PLN">PLN</option>
                        <option value="EUR">EUR</option>
                    </select> <br>
                    
                    <label for="">Ubezpieczenie</label>
                    <select name= "insurance" class="form-control" id="exampleSelect1">
                        <option value="1">Tak</option>
                        <option value="0">Nie</option>
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
                    $id_card = $_GET['id'];
                    $prz = $polaczenie->query("SELECT * FROM card where id = $id_card");
                    while($prz->fetch_assoc()) 
                    {
                ?>
                <form action = "cards_backend.php" class = "form-horizontal" method="POST">
                    <input type = "hidden" name = "do" value = "3">
                    <input type = "hidden" name = "id_card" value = "<?php echo $id_card; ?>">
                    <input type = "submit" class = "btn btn-danger" value = "Potwierdź usunięcie karty">
                    <br><br>
                </form>
                <?php
                    }
                }
                ?>
				
				<h2>Karty</h2>
				<table class="table table-hover">
					<tr>
						<th>Nazwa</th>
						<th>Numer</th>
						<th>Status</th>
						<th>Ubezpieczenie</th>
						<th>Właściciel</th>
                        <th>Akcja <a href="./cards.php?do=1" class="btn btn-primary btn-sm">Dodaj</a></th>
					</tr>
			<?php
				while($cl = $cards_list->fetch_assoc())
				{
					$number2 = substr($cl['number'], 0, 4);
					$number3 = substr($cl['number'], 4, 4);
					$number4 = substr($cl['number'], 8, 4);
					$number5 = substr($cl['number'], 12, 4);
					$number = $number2." ".$number3." ".$number4." ".$number5;
					echo '<tr>
					<td>'.$cl['name'].'</td>
					<td>'.$number.'</td>
					<td>'.$cl['status'].'</td>
					<td>'.$cl['ubezpieczenie'].'</td>
                    <td>'.$cl['owner'].'</td>
                    <td><a href="./cards.php?do=2&id='.$cl['id'].'" class = "btn btn-warning btn-sm">Edytuj</a>
					<a href="./cards.php?do=3&id='.$cl['id'].'" class = "btn btn-danger btn-sm">Usuń</a></td>
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