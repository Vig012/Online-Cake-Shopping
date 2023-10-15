<?php
if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 2) {
    echo "<script>
    alert('Product edited!');
    window.location.assign('view_product.php');
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
    <title>OCS - View Product</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/inputmask.css">
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
                                        <li class="breadcrumb-item active" aria-current="page">View product</li>
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
                            <h5 class="card-header">Product Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Trending</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once('../config.php');
                                            $select = "SELECT cake_shop_product.*, cake_shop_category.category_name FROM cake_shop_product JOIN cake_shop_category ON cake_shop_product.product_category = cake_shop_category.category_id";
                                            $query = mysqli_query($conn, $select);
                                            $i = 1;
                                            while ($res = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $res['product_name'];?></td>
                                                <td><?php echo $res['category_name'];?></td>
                                                <td>Rs. <?php echo $res['product_price'];?></td>
                                                <td><?php echo $res['product_type'];?></td>
                                                <td>
                                                    <?php 
                                                    if($res['product_status'] == '0')
                                                    {
                                                        echo '<span class="bg-success badge badge-pill">Available</span>';
                                                    }else
                                                    {
                                                        echo '<span class="bg-danger badge badge-pill">Unavailable</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($res['product_trend'] == '1')
                                                    {
                                                        echo '<span class="bg-success badge badge-pill text-white">Yes</span>';
                                                    }else
                                                    {
                                                        echo '<span class="bg-dark badge badge-pill text-white">No</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                	<?php
                                                	$file_array = explode(', ', $res['product_image']);
                                                	?>
                                                    <div class="owl-carousel owl-theme" style="width: 100px;">
                                                	<?php
                                                	for ($j=0; $j < count($file_array); $j++) {
                                                	?>
                                                    <div class="item"> 
                                                	<img src="../upload/<?php echo $file_array[$j];?>" height="100px" width="100px">
                                                    </div>
                                                	<?php
                                                	}
                                                	?>
                                                    </div>
                                                </td>
                                                <td><?php echo $res['product_description'];?></td>
                                                <td>
                                                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-space btn-primary" onclick="edit_prod(<?php echo $res['product_id'];?>)">Edit</button>
                                                    <button onclick="delete_prod(<?php echo $res['product_id'];?>)" class="btn btn-space btn-secondary">DELETE</button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                     <!--   <tfoot>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot> -->
                                    </table>
                                </div>
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
    <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="edit_product.php" id="form" method="post" enctype="multipart/form-data">
      <div class="modal-body">
            <div class="card">
                                <h5 class="card-header">Edit product</h5>
                                <div class="card-body">
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

                                        </div>
                                        <div class="form-group">
                                            <label for="inputProductPrice">Price</label>
                                            <input id="inputProductPrice" type="text" name="product_price" required="" placeholder="Enter product price" autocomplete="off" class="form-control currency-inputmask">
                                        </div>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="customFile" name="product_image[]" multiple="">
                                            <label class="custom-file-label" for="customFile">Choose Image</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProductDescription">Description</label>
                                            <textarea id="inputProductDescription" name="product_description" required="" placeholder="Product description" class="form-control"></textarea>
                                            <input type="hidden" name="hidden_product">
                                        </div>
                                </div>
                            </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-space btn-secondary">Clear</button>
        <button type="submit" class="btn btn-space btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script> -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery.slimscroll.js"></script>
    <script src="../js/main-js.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/data-table.js"></script>
    <script type="text/javascript" src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.inputmask.bundle.js"></script>
    <script>
        $(function(e){
            "use strict";
            $(".currency-inputmask").inputmask('999');
        });
        function edit_prod(product_id) {
            $.ajax({
                url:'get_product.php',
                data:'id='+product_id,
                method:'get',
                dataType:'json',
                success:function(res){
                    console.log(res);
                    $('input[name="product_name"]').val(res.product_name);
                    $('select[name="product_category"]').val(res.product_category);
                    $('input[name="product_price"]').val(res.product_price);
                    $('select[name="product_type"]').val(res.product_type);
                    $('input[name="product_status]').val(res.product_status);
                    $('input[name="product_trend]').val(res.product_trend);
                    $('textarea[name="product_description"]').val(res.product_description);
                    $('input[name="hidden_product"]').val(res.product_id);
                }
            })
        }
        function delete_prod(prod_id) {
            var flag = confirm("Do you want to delete?");
            if (flag) {
                window.location.href = "delete_product.php?prod_id="+prod_id;
            }
        }
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop: true, margin: 10, dots: 0, autoplay: 4000, autoplayHoverPause: true, responsive:{
                    0:{items:1}, 600:{items:1}, 1000:{items:1}
                }
            })
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