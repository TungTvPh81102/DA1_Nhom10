<?php
function usersList()
{
    $title = "Danh sách người dùng có trên hệ thống";
    $view = "users/indexView";
    $script = "../scripts/data-table";
    $style = "../styles/data-table";
    $users = listAll('users');
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
function userCreate()
{
    $title = "Thêm mới người dùng";
    $view = "users/createView";
    if (!empty($_POST)) {
        $activeToken = sha1(uniqid() . time());
        $data = [
            'first_name' => $_POST['first_name'] ?? null,
            'last_name' => $_POST['last_name'] ?? null,
            'email' => $_POST['email'] ?? null,
            'phone_number' => $_POST['phone_number'] ?? null,
            'address' => $_POST['address'] ?? null,
            'password' => password_hash($_POST['password'] ?? null, PASSWORD_DEFAULT),
            'avatar' => get_file_upload('avatar'),
            'role' => $_POST['role'] ?? null,
            'active_token' => $activeToken,
            'created_at' => date('Y-m-d H:i:s')

        ];

        validateUserCreate($data);

        $avatar = $data['avatar'];
        if (is_array($avatar) && $avatar['size'] > 0) {
            $data['avatar'] = upload_file($avatar, 'uploads/users/');
        }

        $insert = insert('users', $data);
        if ($insert) {
            $linkActive = BASE_URL_ADMIN . "?action=active&token=" . $activeToken;

            // Tạo nội dung tiến hành gửi mã kích hoạt cho người dùng
            $subject = $data['first_name'] . ' ' . $data['last_name'] . 'Vui lòng kích hoạt tài khoản của bạn';
            $content = 'Chào ' . $data['first_name'] . ' ' . $data['last_name'] . '<br>';
            $content .= ' Vui lòng kích vào link dưới đây để kích hoạt tài khoản' . '<br>';
            $content .= $linkActive . '<br>';
            $content .= 'Trân trọng cảm ơn bạn!!!';

            // Tiến hành gửi email
            sendMail($data['email'], $subject, $content);

            $_SESSION['success'] = 'Thêm người dùng thành công';
            redirect(BASE_URL_ADMIN . "?action=users-list");
            exit();
        } else {
            $_SESSION['errors'] = 'Lỗi hệ thống, vui lòng thử lại sau ít phút';
            redirect(BASE_URL_ADMIN . "?action=users-list");
            exit();
        }
    }
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
function userDetail()
{

    $id = $_GET['id'];
    $user = showOne('users', $id);
    if (empty($user)) {
        e404();
    }
    $title = "Chi tiết người dùng: " . $user['first_name'] . $user['last_name'];
    $view = "users/showView";
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
function userUpdate()
{

    $id = $_GET['id'];
    $user = showOne('users', $id);

    if (empty($user)) {
        e404();
    }

    $title = "Cập nhật người dùng: " . $user['first_name'] . $user['last_name'];
    $view = "users/updateView";
    if (!empty($_POST)) {
        $data = [
            'first_name' => $_POST['first_name'] ?? $user['first_name'],
            'last_name' => $_POST['last_name'] ?? $user['last_name'],
            'email' => $_POST['email'] ?? $user['email'],
            'phone_number' => $_POST['phone_number'] ?? $user['phone_number'],
            'address' => $_POST['address'] ?? $user['address'],
            'password' => password_hash($_POST['password'] ?? $user['password'], PASSWORD_DEFAULT),
            'avatar' => get_file_upload('avatar', $user['avatar']),
            'status' => $_POST['status'] ?? $user['status'],
            'role' => $_POST['role'] ?? $user['role'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        validateUserUpdate($id, $data);
        $avatar = $data['avatar'];
        if (is_array($avatar)  && $avatar['size'] > 0) {
            $data['avatar'] = upload_file($avatar, "uploads/users/");
            if (!empty($avatar) && !empty($user['avatar'] && file_exists(PATH_UPLOAD . $user['avatar'])) && !empty($data['avatar'])) {
                unlink(PATH_UPLOAD . $user['avatar']);
            }
        } else {
            $data['avatar'] = $user['avatar'];
        }
        update('users', $id, $data);
        $_SESSION['success'] = 'Cập nhật người dùng thành công';
        redirect(BASE_URL_ADMIN . "?action=user-update&id=" . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
function userDelete()
{
    $id = $_GET['id'];
    $user = showOne('users', $id);

    if (empty($user)) {
        e404();
    }

    deleteRow('users', $id);
    // Kiểm tra và tiến hành xóa hình ảnh của người dùng khi đã xóa thành công dữ liệu
    if (!empty($user['avatar']) && file_exists(PATH_UPLOAD . $user['avatar'])) {
        unlink(PATH_UPLOAD . $user['avatar']);
    }

    $_SESSION['success'] = 'Xóa người dùng thành công';
    redirect(BASE_URL_ADMIN . "?action=users-list");
    exit();
}
function activeStatus()
{
    require_once PATH_VIEW_ADMIN . 'users/activeView.php';
}

// HÀM VALIDATE CREATE
function validateUserCreate($data)
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
        } else if (!checkUniqueEmail('users', $data['email'])) {
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

    if (empty(trim($data['password']))) {
        $errors['password']['required'] = 'Vui lòng nhập mật khẩu';
    } elseif (strlen(trim($data['password'])) < 8) {
        $errors['password']['length'] = 'Vui lòng nhập mật khẩu lớn hơn 8 ký tự';
    }

    if (empty($data['avatar']['name'])) {
        $errors['avatar']['required'] = 'Vui lòng thêm hình ảnh';
    } else {
        $typeImage = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
        if ($data['avatar']['size'] >= 2 * 1024 * 1024) {
            $errors['avatar']['size'] = 'Ảnh chỉ nhỏ hơn 2M';
        } else if (!in_array($data['avatar']['type'], $typeImage)) {
            $errors['avatar']['type'] = 'Ảnh chỉ chấp nhận định dạng file: png, jpg, jpeg, gif';
        }
    }

    if ($data['role'] === null) {
        $errors['role']['required'] = 'Vui lòng chọn vai trò';
    } elseif (!in_array($data['role'], [0, 1])) {
        $errors['role']['user'] = 'Vai trò phải là người dùng hoặc admin';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
        redirect(BASE_URL_ADMIN . "?action=user-create");
        exit();
    }
}


function validateUserUpdate($id, $data)
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

    if (empty(trim($data['password']))) {
        $errors['password']['required'] = 'Vui lòng nhập mật khẩu';
    } elseif (strlen(trim($data['password'])) < 8) {
        $errors['password']['length'] = 'Vui lòng nhập mật khẩu lớn hơn 8 ký tự';
    }

    if (!empty($data['avatar']['name']) && is_array($data['avatar']) && $data['avatar']['size'] > 0) {
        $typeImage = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
        if ($data['avatar']['size'] >= 2 * 1024 * 1024) {
            $errors['avatar']['size'] = 'Ảnh chỉ nhỏ hơn 2M';
        } else if (!in_array($data['avatar']['type'], $typeImage)) {
            $errors['avatar']['type'] = 'Ảnh chỉ chấp nhận định dạng file: png, jpg, jpeg, gif';
        }
    }

    if ($data['status'] === null) {
        $errors['status']['required'] = 'Vui lòng chọn trạng thái';
    } elseif (!in_array($_POST['status'], [0, 1])) {
        $errors['status']['user'] = 'Trạng thái phải là kích hoặc hoặc không kích hoạt';
    }

    if ($data['role'] === null) {
        $errors['role']['required'] = 'Vui lòng chọn vai trò';
    } elseif (!in_array($data['role'], [0, 1])) {
        $errors['role']['user'] = 'Vai trò phải là người dùng hoặc admin';
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect(BASE_URL_ADMIN . "?action=user-update&id=" . $id);
        exit();
    }
}
