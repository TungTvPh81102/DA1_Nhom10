<h1>Thanh toán thành công</h1>

<?php
if ($secureHash == $vnp_SecureHash) {
    if ($_GET['vnp_ResponseCode'] == '00') {
        echo "<span style='color:blue'>GD Thanh cong</span>";
    } else {
        echo "<span style='color:red'>GD Khong thanh cong</span>";
    }
} else {
    echo "<span style='color:red'>Chu ky khong hop le</span>";
}
?>

?>