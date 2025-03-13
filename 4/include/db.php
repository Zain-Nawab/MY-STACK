
<?php

// connect data base 
$host = 'localhost';
$username = 'root';
$psd = '';
$db = 'mobile_inventory';


$conn = mysqli_connect($host, $username, $psd, $db);

if (!$conn){
    die('Bro Database sy connect nahi howa');
}

?>