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
				if(isset($_SESSION['komunikat']))
                {
                    echo'<div class="alert alert-warning">
                        '.$_SESSION['komunikat'].'
                    </div>';
                    unset($_SESSION['komunikat']);
                }
				$konta_klienta = $polaczenie->query("
					SELECT a.id, a.name, a.number, a.funds, a.currency
					FROM account a 
						JOIN account_to_customer atc ON a.id = atc.id_account
						JOIN customer c ON c.id = atc.id_customer
					WHERE c.id = ".$_SESSION['id']);
					
				$konta_klienta2 = $polaczenie->query("
					SELECT a.id, a.name, a.number, a.funds, a.currency
					FROM account a 
						JOIN account_to_customer atc ON a.id = atc.id_account
						JOIN customer c ON c.id = atc.id_customer
					WHERE c.id = ".$_SESSION['id']);
			?>
			
				<form name= "transferToMyAccount" action="to_my_account_backend.php" method="POST">
				  <fieldset>
					<legend>Przelew na rachunek własny</legend>

					<div class="form-group">
					  <label for="exampleSelect1">Wybierz rachunek źródłowy</label>
					  <select name= "sender" class="form-control" id="exampleSelect1">
						<?php 
							
							while($kon_kl = $konta_klienta->fetch_assoc())
							{
								$number1 = substr($kon_kl['number'], 0, 2);
								$number2 = substr($kon_kl['number'], 2, 4);
								$number3 = substr($kon_kl['number'], 6, 4);
								$number4 = substr($kon_kl['number'], 10, 4);
								$number5 = substr($kon_kl['number'], 14, 4);
								$number6 = substr($kon_kl['number'], 18, 4);
								$number6 = substr($kon_kl['number'], 22, 4);
								$number = $number1." ".$number2." ".$number3." ".$number4." ".$number5." ".$number6;
						?>
								<option value="<?php echo $kon_kl['id']; ?>">
									<?php echo $number.' | '. $kon_kl['name'].' ('.$kon_kl['funds'].' '.$kon_kl['currency'].' )'; ?>
								</option>
						<?php
							}
						?>
					  </select>
					</div>
					
					<div class="form-group">
					  <label for="exampleSelect1">Wybierz rachunek docelowy</label>
					  <select name= "receiver" class="form-control" id="exampleSelect1">
						<?php 
							
							while($kon_kl = $konta_klienta2->fetch_assoc())
							{
								$number1 = substr($kon_kl['number'], 0, 2);
								$number2 = substr($kon_kl['number'], 2, 4);
								$number3 = substr($kon_kl['number'], 6, 4);
								$number4 = substr($kon_kl['number'], 10, 4);
								$number5 = substr($kon_kl['number'], 14, 4);
								$number6 = substr($kon_kl['number'], 18, 4);
								$number6 = substr($kon_kl['number'], 22, 4);
								$number = $number1." ".$number2." ".$number3." ".$number4." ".$number5." ".$number6;
						?>
								<option value="<?php echo $kon_kl['id']; ?>">
									<?php echo $number.' | '. $kon_kl['name'].' ('.$kon_kl['funds'].' '.$kon_kl['currency'].' )'; ?>
								</option>
						<?php
							}
						?>
					  </select>
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Kwota</label>
						<input name="value" type="number" class="form-control" id="exampleInputEmail1" step="0.01" placeholder="Podaj kwotę" required>
						<small id="emailHelp" class="form-text text-muted">Maksymalna wartość to 1 000 000 000</small>
					</div>

					<button type="submit" class="btn btn-primary">Wyślij</button>
				  </fieldset>
				</form>
				</div>
				
        <?php include ('footer.html'); ?>
      </div>
	  


</body>
</html>