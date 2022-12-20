<?php
// Tạo mảng SESSION giohang rỗng nếu nó không tồn tại
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = array();
}

// Hàm thêm sản phẩm vào giỏ
function themsanphamvaogio($id_sp, $soluong)
{
    //Tạo thể hiện của lớp SANPHAM
    $sp_db = new SANPHAM();
    //Cập nhập Số lượng vào SESSION - Làm tròn
    $_SESSION['giohang'][$id_sp] = round($soluong, 0);
    //Lấy thông tin của sản phẩm dựa vào $id_sp
    $sp = $sp_db->laysanphamtheoid($id_sp);
    //Cập nhật thông tin của Mã danh mục và Tên danh mục vào mảng SESSION
    // $_SESSION['id_dm_cuoi'] = $sp['id_dm'];
    // $_SESSION['tendm_cuoi'] = $sp['tendm'];
}

// Cập nhật số lượng của giỏ hàng
function capnhatsoluong($id_sp, $soluong)
{
    if (isset($_SESSION['giohang'][$id_sp])) {
        $_SESSION['giohang'][$id_sp] = round($soluong, 0);
    }
}

// Xóa một sản phẩm trong giỏ hàng
function xoamotsanpham($id_sp)
{
    if (isset($_SESSION['giohang'][$id_sp])) {
        unset($_SESSION['giohang'][$id_sp]);
    }
}

// Hàm lấy mảng các sản phẩm trong giohang
function laygiohang()
{
    //Tạo mảng rỗng để lưu danh sách sản phẩm trong giỏ
    $sp = array();
    $sp_db = new SANPHAM();

    //Duyệt mảng SESSION giohang và lấy từng id sản phẩm cùng số lượng
    foreach ($_SESSION['giohang'] as $id_sp => $soluongmua) {
        // Gọi hàm lấy thông tin của sản phẩm theo mã sản phẩm
        $s = $sp_db->laysanphamtheoid($id_sp);
        $gia = $s['gia'];
        $solg = intval($soluongmua); //chuyển chuỗi sang số
        // Tính tiền
        $sotien = round($gia * $soluongmua); //mặc định làm tròn 0 số thập phân

        // Lưu thông tin trong mảng items để hiển thị lên giỏ hàng
        $sp[$id_sp]['id_sp'] = $s['id_sp'];
        $sp[$id_sp]['tensp'] = $s['tensp'];
        $sp[$id_sp]['hinhanh'] = $s['hinhanh'];
        $sp[$id_sp]['soluongmua'] = $solg;
        $sp[$id_sp]['gia'] = $gia;
        $sp[$id_sp]['sotien'] = $sotien;
    }
    return $sp;
}

// Đếm số sản phẩm trong giỏ hàng
function demsanphamtronggio()
{
    return count($_SESSION['giohang']);
}

// Đếm tổng số lượng các sản phẩm trong giỏ
function demsoluongtronggio()
{
    $tongsl = 0;
    //Lấy mảng các sản phẩm từ trong SESSION
    $giohang = laygiohang();
    foreach ($giohang as $item) {
        $tongsl += $item['soluongmua'];
    }
    return $tongsl;
}

// Tính tổng thành tiền trong giỏ hàng
function tinhtiengiohang()
{
    $tong = 0;
    $giohang = laygiohang();
    foreach ($giohang as $sp) {
        $tong += $sp['gia'] * $sp['soluongmua'];
    }
    return $tong;
}

// Xóa tất cả giỏ hàng
function xoagiohang()
{
    $_SESSION['giohang'] = array();
}