
<?php
session_start();
require("../includes/db.php");

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
$Q = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<?php include("../includes/head.php"); ?>
<!-- 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css"> -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script> 
    
</head> -->

<body>
    <div class="row">
        <div class="col col-lg-3">
            <?php
            require("../includes/sidebar.php");
            ?>
        </div>
        <div class="col col-lg-9">
            <?php
            //require("../includes/navbar.php");
            ?>

            <?php
                if( isset($_SESSION['delete']) == true) {
                    echo "<div class='alert alert-danger my-2'>{$_SESSION['delete']}</div> ";
                    unset($_SESSION['delete']);
                }
                if( isset($_SESSION['update']) == true) {
                    echo "<div class='alert alert-success my-2'>{$_SESSION['update']}</div> ";
                    unset($_SESSION['update']);
                }
            ?>

            <table id="datatable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Discount_price</th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                         <td>{$row['name']}</td>
                                         <td> <img width='40px' src='../uploads/{$row['image_name']}'</td>
                                         <td>{$row['price']}</td>
                                         <td>{$row['discount']}</td>
                                         <td>
                                            <a href='../actions/updateForm.php?id={$row['id']}' class='btn btn-sm btn-warning me-1'>Edit</a>
                                             <a href='../actions/delete_action.php?id={$row['id']}' class='btn btn-sm btn-danger'>Delete</a>
                                         </td>
                                      </tr>";
                        }
                    } else {
                        echo ("no data found");
                    }
                    ?>


                </tbody>

            </table>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
</body>

</html>