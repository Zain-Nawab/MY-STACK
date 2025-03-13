<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
    <style>
        .required-label::before {
            content: "● ";
            color: red;
            font-size: 14px;
        }
    </style>

</head>

<body>
    <div class="row">
        <div class="col col-lg-3">
            <?php include '../includes/sidebar.php';  ?>
        </div>

        <div class="col col-lg-19 ">
            <div class="card p-4">
                <h2 class="mb-4">Product Form</h2>
                <form action="../actions/productAction.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label required-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required-label">Price</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label required-label">Discount Price</label>
                            <input type="number" name="discount_price" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required-label">RAM</label>
                            <select name="ram" class="form-select" required>
                                <option value="">Select RAM</option>
                                <option value="2GB">2GB</option>
                                <option value="4GB">4GB</option>
                                <option value="6GB">6GB</option>
                                <option value="8GB">8GB</option>
                                <option value="12GB">12GB</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label required-label">Storage</label>
                            <select name="storage" class="form-select" required>
                                <option value="">Select Storage</option>
                                <option value="16GB">16GB</option>
                                <option value="32GB">32GB</option>
                                <option value="64GB">64GB</option>
                                <option value="128GB">128GB</option>
                                <option value="256GB">256GB</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required-label">Screen Size</label>
                            <select name="screen_size" class="form-select" required>
                                <option value="">Select Screen Size</option>
                                <option value="50MP">50MP</option>
                                <option value="60MP">60MP</option>
                                <option value="80MP">80MP</option>
                                <option value="40MP">40MP</option>
                                <option value="70MP">70MP</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label required-label">Brand</label>
                            <select name="brand" class="form-select" required>
                                <option value="">Select Brand</option>
                                <option value="Samsung">Samsung</option>
                                <option value="Vivo">Vivo</option>
                                <option value="Oppo">Oppo</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label required-label">Model</label>
                        <select name="model" class="form-select" required>
                            <option value="">Select Model</option>
                            <option value="V12">V12</option>
                            <option value="V20">V20</option>
                            <option value="V21">V21</option>
                            <option value="I5">I5</option>
                            <option value="I6">I6</option>
                            <option value="13">13</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label required-label">Upload Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label required-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>