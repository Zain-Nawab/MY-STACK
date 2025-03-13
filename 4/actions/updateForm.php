

<?php 
session_start();

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$discount_price = $_POST['discount_price'];
$ram = $_POST['ram'];
$storage = $_POST['storage'];
$screen_size = $_POST['screen_size'];
$brand = $_POST['brand'];
$model = $_POST['model'];


// connect to the database
require("../includes/db.php");

// update the data
$sql = "UPDATE products SET name='$name', price='$price', discount_price='$discount_price', ram='$ram', storage='$storage', screen_size='$screen_size', brand='$brand', model='$model' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    $_SESSION['update'] = "Record Updated successfully";
    header("Location: ../Forms/productView.php");
} else {
    echo mysqli_errno($conect);
}

// connection clsoe 
mysqli_close($conn);
?>