<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Quản lý đường dẫn ảnh</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                    <h6 class="m-0 font-weight-bold">Danh sách đường dẫn ảnh</h6>
                </div>
                <div class="card-body">
                    <!-- Hiển thị thông báo thành công -->
                    <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
                    <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>
                    <form action="<?= BASE_URL_ADMIN . '?action=setting-save' ?>" method="post">
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Tên Đường Dẫn</th>
                                    <th>Đường Liên Kết</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Logo</td>
                                    <td>
                                        <input type="text" class="form-control" name="logo"
                                            value="<?= $settings['logo'] ?? null ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Favi Icon</td>
                                    <td>
                                        <input type="text" class="form-control" name="favi-icon"
                                            value="<?= $settings['favi-icon'] ?? null ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Top Bar Title</td>
                                    <td>
                                        <input type="text" class="form-control" name="topbar-title"
                                            value="<?= $settings['topbar-title'] ?? null ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>URL Facebook</td>
                                    <td>
                                        <input type="text" class="form-control" name="url-facebook"
                                            value="<?= $settings['url-facebook'] ?? null ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Good Email</td>
                                    <td>
                                        <input type="text" class="form-control" name="good-email"
                                            value="<?= $settings['good-email'] ?? null ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Thanks</td>
                                    <td>
                                        <input type="text" class="form-control" name="thanks"
                                            value="<?= $settings['thanks'] ?? null ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fail</td>
                                    <td>
                                        <input type="text" class="form-control" name="fail"
                                            value="<?= $settings['fail'] ?? null ?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->