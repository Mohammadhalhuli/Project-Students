<?php
/*try{
 $connString = "mysql:host=1176.119.254.174;dbname=c471_1191413";
 $dbuser = "c471_1191413@localhost";
 $dbpass = "Du_KHc5b";
 $pdo = new PDO($connString,$dbuser,$dbpass);
 $pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
    die($e->getMessage());
}*/
?>
<?php
try{
 $connString = "mysql:host=localhost;dbname=test";
 $dbuser = "root";
 $dbpass = "";
 $pdo = new PDO($connString,$dbuser,$dbpass);
 $pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
    die($e->getMessage());
}
?>