<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Các hàm dùng Global
if (!function_exists('require_file')) {
    function require_file($pathFolder)
    {
        $files = array_diff(scandir($pathFolder), ['.', '..']);
        foreach ($files as $file) {
            require_once $pathFolder . $file;
        }
    }
}

if (!function_exists('debug')) {
    function debug($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die();
    }
}

if (!function_exists('e404')) {
    function e404()
    {
        require_once 'e404.php';
        die;
    }
}

// Hàm gửi email 

function sendMail($to, $subject, $content)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'tungtvph46392@fpt.edu.vn';                     //SMTP username
        $mail->Password   = 'aomzejfaunfzynpe';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('tungtvph46392@fpt.edu.vn', 'Mailer');
        $mail->addAddress($to);     //Add a recipient

        // Bảo mật email chứng chỉ ssl
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Content
        $mail->CharSet = "UTF-8";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $content;
        $sendMail =  $mail->send();
        if ($sendMail) {
            return $sendMail;
        }
        echo 'Gửi email thành công';
    } catch (Exception $e) {
        echo "Gửi email thất bại. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Hàm chuyển hướng 
function redirect($path = '')
{
    header("Location: $path");
    exit();
}

// Hàm hiển thị thông tin lỗi
function formErrors($fileName, $errors)
{
    return (!empty($errors[$fileName])) ? reset($errors[$fileName]) : null;
}

// Hàm upload file 
if (!function_exists('upload_file')) {
    function upload_file($file, $pathFolderUpload)
    {
        $imagePath = $pathFolderUpload . time() . '-' . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], PATH_UPLOAD . $imagePath)) {
            return $imagePath;
        }
        return null;
    }
}


// Hàm kiếm tra file ảnh có thực sự được tải lên ko
if (!function_exists('get_file_upload')) {
    function get_file_upload($field, $default = null)
    {
        if (isset($_FILES[$field]) && $_FILES[$field]['size'] > 0) {
            return $_FILES[$field];
        }
        return $default ?? null;
    }
}

// Hàm kiểm tra login 
if (!function_exists('middleware_auth_check')) {
    function middleware_auth_check($action)
    {
        if ($action == 'login') {
            if (!empty($_SESSION['user'])) {
                redirect(BASE_URL_ADMIN);
                exit();
            }
        } elseif (empty($_SESSION['user'])) {
            redirect(BASE_URL_ADMIN . "?action=login");
            exit();
        }
    }
}

if (!function_exists('middleware_client_check')) {
    function middleware_client_check($action, $arrRouteNeedAuth)
    {
        if ($action == 'login-client') {
            if (!empty($_SESSION['user'])) {
                redirect(BASE_URL);
                exit();
            }
        } elseif (empty($_SESSION['user']) && in_array($action, $arrRouteNeedAuth)) {
            redirect(BASE_URL . "?action=login-client");
            exit();
        }
    }
}

function setUpStatus($status)
{
    switch ($status) {
        case 1:
            $show = '<span class="btn btn-warning btn-sm waves-effect waves-light">Chờ xác nhận</span>';
            break;
        case 2:
            $show = '<span class="btn btn-info btn-sm waves-effect waves-light">Đang chuẩn bị hàng</span>';
            break;
        case 3:
            $show = '<span class="btn btn-primary btn-sm waves-effect waves-light">Đang vận chuyển</span>';
            break;
        case 4:
            $show = '<span class="btn btn-success btn-sm waves-effect waves-light">Đã giao hàng thành công</span>';
            break;
        default:
            $show = '<span class="btn btn-danger btn-sm waves-effect waves-light">Đã hủy đơn</span>';
            break;
    }
    return $show;
}

if (!function_exists('caculator_total_order')) {
    function caculator_total_order($flag = true)
    {
        if (isset($_SESSION['cart'])) {
            $total = 0;
            foreach ($_SESSION['cart'] as $item) {
                $price = $item['discount'] ?: $item['price_regular'];
                $total += $price * $item['quantity'];
            }
            return $flag ? number_format($total, 0) : $total;
        }
        return 0;
    }
}

if (!function_exists('calculator_total_coupon')) {
    function calculator_total_coupon($flag = true)
    {
        if (isset($_SESSION['coupon'])) {
            $total = caculator_total_order(false);
            if ($_SESSION['coupon']['condition'] == 1) {
                $discount = ($total * $_SESSION['coupon']['number']) / 100;
                if ($discount > $_SESSION['coupon']['maximum_percent']) {
                    $discount = $_SESSION['coupon']['maximum_percent'];
                }
                $totalCoupon = $total - $discount;
                return $flag ? number_format($totalCoupon, 0) : $totalCoupon;
            } elseif ($_SESSION['coupon']['condition'] == 2) {
                $totalCoupon =  $total - $_SESSION['coupon']['number'];
                return $flag ? number_format($totalCoupon, 0) : $totalCoupon;
            }
        }
        return 0;
    }
}

if (!function_exists('settings')) {
    function settings()
    {
        $fileSettings = PATH_UPLOAD . 'uploads/settings/settings.json';
        if (file_exists($fileSettings)) {
            $data = json_decode(file_get_contents($fileSettings), true);
        } else {
            $settings = listAll('settings');

            $keys = array_column($settings, 'key');
            $values = array_column($settings, 'value');

            $data =  array_combine($keys, $values);

            // Tạo file
            file_put_contents($fileSettings, json_encode($data));
        }
        return $data;
    }
}
