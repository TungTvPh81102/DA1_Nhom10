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
                    <!-- Hiển thị thông báo thành công -->
                    <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
                    <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>
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
                            <input id="first_name" name="first_name" type="text" class="form-control mb-3"
                                placeholder="First Name" value="<?= $user['first_name'] ?>">
                            <span class=" text-danger">
                                <?= formErrors('first_name', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="last_name">Last Name</label>
                            <input id="last_name" name="last_name" type="text" class="form-control mb-3"
                                placeholder="Last Name" value="<?= $user['last_name'] ?>">
                            <span class="text-danger">
                                <?= formErrors('last_name', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" class="form-control mb-3"
                                placeholder="Enter email" value="<?= $user['email'] ?>">
                            <span class="text-danger">
                                <?= formErrors('email', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number">Phone Number</label>
                            <input id="phone_number" name="phone_number" type="number" class="form-control mb-3"
                                placeholder="Phone Number" value="<?= $user['phone_number'] ?>">
                            <span class="text-danger">
                                <?= formErrors('phone_number', $errorsMess) ?>
                            </span>
                        </div>


                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input id="address" name="address" type="text" class="form-control mb-3"
                                placeholder="Address" value="<?= $user['address'] ?>">
                            <span class="text-danger">
                                <?= formErrors('address', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" class="form-control mb-3"
                                placeholder="Enter Password">
                            <span class="text-danger">
                                <?= formErrors('password', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="avatar">Avatar</label>
                            <div class="mb-2">
                                <img style="width: 70px;" src="<?= BASE_URL . $user['avatar'] ?>" alt=""
                                    class="rounded-2">
                            </div>
                            <input id="avatar" name="avatar" type="file" class="form-control mb-3">
                            <span class="text-danger">
                                <?= formErrors('avatar', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="status">Status</label>
                            <select name="status" class="form-control mb-3 select2">
                                <option <?= !$user['status'] ? 'selected' : null ?> value="0">Chưa kích hoạt
                                </option>
                                <option <?= $user['status'] ? 'selected' : null ?> value="1">Kích hoạt</option>
                            </select>
                            <span class="text-danger">
                                <?= formErrors('status', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="role">Role</label>
                            <select name="role" class="form-control mb-3 select2">
                                <option <?= !$user['role'] ? 'selected' : null ?> value="0">Member</option>
                                <option <?= $user['role'] ? 'selected' : null ?> value="1">Admin</option>
                            </select>
                            <span class="text-danger">
                                <?= formErrors('role', $errorsMess) ?>
                            </span>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Cập nhật
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