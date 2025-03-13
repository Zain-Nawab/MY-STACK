

<?php 

$name = $_POST['name'];
$price = $_POST['price'];
$discount_price = $_POST['discount_price'];
$ram = $_POST['ram'];
$storage = $_POST['storage'];
$screen_size = $_POST['screen_size'];
$brand = $_POST['brand'];
$model = $_POST['model'];


// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";


// connection database
$host  = 'localhost';
$user  = "root";
$pwd   = "";
$db    = "mobile_inventory";

$conn = mysqli_connect($host, $user, $pwd, $db);

if(!$conn) {
    die("Database not connected");
} 


$img_name = null;

// upload img
if (isset($_FILES['image'])) {

    // restriction
    $allow_type = ['image/jpg', 'image/png', 'image/jpeg'];
    $allow_size = 2 *1024 * 1024 ;

    // check extion 
    if (in_array($_FILES['image']['type'], $allow_type) == false) {
        die('This file type not allowed');
    }

    // check size 
    if ($_FILES['image']['size'] > $allow_size ) {
        die("File is too large");
    }

    // get extion
    $ex = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);


    $unique_name = uniqid() . time() . "." . $ex;

    $folder = "../uploads/" . $unique_name;

    
    // move file from temp to folder
    if (move_uploaded_file($_FILES['image']['tmp_name'], $folder)) {
        $img_name = $unique_name;
    }
}

// query

$q = "INSERT INTO `products` ( `name`, `price`, `discount`, `ram`, `storage`, `screen_size`, `brand`, `model`, `image_name`) VALUES ( '$name' , '$price', '$discount_price', '$ram', '$storage', '$screen_size', '$brand', '$model', '$img_name')";

if (mysqli_query($conn,$q)) {
    header("Location: ../index.php");
} else {
    echo "erro";
    echo mysqli_errno($conn);
}


mysqli_close($conn);
?>