<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>assets/admin/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?= BASE_URL ?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= BASE_URL ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= BASE_URL ?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary-subtle">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to Admin.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="<?= BASE_URL ?>assets/admin/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="index.html" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?= BASE_URL ?>assets/admin/images/logo-light.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-3">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?= BASE_URL ?>assets/admin/images/logo.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <?php
                                if (isset($_SESSION['errors'])) {
                                    echo '<div class="alert alert-danger">' . $_SESSION['errors'] . '</div>';
                                    unset($_SESSION['errors']);
                                }
                                ?>
                                <form class="form-horizontal" action="" method="post">

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input name="email" type="email" class="form-control mb-2" id="email" placeholder="Enter email">

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input name="password" type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>

                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                        <label class="form-check-label" for="remember-check">
                                            Remember me
                                        </label>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Log
                                            In</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>© <script>
                                    document.write(new Date().getFullYear())
                                </script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="<?= BASE_URL ?>assets/admin/libs/jquery/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= BASE_URL ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= BASE_URL ?>assets/admin/libs/node-waves/waves.min.js"></script>

    <!-- App js -->
    <script src="<?= BASE_URL ?>assets/admin/js/app.js"></script>
</body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2024 07:17:55 GMT -->

</html>