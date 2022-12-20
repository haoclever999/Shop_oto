<?php
require("../../model/database.php");
require("../../model/nguoidung.php");
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "macdinh";
}
$nd = new NGUOIDUNG();
$Loi = "";
switch ($action) {
    case "macdinh":
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;
    case "them":
        include("adduser.php");
        break;
    case "xulythem":
        // upload ảnh lên server
        $hinhanh = "avatar/" . basename($_FILES["filehinhanh"]["name"]);
        $duongdan = "../images/" . $hinhanh;
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);

        //Thêm mặt hàng mới vào CSDL
        $email = $_POST["txtemail"];
        $sodienthoai = $_POST["txtsodienthoai"];
        $matkhau = $_POST["txtmatkhau"];
        $nhaplaimatkhau = $_POST["txtnhaplaimatkhau"];
        $hoten = $_POST["txthoten"];
        $loai = $_POST["optdanhmuc"];
        $dodai = strlen($matkhau);
        if ($dodai < 6) {
            echo "Mật khẩu phải lớn hơn 6 kí tự, hãy nhập lại.";
            include("adduser.php");
        } elseif ($matkhau != $nhaplaimatkhau) {
            echo "Nhập lại mật khẩu không khớp, hãy nhập lại.";
            include("adduser.php");
        } else {
            $nd->themnguoidung($email, $sodienthoai, md5($matkhau), $hoten, $loai, $hinhanh);
            $nguoidung = $nd->laydanhsachnguoidung();
            include("main.php");
        }
        include("main.php");
        break;
    case "xoa":
        if (isset($_GET["id"])) {
            $nd->xoanguoidung($_GET["id"]);
        }
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;
    case "suahs":
        // show form sửa ngay dòng có id tương ứng 
        if (isset($_GET["id"])) {
            include("updatehoso.php");
        }
        break;
    case "capnhatnguoidung":
        $email = $_POST["txtemail"];
        $hoten = $_POST["txthoten"];
        $sodienthoai = $_POST["txtdienthoai"];
        $hinhanh = $_POST["txthinhanh"];
        if ($_FILES["fhinh"]["name"] != "") {
            //Xóa hình cũ khi cập nhật
            $hinhanh_cu = "../images/" . $hinhanh;
            if (file_exists($hinhanh_cu)) {
                unlink($hinhanh_cu);
            }
            // xử lý file upload
            $hinhanh = "avatar/" . basename($_FILES["fhinh"]["name"]);
            $duongdan = "../images/" . $hinhanh;
            move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);
        }

        $nd->capnhatnguoidung($email, $hoten, $sodienthoai, $hinhanh);
        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
        include("main.php");
        break;


        // $email = $_POST["txtemail"];
        // $hoten = $_POST["txthoten"];
        // $sodienthoai = $_POST["txtdienthoai"];
        // $hinhanh = $_POST["txthinhanh"];
        // if ($_FILES["fhinh"]["name"] != "") {
        //     //Xóa hình cũ khi cập nhật
        //     $hinhanh_cu = "../images/" . $hinhanh;
        //     if (file_exists($hinhanh_cu)) {
        //         unlink($hinhanh_cu);
        //     }
        //     // xử lý file upload
        //     $hinhanh = "avatar/" . basename($_FILES["fhinh"]["name"]);
        //     $duongdan = "../images/" . $hinhanh;
        //     move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);
        // }

        // $nd->capnhatnguoidung($email, $hoten, $sodienthoai, $hinhanh);
        // $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
        // include("main.php");
        // break;
    case "khoa":
        $id = $_GET["id"];
        $trangthai = $_GET["trangthai"];
        $nd->capnhattrangthai($id, $trangthai);
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;
    case "nangcap":
        $ndung = $nd->laynguoidungtheoid($_GET["id"]);
        include("nangcapquyen.php");
        break;
    case "nangcapquyen":
        $nd->capnhatquyen($_POST["txtid"], $_POST["optquyen"]);
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;
    case "capnhatmatkhau":
        // $matkhaucu = md5($_POST["txtmatkhaucu"]);
        // $matkhaumoi = $_POST["txtmatkhaumoi"];
        // $nhaplaimatkhau = $_POST["txtnhaplaimatkhau"];

        // if ($_SESSION["nguoidung"]["matkhau"] != $matkhaucu) {
        //     echo '<p style="color:red"> Mật khẩu cũ sai rồi </p>';
        // } elseif (strlen($matkhaumoi) < 6) {
        //     echo '<p style="color:red"> Mật khẩu mới phải lớn hơn 6 kí tự, hãy nhập lại. </p>';
        // } elseif ($matkhaumoi != $nhaplaimatkhau) {
        //     echo '<p style="color:red"> Mật khẩu mới và nhập lại mật khẩu phải giống nhau, hãy nhập lại. </p>';
        // } else {
        //     $nd->capnhatmatkhau($_SESSION["nguoidung"]["id"], $matkhaumoi);
        //     echo '<p style="color:green"> Mật khẩu đã thay đổi thành công </p>';
        // }
        // include("main.php");
        break;
    default:
        break;
}
