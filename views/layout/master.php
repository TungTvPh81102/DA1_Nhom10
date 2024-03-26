<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Home Page 09 - Glowing - Bootstrap 5 HTML Templates</title>
    <link rel="icon" href="<?= BASE_URL ?>assets/client/images/others/favicon.ico" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/vendors/lightgallery/css/lightgallery-bundle.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/vendors/slick/slick.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/vendors/mapbox-gl/mapbox-gl.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/cdn.jsdelivr.net/npm/bootstrap-icons%401.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/vendors/fonts/tuesday-night/stylesheet.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/css/theme-home-09.css" />
</head>

<body>
    <?php require_once PATH_VIEW . 'layout/partials/header.php' ?>

    <main id="content" class="wrapper layout-page">
        <?php require_once PATH_VIEW . $view . '.php' ?>
    </main>
    <?php require_once PATH_VIEW . 'layout/partials/footer.php' ?>

    <?php require_once PATH_VIEW . 'layout/components/svg.php' ?>


    <?php require_once PATH_VIEW . 'layout/components/search-modal.php' ?>

    <?php require_once PATH_VIEW . 'layout/components/shopping-cart.php' ?>

    <?php require_once PATH_VIEW . 'layout/components/signin-modal.php' ?>

    <?php require_once PATH_VIEW . 'layout/components/signup-modal.php' ?>

    <?php require_once PATH_VIEW . 'layout/components/quick-view.php' ?>

    <?php require_once PATH_VIEW . 'layout/components/nav-modal.php' ?>

    <div class="position-fixed z-index-10 bottom-0 end-0 p-10">
        <a href="#" class="gtf-back-to-top text-decoration-none bg-body text-primary bg-primary-hover text-light-hover shadow square p-0 rounded-circle d-flex align-items-center justify-content-center" title="Back To Top" style="--square-size: 48px"><i class="fa-solid fa-arrow-up"></i></a>
    </div>

    <script src="<?= BASE_URL ?>assets/client/cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/vendors/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?= BASE_URL ?>assets/client/vendors/clipboard/clipboard.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/vendors/vanilla-lazyload/lazyload.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/vendors/waypoints/jquery.waypoints.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/vendors/lightgallery/lightgallery.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/vendors/lightgallery/plugins/zoom/lg-zoom.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/vendors/lightgallery/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/vendors/lightgallery/plugins/video/lg-video.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/vendors/lightgallery/plugins/vimeoThumbnail/lg-vimeo-thumbnail.min.js">
    </script>
    <script src="<?= BASE_URL ?>assets/client/vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/vendors/slick/slick.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/vendors/gsap/gsap.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/vendors/gsap/ScrollToPlugin.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/vendors/gsap/ScrollTrigger.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/vendors/mapbox-gl/mapbox-gl.js"></script>
    <script src="<?= BASE_URL ?>assets/client/js/theme.min.js"></script>

</body>


</html>