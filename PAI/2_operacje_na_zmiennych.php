<?php
$potega=2**10;

echo $potega;

//operatory bitowe
$x=0b1010;
echo $x; //10
$x=$x>>1;
echo $x; //5
$x= $x<<2;
echo $x; //20

//operatory
$x=10;
$y=20;

$result= $x<=>$y;
echo$result, "<hr>"; //-1 //1 oznacza, że liczba po lewej jest większa, 0 są równe, -1 po prawej jest większa

//równe / identyczne
$x=1;
$y=1.0;
if($x==$y){
    echo"Równe<br>";
}else{
    echo"Nierówne";
}
if($x===$y){
    echo"Równe";
}else{
    echo"Nierówne<br>";
}
    echo gettype($x),"<br>";
    echo gettype($y),"<br>";
//operatory rzutowania
$text1="123ssd";
$x1 = (int)$text1;
echo $x1, "<br>";
echo gettype($text1),"<br>";
echo gettype($x1),"<br>";

$text2 = 0;
$x2 = (bool)$text2;
echo$x2,"<br>";

$text3=10;
$x3 = (unset)$text2;
echo $x3,"<br>";
echo gettype($x3),"<br";
echo gettype($text3),"<br>";

//rozmiar typu integer
echo PHP_INT_SIZE,"<br>"; //8
echo PHP_INT_MAX,"<br>";

//kontrola typu zmiennych
$x=10;
echo is_int($x),"<br>"; //1
echo is_string($x);
echo is_float($x); 

//operator ignorowania błędów
$w;
echo @$w;
echo @gettype($w);

//zmienne superglobalne
//$_GET, $_POST, $_COOKIE, $_SESSION, $_SERVER, $_FILES

echo $_SERVER['SERVER_PORT'], "<br>"; //81
echo $_SERVER['SERVER_NAME'], "<br>"; //81
echo $_SERVER['SCRIPT_NAME'], "<br>"; //81
echo $_SERVER['DOCUMENT_ROOT'], "<br>"; //81

//$fileLocal = $_SERVER['DOCUMENT_ROOT'],"<br>";
//$fileLocal .= $_SERVER['SCRIPT_NAME'],"<br>";
//echo $fileLocal;

//stałe - nazwy z wielkije litery
define ('SURNAME', "Kowal");
echo SURNAME;

//stałę predefiniowane
echo PHP_VERSION; //7.3.2
echo PHP_OS; //WINNT
echo __LINE__; 
echo __FILE__;
echo __DIR__;



?>