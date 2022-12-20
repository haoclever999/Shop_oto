<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");
require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/sanpham.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "xem";
}

$dm = new DANHMUC();
$sp = new SANPHAM();
$masua = 0;

switch ($action) {
    case "xem":
        $sanpham = $sp->laysanpham();
        $danhmuc = $dm->laydanhmuc();
        include("main.php");
        break;
    case "them":
        $danhmuc = $dm->laydanhmuc();
        include("addform.php");
        break;
    case "xulythem":
        //Thêm mặt hàng mới vào CSDL
        $danhmuc_id = $_POST["optdanhmuc"];
        $tensanpham = $_POST["txttensp"];
        $mota = $_POST["txtmota"];
        $gia = $_POST["txtgia"];
        $soluong = $_POST["txtsoluong"];

        // upload ảnh lên server
        $hinhanh = "images/" . basename($_FILES["filehinhanh"]["name"]);
        $duongdan = "../../" . $hinhanh;
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        $sp->themsanpham($tensanpham,);

        //Hiển thị ds mặt hàng mới
        $sanpham = $sp->laysanpham();
        include("addform.php");
        break;
    case "xoa":
        if (isset($_GET["id"])) {
            $sp->xoasanpham($_GET["id"]);
        }
        $sanpham = $sp->laysanpham();
        include("main.php");
        break;

    case "sua":
        // show form sửa ngay dòng có id tương ứng 
        if (isset($_GET["id"])) {
            $m = $sp->laysanphamtheoid($_GET["id"]);
            $danhmuc = $dm->laydanhmuc();
            include("editform.php");
        } else {
            $sanpham = $sp->laysanpham();
            include("main.php");
        }
        break;

    case "capnhat":
        $id = $_POST["txtid"];
        $danhmuc_id = $_POST["optdanhmuc"];
        $tensanpham = $_POST["txttenhang"];
        $mota = $_POST["txtmota"];
        $giagoc = $_POST["txtgiagoc"];
        $giaban = $_POST["txtgiaban"];
        $soluongton = $_POST["txtsoluongton"];
        $luotxem = $_POST["txtluotxem"];
        $luotmua = $_POST["txtluotmua"];
        $hinhanh = $_POST["txthinhcu"];

        if ($_FILES["filehinhanh"]["name"] != "") {

            //Xóa hình cũ khi cập nhật
            $hinhanh_cu = "../../" . $hinhanh;
            if (file_exists($hinhanh_cu)) {
                unlink($hinhanh_cu);
            }

            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ... 
            $hinhanh = "images/" . basename($_FILES["filehinhanh"]["name"]);
            $duongdan = "../../" . $hinhanh;
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        //Thêm mặt hàng mới vào CSDL
        // $sp->suasanpham(
        //     $id,
        //     $danhmuc_id,
        //     $tensanpham,
        //     $mota,
        //     $giagoc,
        //     $giaban,
        //     $soluongton,
        //     $hinhanh,
        //     $luotxem,
        //     $luotmua
        // );
        $sanpham = $sp->laysanpham();
        include("main.php");
        break;

    default:
        break;
}
