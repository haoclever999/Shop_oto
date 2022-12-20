<?php
require("../../model/database.php");
require("../../model/nguoidung.php");

$isLogin = isset($_SESSION["nguoidung"]);
// Kiểm tra action 
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {
    $action = "dangnhap";
} else {
    $action = "macdinh";
}

$nd = new NGUOIDUNG();
$tb = "";
switch ($action) {
    case "macdinh":
        include("main.php");
        break;
    case "dangnhap":
        include("loginform.php");
        break;
    case "xldangnhap":
        $email = $_POST["email"];
        $matkhau = $_POST["matkhau"];
        if ($nd->kiemtranguoidungkhachhang($email, $matkhau) == TRUE) {
            $_SESSION["nguoidung"] = $nd->laythongtinkhachhang($email);
            include("../../index.php?action=macdinh");
        } else if ($nd->kiemtranguoidunghople($email, $matkhau) == TRUE) {
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
            include("main.php");
        } else {
            $tb = "Tên đăng nhập hoặc mật khẩu không đúng";
            include("loginform.php");
        }
        break;
    case "xldangky":
        $tennd = $_POST["txttennd"];
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $nhaplaimatkhau = $_POST["txtnhaplaimatkhau"];
        $dienthoai = $_POST["txtdienthoai"];
        $gioitinh = $_POST["optgioitinh"];
        if ($gioitinh == "Nam")
            $hinhanh = "male_user.png";
        else
            $hinhanh = "female_user.png";
        $nd->themnguoidung($tennd, $email, $matkhau, $dienthoai, $gioitinh, $nhaplaimatkhau, $hinhanh, 2);
        break;
    case "dangxuat":
        // session_start();
        if (!isset($_SESSION['EXPIRES']) || $_SESSION['EXPIRES'] < time() + 3600) {
            unset($_SESSION["nguoidung"]);
            $_SESSION = array();
            echo '<script>alert("Cảm ơn!")</script>';
        }
        include("loginform.php");
        break;

    case "capnhatmatkhau":

    default:
        break;
}