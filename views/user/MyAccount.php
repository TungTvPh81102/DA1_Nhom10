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
                    <?php
                    if (isset($_SESSION['errors'])) {
                        $errorsMess = $_SESSION['errors'];
                        unset($_SESSION['errors']);
                    } else {
                        $errorsMess = [];
                    }
                    if (isset($_SESSION['success'])) {
                        echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                        unset($_SESSION['success']);
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card mb-8 rounded-4">
                                    <div class="card-header p-7 bg-transparent">
                                        <h4 class="fs-18px mb-0 font-weight-500">Media</h4>
                                    </div>
                                    <div class="card-body p-7">
                                        <div class="input-upload">
                                            <div class="mb-7">
                                                <img src="<?= BASE_URL . $_SESSION['user']['avatar'] ?>" width="102" class="d-block mx-auto rounded-circle" alt="">
                                            </div>
                                            <input name="avatar" class="form-control mb-5" type="file">
                                            <span class="text-danger"><?= formErrors('avatar', $errorsMess) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">First name</label>
                                            <input class="form-control mb-5" type="text" name="first_name" id="" value="<?= $_SESSION['user'] ? $_SESSION['user']['first_name'] : null ?>">
                                            <span class="text-danger"><?= formErrors('first_name', $errorsMess) ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input class="form-control mb-5" type="text" name="email" id="" value="<?= $_SESSION['user'] ? $_SESSION['user']['email'] : null ?>">
                                            <span class="text-danger"><?= formErrors('email', $errorsMess) ?></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Last name</label>
                                            <input class="form-control mb-5" type="text" name="last_name" id="" value="<?= $_SESSION['user'] ? $_SESSION['user']['last_name'] : null ?>">
                                            <span class="text-danger"><?= formErrors('last_name', $errorsMess) ?></span>

                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input class="form-control mb-5" type="text" name="phone_number" id="" value="<?= $_SESSION['user'] ? $_SESSION['user']['phone_number'] : null ?>">
                                            <span class="text-danger"><?= formErrors('phone', $errorsMess) ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input class="form-control mb-5" type="text" name="address" id="" value="<?= $_SESSION['user'] ? $_SESSION['user']['address'] : null ?>">
                                            <span class="text-danger"><?= formErrors('address', $errorsMess) ?></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <button type="reset" class="btn btn-light">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>