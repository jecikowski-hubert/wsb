<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formularz 1</title>
</head>
<body>
  <h4>Formularz rejestracyjny</h4>
  <?php 
    if (isset($_GET['errorPass'])) {
      echo "Hasła są różne!<br>";
    }
  ?>
  <form method="post" action="./scripts/4_form.php">
    <input type="text" name="name" placeholder="Imię"><br>
    <input type="text" name="surname" placeholder="Nazwisko"><br>
    <input type="password" name="pass1" placeholder="Hasło"><br>
    <input type="password" name="pass2" placeholder="Powtórz hasło"><br>
    <input type="submit" name="button" value="Wyślij">
  </form>


</body>
</html>