<!DOCTYPE html>
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
                      <a class="nav-link" href="./logged.php">Pulpit</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./transfers.php">Przelew</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"></a>
                    </li>
                  </ul>
                  <a href="./logout.php" class="btn btn-secondary">Wyloguj</a>
                </div>
			</nav>
        
				<div class="main-container">
					
			<?php
				session_start();
				require_once "connect.php";
				$dane_klienta = $polaczenie->query("SELECT * FROM customer WHERE id = ".$_SESSION['id']);
				$konta_klienta = $polaczenie->query("
					SELECT a.name, a.number, a.funds, a.currency
					FROM account a 
						JOIN account_to_customer atc ON a.id = atc.id_account
						JOIN customer c ON c.id = atc.id_customer
					WHERE c.id = ".$_SESSION['id']);
					
				$karty_klienta = $polaczenie->query("
					SELECT c.name, c.number AS `Numer_karty`
					FROM card c 
						JOIN account a ON a.id = c.account_id
						JOIN account_to_customer atc ON atc.id_account = a.id
						JOIN customer cst ON cst.id = atc.id_customer
					WHERE cst.id = ".$_SESSION['id']);
				
				while($dane = $dane_klienta->fetch_assoc())
				{
					$welcome = "Witaj, ".$dane['name']." ".$dane['surname']."!";
					echo 
					"<div class = welcome>"
						.$welcome.
					"</div>";
				}
				?>
				
				<h2>Konta</h2>
				<table class="table table-hover">
					<tr>
						<th>Nazwa</th>
						<th>Numer konta</th>
						<th>Dostępne środki</th>
					</tr>			
			<?php
				while($kon_kl = $konta_klienta->fetch_assoc())
				{
					$funds = number_format((float)$kon_kl['funds'], 2, '.', '');
					$number1 = substr($kon_kl['number'], 0, 2);
					$number2 = substr($kon_kl['number'], 2, 4);
					$number3 = substr($kon_kl['number'], 6, 4);
					$number4 = substr($kon_kl['number'], 10, 4);
					$number5 = substr($kon_kl['number'], 14, 4);
					$number6 = substr($kon_kl['number'], 18, 4);
					$number6 = substr($kon_kl['number'], 22, 4);
					$number = $number1." ".$number2." ".$number3." ".$number4." ".$number5." ".$number6;
					echo '<tr>
					<td>'.$kon_kl['name'].'</td>
					<td>'.$number.'</td>
					<td>'.$funds.' '.$kon_kl['currency'].'</td>
					</tr>
					';
				}
			?>
					
				</table>
				
				<h2>Karty</h2>
				<table class="table table-hover">
					<tr>
						<th>Nazwa</th>
						<th>Numer karty</th>
					</tr>
			<?php
				while($kar_kl = $karty_klienta->fetch_assoc())
				{
					echo '<tr>
					<td>'.$kar_kl['name'].'</td>
					<td>'.$kar_kl['Numer_karty'].'</td>
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