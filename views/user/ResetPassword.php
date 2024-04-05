    <section class="pb-lg-20 pb-16" data-animated-id="1">
        <div class="bg-body-secondary py-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none text-body" href="<?= BASE_URL ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page">Reset your
                        password?
                    </li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class=" text-center pt-13 mb-12 mb-lg-15">
                <div class="text-center">
                    <h2 class="fs-36px mb-11 mb-lg-14">Reset your password?</h2>
                </div>
            </div>
            <div class="col-lg-5 col-md-8 mx-auto">
                <form class="" method="post">
                    <?php
                    if (!empty($_SESSION['errors'])) {
                        $errorsMess = $_SESSION['errors'];
                        unset($_SESSION['errors']);
                    } else {
                        $errorsMess = [];
                    }
                    ?>
                    <div class="mb-6">
                        <label for="password" class="visually-hidden">Password</label>
                        <input name="password" id="password" type="password" class="form-control mb-4" placeholder="Password" required>
                        <span class="text-danger"><?= formErrors('password', $errorsMess) ?></span>
                    </div>
                    <div class="mb-6">
                        <label for="confirm_password" class="visually-hidden">Confirm password</label>
                        <input name="confirm_password" id="confirm_password" type="password" class="form-control mb-4" placeholder="Confirm password" required>
                        <span class="text-danger"><?= formErrors('confirm_password', $errorsMess) ?></span>
                    </div>
                    <div class="d-flex">
                        <a style="margin-right: 10px;" href="<?= BASE_URL ?>?action=login-client" value="Login" class="btn btn-light w-100">Cancel</a>
                        <button onclick="return confirm('Thay đổi mật khẩu thành công. Chọn OK để quay trở về trang chủ')" type="submit" class="btn btn-dark btn-hover-bg-primary btn-hover-border-primary px-11 mt-md-7 mt-4">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>