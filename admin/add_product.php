<?php
if (isset($_GET['add_msg']) && $_GET['add_msg'] == 2) {
    echo "<script>
    alert('Product added!');
    window.location.assign('add_product.php');
    </script>";
}
?>
<?php
session_start();
if (isset($_SESSION['user_admin_id']) && $_SESSION['user_admin_id'] != null) {
    $admin_username = $_SESSION['user_admin_username'];
?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OCS - View Orders</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
    <?php
    include('includes/navbar.php');
    include('includes/sidebar.php');
    ?>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Product</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Product</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                                <h5 class="card-header">Add Product</h5>
                                <div class="card-body">
                                    <form action="insert_product.php" id="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputProductName">Product Name</label>
                                            <input id="inputProductName" type="text" name="product_name" required="" placeholder="Enter product name" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProductCategory">Categories</label>
                                            <select class="form-control" id="inputProductCategory" name="product_category">
                                                <?php
                                                require_once('../config.php');
                                                $select = "SELECT * FROM cake_shop_category";
                                                $query = mysqli_query($conn, $select);
                                                while ($res = mysqli_fetch_assoc($query)) {
                                                ?>
                                                <option value="<?php echo $res['category_id'];?>"><?php echo $res['category_name'];?></option>
                                                <?php } ?>
                                            </select>
                                            <a href="add_category.php">Add category.</a>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputType">Select type</label>
                                            <select class="form-control" id="inputType" required name="product_type">
                                                <!--<option selected>Choose category</option>-->
                                                <option value="Veg">Veg</option>
                                                <option value="Non-Veg">Non-Veg</option>
                                            </select>
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="inputStatus">Availability</label><br>
                                                <label class="switch">
                                                    <input type="checkbox" name="product_status">
                                                    <span class="slider round"></span>
                                                </label><br>
                                                <small class="help-text">Green=Available, Red=Not Available</small>
                                            </div>    
                                        </div>

                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="inputStatus">Trending</label><br>
                                                <label class="switch">
                                                    <input type="checkbox" name="product_trend">
                                                    <span class="slider round"></span>
                                                </label><br>
                                                <small class="help-text">Green=Trending, Red=default</small>
                                            </div>    
                                        </div>

                                        <div class="form-group">
                                            <label for="inputProductPrice">Price</label>
                                            <input id="inputProductPrice" type="number" name="product_price" min="1" required="" placeholder="Enter product price" autocomplete="off" class="form-control currency-inputmask">
                                        </div>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="customFile" name="product_image[]" multiple="">
                                            <label class="custom-file-label" for="customFile">Choose Image</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProductDescription">Description</label>
                                            <textarea id="inputProductDescription" name="product_description" required="" placeholder="Product description" class="form-control"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Add</button>
                                                    <button type="reset" class="btn btn-space btn-secondary">Clear</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <?php
            include('includes/footer.php');
            ?>
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery.slimscroll.js"></script>
    <script src="../js/main-js.js"></script>
    <script src="../js/jquery.inputmask.bundle.js"></script>
    <script>
        $(function(e){
            "use strict";
            $(".currency-inputmask").inputmask('999');
        });
    </script>
</body>
 
</html>
<?php
}
else {
    header("Location: index.php");
}
?>