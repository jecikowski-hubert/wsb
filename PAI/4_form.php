<?php 
  if (!empty($_POST['name']) && isset($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    if ($pass1 != $pass2) {
      header('location:../form.php?errorPass=');
    }
    echo <<<X
      <h3>Dane użytkownika</h3>
      Imię: $name<br>
      Nazwisko: $surname<hr>
X;
  }else{
    //echo "Wypelnij dane i nacisnij przycisk w formularzu ";
    header('location:../form.php');
  }
  /*
    jesli wypelni dane i nacisnie przycisk to na stronie ma wyswielic sie: Imię: .
    Jęsli nie wypełni danych lub nie nacisnie przycisku to ma sie wyswietlc: wypelnij dane i nacisnij przycisk w formularzu 
  */
?>