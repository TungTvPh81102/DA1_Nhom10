<div class="bg-body-secondary py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none text-body" href="#">Home</a>
            </li>
            <li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page">
                <?= $title ?>
            </li>
        </ol>
    </nav>
</div>
<div class="my-account-wrapper section-padding pb-lg-8 pb-16">
    <div class="container py-10">
        <div class="section-bg-color">
            <div class="card">
                <div class="card-body">

                    <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-3">
                                <img style="width: 250px;" class="img-fluid" src="<?= BASE_URL ?>assets/client/change-password-icon-0.jpg" alt="">
                            </div>
                            <div class="col-lg-9">
                                <?php
                                if (isset($_SESSION['errors'])) {
                                    echo '<div class="alert alert-danger">' . $_SESSION['errors'] . '</div>';
                                    unset($_SESSION['errors']);
                                }
                                if (isset($_SESSION['success'])) {
                                    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                                    unset($_SESSION['success']);
                                }
                                ?>
                                <div class="form-group">
                                    <label for="">Current Password*</label>
                                    <input class="form-control mb-5" type="password" name="password_old" id="" placeholder="********************" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Password*</label>
                                    <input class="form-control mb-5" type="password" name="password_new" id="" placeholder="********************" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Re-enter Password*</label>
                                    <input class="form-control mb-5" type="password" name="confirm_password" id="" placeholder="********************" required>
                                </div>
                                <button class="btn btn-light mt-3" type="reset">Cancel</button>
                                <button class="btn btn-primary" type="submit">Update Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>