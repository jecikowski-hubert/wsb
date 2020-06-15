<!DOCTYPE html>
<html lang="PL">
<?php include ('./head.html'); ?>
<body>

    <div id="page-container">
        <div id="content-wrap">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="logged_employee.php"><img src="logo.png" height="50px" width="50px" alt="logo"></a>
              
                <div class="collapse navbar-collapse" id="navbarColor01">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="./logged_employee.php">Pulpit</a>
                    </li>
                  </ul>
                  <a href="./logout.php" class="btn btn-secondary">Wyloguj</a>
                </div>
			</nav>
        
			<div class="main-container">
					
                <?php
                    session_start();
                    require_once "connect.php";
                    $employee = $polaczenie->query("SELECT * FROM employee WHERE id = ".$_SESSION['id']);
                    while($e = $employee->fetch_assoc())
                    {
                        $welcome = "<h2>Witaj, ".$e['name']." ".$e['surname']."! </h2>";
                        echo 
                        "<div class = welcome>"
                            .$welcome.
                        "</div>";
                    }
                ?>

                <form action="#" method="POST">
                    <fieldset>
                        <div class="form-group">
                        <label for="exampleSelect1">Zarządzaj:</label>
                            <select name="choice" class="form-control" id="exampleSelect1">
                                <option>Klienci</option>
                                <option>Karty</option>
                                <option>Konta</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Zatwierdź</button>
                    </fieldset>
                </form> 

            </div>
        </div>

        <?php 
            include ('footer.html'); 
            if(isset($_POST['choice']))
            {
                $choice = $_POST['choice'];
                switch ($choice) 
                {
                    case Klienci:
                        header("Location: ./clients.php");
                        break;
                    case Karty:
                        header("Location: ./cards.php");
                        break;
                    case Konta:
                        header("Location: ./accounts.php");
                        break;
                }
            }
        ?>
    </div>


</body>
</html>