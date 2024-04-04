<?php
function loginClient()
{
    $view = 'user/loginClient';
    if (!empty($_POST)) {
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];
        $user = getUserClient($data);
        if (!empty($user)) {
            // KIỂM TRA XEM MẬT KHẨU ĐƯỢC MÃ HÓA CÓ ĐÚNG VỚI DỮ LIỆU NGƯỜI DÙNG NHẬP VÀO HAY KHÔNG
            $passwordHash = password_verify($_POST['password'], $user['password']);
            if ($passwordHash) {
                if ($user['status'] == 1) {
                    $_SESSION['user'] = $user;
                    redirect(BASE_URL);
                } else {
                    $_SESSION['errors'] = 'Tài khoản chưa được kích hoạt vui lòng thử lại sau';
                }
            } else {
                $_SESSION['errors'] = 'Mật khẩu chưa chính xác, vui lòng kiểm tra lại';
            }
        } else {
            $_SESSION['errors'] = 'Tài khoản mật khẩu chưa chính xác, vui lòng kiếm tra lại';
            redirect(BASE_URL . "?action=login-client");
            exit();
        }
    }
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

            $_SESSION['success'] = 'Đăng ký tài khoản thành công, kiểm tra email để kích hoạt tài khoản';
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

function forgotPassword()
{
    $title = 'Đổi mật khẩu';
    $view = 'user/forgotPassword';
    if (!empty($_POST)) {
        $email = $_POST['email'] ?? null;

        $queryUser = getIdUser($email);
        if (!empty($queryUser)) {
            $userID = $queryUser['id'];

            $forgotToken = sha1(uniqid() . time());

            $data = [
                'forgot_token' => $forgotToken,
            ];
            $updateToken = update('users', $userID, $data);
            if ($updateToken) {
                // Đường dẫn khôi phục mật khẩu
                $linkReset = BASE_URL . '?action=reset-password&token=' . $forgotToken;

                // Tiến hành gửi email
                $subject = 'Yêu cầu khôi phục mật khẩu';
                $content = 'Chào bạn' . '<br>';
                $content .= 'Chúng tôi nhận được yêu cầu khôi phục mật khẩu từ bạn, vui lòng nhấp vào link sau để đổi lại mật khẩu' . '<br>';
                $content .= $linkReset . '<br>';
                $content .= 'Trân trọng cảm ơn !!!';

                $sendEmail = sendMail($email, $subject, $content);

                if ($sendEmail) {
                    $_SESSION['success'] = 'Vui lòng kiểm tra hòm thư để khôi phục mật khẩu';
                } else {
                    $_SESSION['errors'] = 'Lỗi hệ thống, vui lòng thử lại sau';
                }
            } else {
                $_SESSION['errors'] = 'Lỗi hệ thống, vui lòng thử lại sau';
            }
        } else {
            $_SESSION['errors'] = 'Email không tồn tại trên hệ thống, vui lòng kiểm tra lại';
        }
        redirect(BASE_URL . '?action=forgot-password');
    }
    require_once PATH_VIEW . 'layout/master.php';
}

function resetPassword()
{
    $title = 'Thay đổi mật khẩu';
    $view = 'user/resetPassword';

    $token = $_GET['token'];
    if (isset($token)) {
        // LẤY MÃ TOKEN TỪ HỆ THỐNG ĐỂ TIẾN HÀNH QUÊN MẬT KHẨU
        $tokenQuery = getForgotToken($token);
        if (!empty($tokenQuery)) {
            $userID = $tokenQuery['id'];
            if (!empty($_POST)) {
                $errors = [];

                if (empty(trim($_POST['password']))) {
                    $errors['password']['required'] = 'Vui lòng nhập mật khẩu';
                } elseif (strlen(trim($_POST['password'])) < 8) {
                    $errors['password']['length'] = 'Mật khẩu phải lớn hơn 8 ký tự';
                }

                if (trim($_POST['confirm_password']) !== trim($_POST['password'])) {
                    $errors['confirm_password']['confirm'] = 'Xác nhận mật khẩu không khớp, thử lại';
                }

                if (empty($errors)) {
                    $data = [
                        'password' => password_hash($_POST['password'] ?? null, PASSWORD_DEFAULT),
                        'forgot_token' => null,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    update('users', $userID, $data);
                    echo '<script>alert("Thay đổi mật khẩu thành công")</script>';
                    redirect(BASE_URL . '?action=login-client');
                } else {
                    $_SESSION['errors'] = $errors;
                    redirect(BASE_URL . '?action=reset-password&token=' . $token);
                }
            }
        } else {
            redirect(BASE_URL . 'e404.php');
        }
    }
    require_once PATH_VIEW . 'layout/master.php';
}


function logoutClient()
{
    if (!empty($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    redirect(BASE_URL . "?action=login-client");
    exit();
}

function myAccount()
{
    $view = 'user/myAccount';
    $title = 'My Account';
    $userID = $_SESSION['user']['id'];

    if (!empty($_POST)) {
        // LẤY DỮ LIỆU TỪ FORM
        $data = [
            'first_name' => $_POST['first_name'] ?? $_SESSION['user']['first_name'],
            'last_name' => $_POST['last_name'] ?? $_SESSION['user']['last_name'],
            'email' => $_POST['email'] ?? $_SESSION['user']['email'],
            'phone_number' => $_POST['phone_number'] ?? $_SESSION['user']['phone_number'],
            'address' => $_POST['address'] ?? $_SESSION['user']['address'],
            'avatar' => get_file_upload('avatar') ?? $_SESSION['user']['avatar'],
            'updated_at' => date('Y-m-d H:i:s')
        ];

        validateUpdateUserClient($userID, $data);

        $avatar = $data['avatar'];

        // KIỂM TRA XEM NGƯỜI DÙNG CÓ TẢI HÌNH ẢNH LÊN HAY KHÔNG
        if (is_array($avatar) && $avatar['size'] > 0) {
            $data['avatar'] = upload_file($avatar, 'uploads/users/');
            if (
                !empty($data['avatar']) &&
                !empty($_SESSION['user']['avatar']) &&
                file_exists(PATH_UPLOAD . $_SESSION['user']['avatar']) &&
                !empty($data['avatar'])
            ) {
                unlink(PATH_UPLOAD . $_SESSION['user']['avatar']);
            }
        } else {
            $data['avatar'] = $_SESSION['user']['avatar'];
        }

        update('users', $userID, $data);
        $_SESSION['user'] = getUserbyEmail($data['email']);
        $_SESSION['success'] = 'Cập nhật thông tin thành công';
        redirect(BASE_URL . '?action=my-account');
    }
    require_once PATH_VIEW . 'layout/master.php';
}

function changePassword()
{
    $view = 'user/changePassword';
    $title = 'Change Password';
    $user = showOne('users', $_SESSION['user']['id']);
    if (!empty($_POST)) {
        $passwordNew = $_POST['password_new'];
        $confirmPassword = $_POST['confirm_password'];
        if (!password_verify($_POST['password_old'], $user['password'])) {
            $_SESSION['errors'] = 'Mật khẩu cũ chưa chính xác';
        } else {
            if (strlen(trim($passwordNew)) < 6 || strlen(trim($passwordNew)) > 50) {
                $_SESSION['errors'] = 'Mật khẩu mới dài từ 6 đến 50 ký tự';
            } else if ($confirmPassword !== $passwordNew) {
                $_SESSION['errors'] = 'Xác nhận mật khẩu chưa chính xác';
            }
        }
        if (empty($_SESSION['errors'])) {
            $data = [
                'password' => $_POST['password_new'] ? password_hash($_POST['password_new'], PASSWORD_DEFAULT) : $user['password'],
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            update('users',  $user['id'], $data);
            $_SESSION['success'] = 'Cập nhật thông tin thành công';
        }
        redirect(BASE_URL . '?action=change-password');
    }
    require_once PATH_VIEW . 'layout/master.php';
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

function validateUpdateUserClient($id, $data)
{

    $errors = [];

    if (empty(trim($data['first_name']))) {
        $errors['first_name']['required'] = 'Vui lòng nhập thông tin';
    } else if (strlen(trim($data['first_name'])) > 20) {
        $errors['first_name']['length'] = 'Vui lòng nhập độ dài tối đa 20 ký tự';
    }

    if (empty(trim($data['last_name']))) {
        $errors['last_name']['required'] = 'Vui lòng nhập thông tin';
    } elseif (strlen(trim($data['last_name'])) > 20) {
        $errors['last_name']['length'] = 'Vui lòng nhập độ dài tối đa 50 ký tự';
    }

    if (empty(trim($data['email']))) {
        $errors['email']['required'] = 'Vui lòng nhập địa chỉ email';
    } else {
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email']['emailcheck'] = 'Email nhập vào sai định dạng, vui lòng kiểm tra lại';
        } else if (!checkUniqueEmailForUpdate('users', $id, $data['email'])) {
            $errors['email']['unique'] = 'Email đã tồn tại trên hệ thống, vui lòng nhập email khác';
        }
    }

    if (empty(trim($data['phone_number']))) {
        $errors['phone_number']['required'] = 'Vui lòng nhập số điện thoại';
    } else {
        if (strlen(trim($data['phone_number'])) > 11) {
            $errors['phone_number']['length'] = 'Số điện thoại chỉ tối đa 11 ký tự';
        }
    }

    if (empty(trim($data['address']))) {
        $errors['address']['required'] = 'Vui lòng nhập địa chỉ';
    }

    if (!empty($data['avatar']['name']) && is_array($data['avatar']) && $data['avatar']['size'] > 0) {
        $typeImage = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
        if ($data['avatar']['size'] >= 2 * 1024 * 1024) {
            $errors['avatar']['size'] = 'Ảnh chỉ nhỏ hơn 2M';
        } else if (!in_array($data['avatar']['type'], $typeImage)) {
            $errors['avatar']['type'] = 'Ảnh chỉ chấp nhận định dạng file: png, jpg, jpeg, gif';
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect(BASE_URL . "?action=my-account");
        exit();
    }
}
