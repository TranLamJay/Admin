<?php
session_start();
if(($_SESSION['is_login'])==false){
  header('location:../samples/login-2.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Users</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <!-- partial:../../partials/_sidebar.html -->
            <?php
            include_once "../../pages/layout/menu.php"
            ?>
            <!-- partial -->
            <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create User</h4>
                        <!-- <p class="card-description">
                            Basic form layout
                        </p> -->
                        <form action="../../api/controller/Category_controller.php" method="POST" class="forms-sample">
                        <?php
                        if (isset($_SESSION['edit'])) {
                        $category = $_SESSION['edit'];
                        echo "
                            <div class='form-group'>
                            <h1 style='font-size: 30px;'>Edit Category</h1></br>
                                <label for='exampleInputConfirmPassword1'>ID</label>
                                <input value = '{$category['id']}' type='ID' class='form-control' id='exampleInputConfirmPassword1' placeholder='ID'>
                            </div>
                            <div class='form-group'>
                                <label for='exampleInputName1'>Name</label>
                                <input value = '{$category['name']}' type='text' class='form-control' id='exampleInputUsername1' placeholder='Name'>
                            </div>
                            
                            <div class='form-check form-check-flat form-check-primary'>
                                <!-- <label class='form-check-label'>
                                    <input type='checkbox' class='form-check-input'>
                                    Remember me
                                </label> -->
                            </div>
                            <button name='update' type='submit' class='btn btn-primary mr-2'>Save</button>
                            <a href='./ListCategory.php' type='submit' class='btn btn-light'>Cancel</a>
                        ";
                        }else{
                            echo "
                            <div class='form-group'>
                            <h1 style='font-size: 30px;'>Add Category</h1></br>
                                <label for='exampleInputConfirmPassword1'>ID</label>
                                <input value = '{$category['id']}' type='ID' class='form-control' id='exampleInputConfirmPassword1' placeholder='ID'>
                            </div>
                            <div class='form-group'>
                                <label for='exampleInputName1'>Name</label>
                                <input value = '{$category['name']}' type='text' class='form-control' id='exampleInputUsername1' placeholder='Name'>
                            </div>
                            
                            <div class='form-check form-check-flat form-check-primary'>
                                <!-- <label class='form-check-label'>
                                    <input type='checkbox' class='form-check-input'>
                                    Remember me
                                </label> -->
                            </div>
                            <button name='add' type='submit' class='btn btn-primary mr-2'>Save</button>
                            <a href='./ListCategory.php' type='submit' class='btn btn-light'>Cancel</a>
                        ";
                        }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- base:js -->
        <script src="../../vendors/base/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="../../js/off-canvas.js"></script>
        <script src="../../js/hoverable-collapse.js"></script>
        <script src="../../js/template.js"></script>
        <!-- endinject -->
        <!-- plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->
</body>

</html>