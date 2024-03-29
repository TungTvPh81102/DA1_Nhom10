<section class="pb-lg-20 pb-16" data-animated-id="1">
    <div class="bg-body-secondary py-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none text-body" href="<?= BASE_URL ?>">Home</a>
                </li>
                <li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page">Login
                </li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class=" text-center pt-13 mb-12 mb-lg-15">
            <div class="text-center">
                <h2 class="fs-36px mb-7 mb-lg-14">Login</h2>
            </div>
        </div>
        <div class="col-lg-5 col-md-8 mx-auto">
            <?php
            if (isset($_SESSION['errors'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['errors'] . '</div>';
                unset($_SESSION['errors']);
            }
            ?>
            <form class="" method="post">
                <div class="mb-6">
                    <label for="email" class="visually-hidden">Email address</label>
                    <input name="email" id="email" type="email" class="form-control mb-3" placeholder="Email address" required="">
                </div>
                <div class="mb-7">
                    <label for="password" class="visually-hidden">Password</label>
                    <input name="password" id="password" type="password" class="form-control mb-3" placeholder="Password" required="">
                </div>
                <a href="<?= BASE_URL ?>?action=forgot-password" class="d-inline-block fs-15 lh-12 mb-7">Forgot your
                    password?</a>
                <button type="submit" value="Login" class="btn btn-primary w-100">Sign In</button>
                <div class="border-bottom mt-10"></div>
                <div class="text-center mt-n4 lh-1 mb-7">
                    <span class="fs-14 bg-body lh-1 px-4">or Sign In with</span>
                </div>
                <div class="d-flex">
                    <a href="#" class="btn btn-outline-primary w-100 px-2 font-weight-500 me-5"><i class="fab fa-facebook-f me-4" style="color: #2E58B2"></i>Facebook</a>
                    <a href="#" class="btn btn-outline-primary w-100 px-2 font-weight-500 mt-0"><i class="fab fa-google me-4" style="color: #DD4B39"></i>Google</a>
                </div>
                <span class="d-inline-block fs-15 lh-12 mt-10 d-flex justify-content-center">Don't have an
                    account
                    yet?
                    <a href="<?= BASE_URL ?>?action=register-client" class="text-primary">Sign up
                        now</a>
                </span>
            </form>
        </div>
    </div>
</section>