<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title><?= $title ?? 'Dashboard' ?> - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>assets/admin/images/favicon.ico">
    <?php
    if (isset($style) && ($style)) {
        require_once PATH_VIEW_ADMIN . 'style/' . $style . '.php';
    }
    if (isset($style2) && ($style2)) {
        require_once PATH_VIEW_ADMIN . 'style/' . $style2 . '.php';
    }
    ?>
    <!-- Bootstrap Css -->
    <link href="<?= BASE_URL ?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= BASE_URL ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= BASE_URL ?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php require_once PATH_VIEW_ADMIN . "layout/partials/top-bar.php" ?>
        <!-- ========== Left Sidebar Start ========== -->
        <?php require_once PATH_VIEW_ADMIN . 'layout/partials/side-bar.php' ?>

        <!-- Left Sidebar End -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <?php require_once PATH_VIEW_ADMIN . $view . '.php' ?>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php require_once PATH_VIEW_ADMIN . 'layout/partials/footer.php' ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
    <script src="<?= BASE_URL ?>assets/admin/libs/jquery/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= BASE_URL ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= BASE_URL ?>assets/admin/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
    <script src="<?= BASE_URL ?>assets/admin/libs/apexcharts/apexcharts.min.js"></script>

    <!-- dashboard init -->
    <script src="<?= BASE_URL ?>assets/admin/js/pages/dashboard.init.js"></script>

    <?php
    if (isset($script) && ($script)) {
        require_once PATH_VIEW_ADMIN . 'scripts/' . $script . '.php';
    }

    if (isset($script2) && ($script2)) {
        require_once PATH_VIEW_ADMIN  . 'scripts/' . $script2 . '.php';
    }
    if (isset($script3) && ($script3)) {
        require_once PATH_VIEW_ADMIN  . 'scripts/' . $script3 . '.php';
    }
    ?>
        <!-- App js -->
        <script src="<?= BASE_URL ?>assets/admin/js/app.js"></script>
</body>


</html>