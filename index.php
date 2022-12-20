<?php
require("model/database.php");
require("model/danhmuc.php");
require("model/sanpham.php");
require("model/giohang.php");
require("model/nguoidung.php");
require("model/diachi.php");
require("model/hoadon.php");
require("model/hoadonchitiet.php");

$dm = new DANHMUC();
$sp = new SANPHAM();
$nd = new NGUOIDUNG();
$danhmuc = $dm->laydanhmuc();

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "macdinh";
}

$sanphamnoibat = $sp->laysanphamnoibat();

switch ($action) {
    case "macdinh":
        //Các biến xử lý phân trang
        $tongsp = $sp->demtongsosanpham();          //tổng số mặt hàng
        $soluong = 8;                               //Số lượng mặt hàng hiển trị trên trang
        $tongsotrang = ceil($tongsp / $soluong);    //Tổng số trang
        if (!isset($_REQUEST["trang"]))             //Trang hiện hành: mặc định là trang đầu
            $tranghh = 1;
        else                                        //Hoặc hiển thị số trang do người dùng chọn
            $tranghh = $_REQUEST["trang"];
        if ($tranghh > $tongsotrang)
            $tranghh = $tongsotrang;
        else if ($tranghh < 1)
            $tranghh = 1;
        $batdau = ($tranghh - 1) * $soluong;        //mặt hàng bắt đầu sẽ lấy
        $sanpham = $sp->laysanphamphantrang($batdau, $soluong);
        include("main.php");
        break;
    case "xemnhom":
        if (isset($_REQUEST["id_dm"])) {
            $id_dm = $_REQUEST["id_dm"];
            $dmuc = $dm->laydanhmuctheoid($id_dm);
            $tendm =  $dmuc["tendm"];
            $sanpham = $sp->laysanphamtheodanhmuc($id_dm);
            include("group.php");
        } else {
            include("main.php");
        }
        break;
    case "xemchitiet":
        if (isset($_GET["id_sp"])) {
            $id_sp = $_GET["id_sp"];
            // tăng lượt xem lên 1
            $sp->tangluotxem($id_sp);
            // lấy thông tin chi tiết sản phẩm
            $spct = $sp->laysanphamtheoid($id_sp);
            // lấy các sản phẩm cùng danh mục
            $id_dm = $spct["id_dm"];
            $sanpham = $sp->laysanphamtheodanhmuc($id_dm);
            include("detail.php");
        }
        break;
    case "chovaogio":
        if (isset($_REQUEST["txtid_sp"]))
            $id_sp = $_REQUEST["txtid_sp"];
        if (isset($_REQUEST["txtsoluong"]))
            $soluong = $_REQUEST["txtsoluong"];
        if (isset($_SESSION['giohang'][$id_sp])) { // nếu đã có trong giỏ thi tăng số lượng
            $soluong += $_SESSION['giohang'][$id_sp];
            $_SESSION['giohang'][$id_sp] = $soluong;
        } else {       // nếu chưa thì thêm vào giỏ
            themsanphamvaogio($id_sp, $soluong);
        }

        $giohang = laygiohang();
        include("cart.php");
        break;
    case "xemgiohang":
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "capnhatgiohang":
        if (isset($_REQUEST["idsp"])) {
            $idsp = $_REQUEST["idsp"];

            foreach ($idsp as $idsanpham => $soluong) {
                if ($soluong > 0)
                    capnhatsoluong($idsanpham, $soluong);
                else
                    xoamotsanpham($idsanpham);
            }
        }
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "xoagiohang":
        xoagiohang();
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "datmua":
        $giohang = laygiohang();
        include("checkout.php");
        break;
    case "luuhoadon":
        $email = $_POST["txtemail"];
        $hoten = $_POST["txthoten"];
        $sodienthoai = $_POST["txtsodienthoai"];
        $diachi = $_POST["txtdiachi"];

        // lưu thông tin khách nếu chưa có trong db (kiểm tra email có tồn tại chưa)
        // xử lý thêm...

        // lưu địa chỉ khách
        $dc = new DIACHI();
        $diachi_id = $dc->themdiachi($khachhang_id, $diachi);

        // lưu đơn hàng
        $dh = new HOADON();
        $tongtien = tinhtiengiohang();
        $hoadon_id = $dh->themhoadon($khachhang_id, $diachi_id, $tongtien);

        // lưu chi tiết đơn hàng
        $ct = new HOADONCT();
        $giohang = laygiohang();
        foreach ($giohang as $mahang => $mh) {
            $dongia = $mh["giaban"];
            $soluong = $mh["soluong"];
            $thanhtien = $mh["sotien"];
            $ct->themchitiethoadon($hoadon_id, $mahang, $dongia, $soluong, $thanhtien);
            $mh = new SANPHAM();
            $mh->capnhatsoluong($mahang, $soluong);
        }

        // xóa giỏ hàng
        xoagiohang();
        // chuyển đến trang cảm ơn
        include("message.php");
        break;
    case "dangnhap":
        include("admin/ktnguoidung/loginform.php");
        break;
    case "xldangnhap":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        if ($nd->kiemtranguoidungkhachhang($email, $matkhau) == TRUE) {
            $_SESSION["khachhang"] = $nd->laythongtinkhachhang($email);
            // đọc thông tin (đơn hàng) của kh
            include("info.php");
        } else {
            $tb = "Đăng nhập không thành công!";
            include("loginform.php");
        }
        break;
    case "xemthongtin":
        // đọc thông tin
        include("info.php"); // trang info.php hiển thị các đơn đã đặt
        break;
    case "dangxuat":
        unset($_SESSION["khachhang"]);
        // chuyển về trang chủ
        // xử lý phân trang
        $tongsp = $sp->demtongsosanpham();   // tổng số mặt hàng
        $soluong = 4;                           // số lượng mh hiển thị trên trang 
        $tongsotrang = ceil($tongsp / $soluong);  // tổng số trang
        if (!isset($_REQUEST["trang"]))          // trang hiện hành: mặc định là trang đầu
            $tranghh = 1;
        else                                    // hoặc hiển thị trang do người dùng chọn
            $tranghh = $_REQUEST["trang"];
        if ($tranghh > $tongsotrang)
            $tranghh = $tongsotrang;
        else if ($tranghh < 1)
            $tranghh = 1;
        $batdau = ($tranghh - 1) * $soluong;          // mặt hàng bắt đầu sẽ lấy
        $sanpham = $sp->laysanphamphantrang($batdau, $soluong);
        include("main.php");
        break;
    default:
        break;
}
