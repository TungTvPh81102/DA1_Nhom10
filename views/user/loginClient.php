<div class="register-wrapper ml-110 mt-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="register-switcher text-center">
                    <a href="<?= BASE_URL . '?action=register-client' ?>" class="resister-btn" previewlistener="true">Account</a>
                    <a href="#" class="login-btn active">Login</a>
                </div>
            </div>
        </div>
        <div class="row mt-100 justify-content-center">
            <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-10">
                <div class="reg-login-forms">
                    <h4 class="reg-login-title text-center">
                        Login Your Account
                    </h4>
                    <form class="" method="POST">
                        <?php
                        if (isset($_SESSION['errors'])) {
                            // $errorsMess = $_SESSION['errors'];
                            // unset($_SESSION['errors']);
                            echo '<div class="alert alert-success">' . $_SESSION['errors'] . '</div>';

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
                            <label for="email" class="visually-hidden">Email</label>
                            <input name="email" id="email" type="email" class="form-control mb-3" placeholder="Your email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['email'] : null ?>" >
                            <span class="text-danger"><?= formErrors('email', $errorsMess) ?></span>

                        </div>
                        <div class="mb-7">
                            <label for="password" class="visually-hidden">Password</label>
                            <input name="password" id="password" type="password" class="form-control mb-3" placeholder="Password">
                            <span class="text-danger"><?= formErrors('password', $errorsMess) ?></span>

                        </div>
                        <div class="form-check mb-7">
                            <div class="password-recover-group d-flex justify-content-between">
                                <div class="reg-input-group reg-check-input d-flex align-items-center">
                                    <input type="checkbox" id="form-check">
                                    <label for="form-check">Remember Me</label>
                                </div>
                                <div class="forgot-password-link">
                                    <a href="#">Forgot Password?</a>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                        <div class="border-bottom mt-10"></div>
                        <div class="text-center mt-n4 lh-1 mb-7">
                            <span class="fs-14 bg-body lh-1 px-4">or Login with</span>
                        </div>
                        <div class="d-flex">
                            <a href="#" class="btn btn-outline-primary w-100 px-2 font-weight-500 me-5"><i class="fab fa-facebook-f me-4" style="color: #2E58B2"></i>Facebook</a>
                            <a href="#" class="btn btn-outline-primary w-100 px-2 font-weight-500 mt-0"><i class="fab fa-google me-4" style="color: #DD4B39"></i>Google</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>