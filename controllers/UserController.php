<?php
function loginClient()
{
    $view = 'user/loginClient';
    require_once PATH_VIEW . 'layout/master.php';
}
function registerClient()
{
    $title = 'Đăng ký tài khoản';
    $view = 'user/registerClient';
    if (!empty($_POST)) {
        $activeToken = sha1(uniqid() . time());
        $data = [
            'first_name' => $_POST['first_name'] ?? null,
            'last_name' => $_POST['last_name'] ?? null,
            'email' => $_POST['email'] ?? null,
            'password' => password_hash($_POST['password'] ?? null, PASSWORD_DEFAULT),
            'active_token' => $activeToken,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        validateRegister($data);

        // Insert vào hệ thống
        $insert = insert('users', $data);

        if ($insert) {
            $linkActive = BASE_URL . "?action=active-account&token=" . $activeToken;

            // Tạo nội dung tiến hành gửi mã kích hoạt cho người dùng
            $subject = $data['first_name'] . ' ' . $data['last_name'] . 'Vui lòng kích hoạt tài khoản của bạn';
            $content = 'Chào ' . $data['first_name'] . ' ' . $data['last_name'] . '<br>';
            $content .= ' Vui lòng kích vào link dưới đây để kích hoạt tài khoản' . '<br>';
            $content .= $linkActive . '<br>';
            $content .= 'Trân trọng cảm ơn bạn!!!';

            // Tiến hành gửi email
            sendMail($data['email'], $subject, $content);

            $_SESSION['success'] = 'Đăng ký tài khoản thành công, kiểm tra email để xác thực tài khoản';
            redirect(BASE_URL . "?action=register-client");
            exit();
        } else {
            $_SESSION['errors'] = 'Lỗi hệ thống, vui lòng thử lại sau ít phút';
            redirect(BASE_URL . "?action=register-client");
            exit();
        }
    }
    require_once PATH_VIEW . 'layout/master.php';
}

function activeAccount()
{
    $title = 'Kích hoạt tài khoản';
    $view = 'user/activeAccount';
    require_once PATH_VIEW . 'user/activeAccount.php';
}

function validateRegister($data)
{
    $errors = [];

    if (empty(trim($data['first_name']))) {
        $errors['first_name']['required'] = 'Vui lòng nhập thông tin';
    }

    if (empty(trim($data['last_name']))) {
        $errors['last_name']['required'] = 'Vui lòng nhập thông tin';
    }

    if (empty(trim($data['email']))) {
        $errors['email']['required'] = 'Vui lòng nhập địa chỉ email';
    } else {
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email']['check'] = 'Email không đúng định dạng';
        } elseif (!checkUniqueEmail('users', $data['email'])) {
            $errors['email']['unique'] = 'Email đã tồn tại trên hệ thống, vui lòng nhập email khác';
        }
    }

    if (empty(trim($data['password']))) {
        $errors['password']['required'] = 'Vui lòng nhập mật khẩu';
    } elseif (strlen(trim($data['password'])) < 8) {
        $errors['password']['length'] = 'Mật khẩu phải lớn hơn 8 ký tự';
    }

    if (trim($_POST['confirm_password']) !== trim($_POST['password'])) {
        $errors['confirm_password']['confirm'] = 'Xác nhận mật khẩu không khớp, thử lại';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
        redirect(BASE_URL . '?action=register-client');
        exit();
    }
}
