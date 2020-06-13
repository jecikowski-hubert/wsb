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
			?>
				<h2>Wybierz rodzaj przelewu</h2>
				<table class="table table-hover">
							
					<tr>
						<td>Na rachunek obcy</td>
						<td><a href="./to_other_account.php">&#8618;</a></td>
					</tr>
					
					<tr>
						<td>Na rachunek własny</td>
						<td><a href="./to_my_account.php">&#8618;</a></td>
					</tr>
					
				</table>
				
				</div>
				
        <?php include ('footer.html'); ?>
      </div>


</body>
</html>