<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Product</title>
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
            <div class="col-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Product</h4>
                        <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="exampleInputID1">ID</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="ID">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2">Name Product</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name Product">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPrice3">Price</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputColor4">Color</label>
                                <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Color">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGB">GB</label>
                                <select class="form-control" id="exampleSelectGender">
                                    <option>512GB</option>
                                    <option>256GB</option>
                                    <option>128GB</option>
                                    <option>64GB</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleDescribe1">Describe</label>
                                <textarea class="form-control" id="exampleTextarea1" rows="8"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Save</button>
                            <a href="../product/product.php" type="submit" class="btn btn-light">Cancel</a>
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
        <script src="../../js/file-upload.js"></script>
        <script src="../../js/typeahead.js"></script>
        <script src="../../js/select2.js"></script>
        <!-- End custom js for this page-->
</body>

</html>