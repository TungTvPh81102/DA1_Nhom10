<section class="pb-lg-20 pb-16" data-animated-id="1">
    <div class="bg-body-secondary py-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none text-body" href="#">Home</a>
                </li>
                <li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page">Register
                </li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class=" text-center pt-13 mb-12 mb-lg-15">
            <div class="text-center">
                <h2 class="fs-36px mb-11 mb-lg-14">Register</h2>
            </div>
        </div>
        <div class="col-lg-5 col-md-8 mx-auto">
            <form class="" method="post">
                <?php
                if (isset($_SESSION['errors'])) {
                    $errorsMess = $_SESSION['errors'];
                    unset($_SESSION['errors']);
                } else {
                    $errorsMess = [];
                }
                ?>
                <?php
                if (isset($_SESSION['success'])) {
                    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                    unset($_SESSION['success']);
                }
                ?>
                <div class="mb-6">
                    <label for="first_name" class="visually-hidden">First name</label>
                    <input name="first_name" id="first_name" type="text" class="form-control mb-3" placeholder="First name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['first_name'] : null ?>">
                    <span class="text-danger"><?= formErrors('first_name', $errorsMess) ?></span>
                </div>
                <div class="mb-6">
                    <label for="last_name" class="visually-hidden">Last name</label>
                    <input name="last_name" id="last_name" type="text" class="form-control mb-3" placeholder="Last name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['last_name'] : null ?>">
                    <span class="text-danger"><?= formErrors('last_name', $errorsMess) ?></span>
                </div>
                <div class="mb-6">
                    <label for="email" class="visually-hidden">Email address</label>
                    <input name="email" id="email" type="email" class="form-control mb-3" placeholder="Your email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['email'] : null ?>">
                    <span class="text-danger"><?= formErrors('email', $errorsMess) ?></span>

                </div>
                <div class="mb-7">
                    <label for="password" class="visually-hidden">Password</label>
                    <input name="password" id="password" type="password" class="form-control mb-3" placeholder="Password">
                    <span class="text-danger"><?= formErrors('password', $errorsMess) ?></span>

                </div>
                <div class="mb-7">
                    <label for="confirm_password" class="visually-hidden">Confirm Password</label>
                    <input name="confirm_password" id="confirm_password" type="password" class="form-control mb-3" placeholder="Confirm password">
                    <span class="text-danger"><?= formErrors('confirm_password', $errorsMess) ?></span>

                </div>
                <div class="form-check mb-7">
                    <input name="agree" type="checkbox" class="form-check-input rounded-0" id="agree_terms">
                    <label class="form-check-label text-secondary" for="agree_terms">
                        Yes, I agree with Grace <a href="<?= BASE_URL ?>?action=privacy-policy" class="text-decoration-underline">Privacy Policy</a> and <a href="<?= BASE_URL ?>?action=terms-of-use" class="text-decoration-underline">Terms of Use</a>
                    </label>
                </div>
                <button type="submit" value="Login" class="btn btn-primary w-100">Sign Up</button>
                <div class="border-bottom mt-10"></div>
                <div class="text-center mt-n4 lh-1 mb-7">
                    <span class="fs-14 bg-body lh-1 px-4">or Sign Up with</span>
                </div>
                <div class="d-flex">
                    <a href="#" class="btn btn-outline-primary w-100 px-2 font-weight-500 me-5"><i class="fab fa-facebook-f me-4" style="color: #2E58B2"></i>Facebook</a>
                    <a href="#" class="btn btn-outline-primary w-100 px-2 font-weight-500 mt-0"><i class="fab fa-google me-4" style="color: #DD4B39"></i>Google</a>
                </div>
                <span class="d-inline-block fs-15 lh-12 mt-10 d-flex justify-content-center">Do you already have an account?
                    <a href="<?= BASE_URL ?>?action=login-client" class="text-primary">Sign in
                        now</a>
                </span>
            </form>
        </div>
    </div>
</section>
<?php
if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
}
?>