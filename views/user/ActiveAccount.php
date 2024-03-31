<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/admin/css/bootstrap.min.css">
    <title>Kích hoạt tài khoản</title>
</head>

<body>
    <?php
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        if (!empty($token)) {
            $tokenQuery = activeToken($token);
            if (!empty($tokenQuery)) {
                $userId = $tokenQuery['id'];
                $data = [
                    'status' => 1,
                    'active_token' => null
                ];
                $updateStatus = update('users', $userId, $data);
                if ($updateStatus) {
                    echo '<div class="alert alert-success">Kích hoạt tài khoản thành công, bạn có thể đăng nhập ngay bây giờ</div>';
                } else {
                    echo '<div class="alert alert-danger">Kích hoạt tài khoản thất bại, vui lòng liên hệ quản trị viên</div>';
                }
            } else {
                echo '<div class="alert alert-danger">Liên kết không tồn tại hoặc đã hết hạn, vui lòng hiểm tra lại</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Liên kết không tồn tại hoặc đã hết hạn, vui lòng hiểm tra lại</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Liên kết không tồn tại hoặc đã hết hạn, vui lòng hiểm tra lại</div>';
    }
    ?>
</body>

</html>