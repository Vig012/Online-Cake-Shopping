<?php
if (isset($_GET['edit_success']) && $_GET['edit_success'] == 1) {
    echo "<script>alert('Edited details!')</script>";
    echo "<script>window.location.assign('account_admin.php')</script>";
}
?>
<?php
session_start();
if (isset($_SESSION['user_admin_id']) && $_SESSION['user_admin_id'] != null) {
    $admin_username = $_SESSION['user_admin_username'];
?>    
<!doctype html>
<html lang="en">

 
<?php
    include('includes/headtag.php');
    ?>

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
                            <h2 class="pageheader-title">Admin Account</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Admin account</li>
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
                        <?php
                        require_once("../config.php");
                        $admin_id = $_SESSION['user_admin_id'];
                        $select = "SELECT * FROM cake_shop_admin_registrations where admin_id = $admin_id";
                        $query = mysqli_query($conn, $select);
                        $res = mysqli_fetch_assoc($query);
                        ?>
                        <form id="form" class="splash-container" method="post" action="update_admin.php">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="text" name="admin_username" required="" autocomplete="off" value="<?php echo $res['admin_username'];?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="email" name="admin_email" required="" autocomplete="off" value="<?php echo $res['admin_email'];?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="text" required="" name="admin_password" value="<?php echo $res['admin_password'];?>">
                                    </div>
                                    <div class="form-group pt-2">
                                        <input type="hidden" value="<?php echo $res['admin_id'];?>" name="hidden_admin_id">
                                        <button class="btn btn-block btn-primary" type="submit">Change</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
</body>
 
</html>
<?php
}
else {
    header("Location: index.php");
}
?>