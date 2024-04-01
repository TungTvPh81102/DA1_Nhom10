<?php
function adminLogin()
{
    if (!empty($_POST)) {
        authLogin();
    }
    require_once PATH_VIEW_ADMIN . "auth/loginView.php";
}

function adminLogout()
{

    if (!empty($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    redirect(BASE_URL_ADMIN . "?action=logout");
    exit();
}

function authLogin()
{
    if (!empty($_POST)) {
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];
        $user = getUserAdmin($data);
        if (!empty($user)) {
            $paswordHash =  password_verify($data['password'], $user['password']);
            if ($paswordHash) {
                if ($user['status'] == 1 && $user['role'] == 1) {
                    $_SESSION['user'] = $user;
                    redirect(BASE_URL_ADMIN);
                    exit();
                } else {
                    $_SESSION['errors'] = 'Tài khoản không được cấp quyền truy cập';
                }
            } else {
                $_SESSION['errors'] = 'Mật khẩu nhập vào chưa chính xác';
            }
        } else {
            $_SESSION['errors'] = 'Email và mật khẩu chưa chính xác';
            redirect(BASE_URL_ADMIN . "?action=login");
            exit();
        }
    }
}
