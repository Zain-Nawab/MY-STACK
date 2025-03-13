
<?php
session_start();

// get id from url
$id = $_GET['id'];

// connect to database
require("../includes/db.php");

// Selcet query to delete data from database
$sql = "SELECT * FROM products WHERE id=$id";
$result = mysqli_query($conn, $sql);

$q = mysqli_fetch_assoc($result);

// delete image from folder 
 if ($q !== NULL ) {
    // image path 
    $path = "../uploads/" . $q['image_name'];
    // delete image if exsist
    if (file_exists($path)) {
        unlink($path);
    }


    // prepare delete query
    $dq = "DELETE FROM products WHERE id=$id";

    // execute delete query
    if (mysqli_query($conn, $dq)) {
        $_SESSION['delete'] = "Record deleted successfully";
        header("Location: ../Forms/productView.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
 }

?>