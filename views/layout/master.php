<!doctype html>
<html lang="en">

<!-- Mirrored from demo-egenslab.b-cdn.net/html/eg-shop-fashion/v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Mar 2024 03:00:18 GMT -->

<head>
    <title><?= $title ?? 'EG Shop Fashion' ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= BASE_URL ?>assets/client/images/favicon.png" type="image/png" sizes="20x20">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/css/swiper.css">

    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/font/flaticon.css">

    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/css/bootstrap-icons.css">

    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/css/global.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/css/responsive.css">
</head>

<body>

    <?php require_once PATH_VIEW . 'layout/partials/side-bar.php' ?>

    <?php require_once PATH_VIEW . 'layout/components/mobile-sidebar.php' ?>

    <?php require_once PATH_VIEW . 'layout/partials/cart-sidebar.php' ?>

    <?php require_once PATH_VIEW . 'layout/partials/top-bar.php' ?>

    <?php require_once PATH_VIEW . 'layout/partials/header.php' ?>


    <?php require_once PATH_VIEW . $view . '.php'; ?>

    <div class="newslatter-area ml-110 mt-100">

        <div class="row">
            <div class="col-lg-12">
                <div class="newslatter-wrap text-center">
                    <h5>Connect To EG</h5>
                    <h2 class="newslatter-title">Join Our Newsletter</h2>
                    <p>Hey you, sign up it only, Get this limited-edition T-shirt Free!</p>
                    <form action="#" method="POST">
                        <div class="newslatter-form">
                            <input type="text" placeholder="Type Your Email">
                            <button type="submit">Send <i class="bi bi-envelope-fill"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require_once PATH_VIEW . 'layout/partials/footer.php' ?>

    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/js/jquery-3.6.0.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/js/bootstrap.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/js/popper.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/js/swiper.js"></script>
    <script src="<?= BASE_URL ?>assets/client/js/jquery-ui.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/js/jquery.fancybox.min.js"></script>

    <script src="<?= BASE_URL ?>assets/client/js/main.js"></script>
</body>

<!-- Mirrored from demo-egenslab.b-cdn.net/html/eg-shop-fashion/v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Mar 2024 03:00:38 GMT -->

</html>