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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="first_name">Full name</label>
                            <input id="first_name" name="first_name" type="text" class="form-control mb-3" placeholder="First Name" value="<?= $user['first_name'] . '' . $user['last_name'] ?>" readonly>
                        </div>
                        <div class=" mb-3">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" class="form-control mb-3" placeholder="Enter email" value="<?= $user['email'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number">Phone Number</label>
                            <input id="phone_number" name="phone_number" type="number" class="form-control mb-3" placeholder="Phone Number" value="<?= $user['phone_number'] ?>" readonly>

                        </div>


                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input id="address" name="address" type="text" class="form-control mb-3" placeholder="Address" value="<?= $user['address'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" class="form-control mb-3" placeholder="Enter Password" value="<?= $user['password'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="avatar">Avatar</label>
                            <div class="img">
                                <img style="width: 120px;" src="<?= BASE_URL .  $user['avatar'] ?>" alt="" class="rounded-2">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="role">Role</label>
                            <select name="role" class="form-control mb-3 select2" disabled>
                                <option <?= !$user['role'] ? 'selected' : null ?> value="0" readonly>Member
                                </option>
                                <option <?= $user['role'] ? 'selected' : null ?> value="1" readonly>Admin
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="created_at">Ngày tạo</label>
                            <input id="created_at" name="created_at" type="text" class="form-control mb-3" value="<?= $user['created_at'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="updated_at">Ngày cập nhật</label>
                            <input id="updated_at" name="updated_at" type="text" class="form-control mb-3" value="<?= $user['updated_at'] ?? 'Chưa có dữ liệu' ?>" readonly>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
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