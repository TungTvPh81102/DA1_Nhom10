<section class="pb-lg-20 pb-16" data-animated-id="1">
    <div class="bg-body-secondary py-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none text-body" href="<?= BASE_URL ?>">Home</a>
                </li>
                <li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page">Forgot your
                    password?
                </li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class=" text-center pt-13 mb-12 mb-lg-15">
            <div class="text-center">
                <h2 class="fs-36px mb-11 mb-lg-14">Forgot your password?</h2>
            </div>
        </div>
        <div class="col-lg-5 col-md-8 mx-auto">
            <form class="" method="post">
                <?php
                if (isset($_SESSION['errors'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['errors'] . '</div>';
                    unset($_SESSION['errors']);
                }
                ?>
                <?php
                if (isset($_SESSION['success'])) {
                    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                    unset($_SESSION['success']);
                }
                ?>
                <div class="mb-6">
                    <label for="email" class="visually-hidden">Email address</label>
                    <input name="email" id="email" type="email" class="form-control mb-3" placeholder="Your email"
                        required>
                </div>
                <div class="d-flex">
                    <a style="margin-right: 10px;" href="<?= BASE_URL ?>?action=login-client" value="Login"
                        class="btn btn-light w-100">Cancel</a>
                    <button type="submit" value="Login" class="btn btn-primary w-100">Send</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
}
?>