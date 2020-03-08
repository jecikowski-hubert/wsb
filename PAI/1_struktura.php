<!DOCTYPE html>
<html lang="pl" dir="ltr">
<head>
<meta charset="UTF-8">
<title> Struktura dokumentu </title>
</head>

<body>
<?php
echo"test";

$name="Janusz";
$surname="Nowak";

$text=<<<x

x;
//nowdoc
echo $text,"<br>";

//systemy liczbowe
$int = 10;
$hex=0xA; //10
$oct=012; //2*8^2 + 1*8^1 = 10

echo $int, "<br>";
echo $hex, "<br>";

echo phpinfo();

?>
</body>
</html>