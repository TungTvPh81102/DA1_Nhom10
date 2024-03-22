<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Quản lý người dùng</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                    <h6 class="m-0 font-weight-bold"><?= $title ?></h6>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['errors'])) {
                        $errorsMess = $_SESSION['errors'];
                        unset($_SESSION['errors']);
                    } else {
                        $errorsMess = [];
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="first_name">First Name</label>
                            <input id="first_name" name="first_name" type="text" class="form-control mb-3" placeholder="First Name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['first_name'] : null ?>"">
                                    <span class=" text-danger">
                            <?= formErrors('first_name', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="last_name">Last Name</label>
                            <input id="last_name" name="last_name" type="text" class="form-control mb-3" placeholder="Last Name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['last_name'] : null ?>">
                            <span class="text-danger">
                                <?= formErrors('last_name', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" class="form-control mb-3" placeholder="Enter email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['email'] : null ?>">
                            <span class="text-danger">
                                <?= formErrors('email', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number">Phone Number</label>
                            <input id="phone_number" name="phone_number" type="number" class="form-control mb-3" placeholder="Phone Number" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['phone_number'] : null ?>">
                            <span class="text-danger">
                                <?= formErrors('phone_number', $errorsMess) ?>
                            </span>
                        </div>


                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input id="address" name="address" type="text" class="form-control mb-3" placeholder="Address" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['address'] : null ?>">
                            <span class="text-danger">
                                <?= formErrors('address', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" class="form-control mb-3" placeholder="Enter Password">
                            <span class="text-danger">
                                <?= formErrors('password', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="avatar">Avatar</label>
                            <input id="avatar" name="avatar" type="file" class="form-control mb-3">
                            <span class="text-danger">
                                <?= formErrors('avatar', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="role">Role</label>
                            <select name="role" class="form-control mb-3 select2">
                                <option <?= isset($_SESSION['data']) &&  $_SESSION['data']['role'] == 0 ? 'selected' : null ?> value="0">Member</option>
                                <option <?= isset($_SESSION['data']) &&  $_SESSION['data']['role'] == 1 ? 'selected' : null ?> value="1">Admin</option>
                            </select>
                            <span class="text-danger">
                                <?= formErrors('role', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Tạo mới
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect waves-light">Nhập lại</button>
                            <a class="btn btn-info" href="?action=users-list">Quay lại trang danh sách</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
<!-- end row -->

</div> <!-- container-fluid -->
<?php
if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
}
?>