<div class="breadcrumb-area ml-110">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-bg d-flex justify-content-center align-items-center">
                    <div class="breadcrumb-shape1 position-absolute top-0 end-0">
                        <img src="assets/images/shapes/bs-right.png" alt />
                    </div>
                    <div class="breadcrumb-shape2 position-absolute bottom-0 start-0">
                        <img src="assets/images/shapes/bs-left.png" alt />
                    </div>
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Registration</h2>
                        <ul class="page-switcher d-flex">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="flaticon-arrow-pointing-to-right"></i>
                            </li>
                            <li>Registration</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="register-wrapper ml-110 mt-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="register-switcher text-center">
                    <a href="#" class="resister-btn active">Account</a>
                    <a href="<?= BASE_URL . '?action=login-client' ?>" class="login-btn">Login</a>
                </div>
            </div>
        </div>
        <div class="row mt-100 justify-content-center">
            <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-10">
                <div class="reg-login-forms">
                    <?php
                    if (isset($_SESSION['errors'])) {
                        $errorsMess = $_SESSION['errors'];
                        unset($_SESSION['errors']);
                    } else {
                        $errorsMess = [];
                    }
                    ?>
                    <h4 class="reg-login-title text-center">Register Your Account</h4>
                    <?php
                    if (isset($_SESSION['success'])) {
                        echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                        unset($_SESSION['success']);
                    }
                    ?>
                    <form action="" method="POST" id="register-form">
                        <div class="reg-input-group">
                            <label for="fname">First Name*</label>
                            <input name="first_name" type="text" id="fname" placeholder="Your first name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['first_name'] : null ?>" required />
                            <span class="text-danger"><?= formErrors('first_name', $errorsMess) ?></span>
                        </div>
                        <div class="reg-input-group">
                            <label for="lname">Last Name*</label>
                            <input name="last_name" type="text" id="lname" placeholder="Your last name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['last_name'] : null ?>" required />
                            <span class="text-danger"><?= formErrors('last_name', $errorsMess) ?></span>
                        </div>
                        <div class="reg-input-group">
                            <label for="email">Email *</label>
                            <input name="email" type="email" id="email" placeholder="Your email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['email'] : null ?>" required />
                            <span class="text-danger"><?= formErrors('email', $errorsMess) ?></span>
                        </div>
                        <div class="reg-input-group">
                            <label for="password">Password *</label>
                            <input name="password" type="password" id="password" placeholder="Enter a password" required />
                            <span class="text-danger"><?= formErrors('password', $errorsMess) ?></span>

                        </div>
                        <div class="reg-input-group">
                            <label for="sure-pass">Confirm Password *</label>
                            <input name="confirm_password" type="password" id="sure-pass" placeholder="Confirm password" required />
                            <span class="text-danger"><?= formErrors('confirm_password', $errorsMess) ?></span>

                        </div>
                        <div class="reg-input-group reg-check-input d-flex align-items-center">
                            <input type="checkbox" id="form-check" />
                            <label for="form-check">I agree to the <a href="#">Terms & Policy</a></label>
                        </div>
                        <div class="reg-input-group reg-submit-input d-flex align-items-center">
                            <input type="submit" id="submite-btn" value="CREATE AN ACCOUNT" />
                        </div>
                    </form>
                    <div class="reg-social-login">
                        <h5>or Signup WITH</h5>
                        <ul class="social-login-options">
                            <li>
                                <a href="#" class="facebook-login"><i class="flaticon-facebook-app-symbol"></i> Sign up
                                    whit
                                    facebook</a>
                            </li>
                            <li>
                                <a href="#" class="google-login"><i class="flaticon-pinterest-1"></i> Signup whit
                                    google</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
}
?>