<?php
if (!isset($_SESSION["nguoidung"]))
    header("Location:../index.php");
require("../../model/database.php");
require("../../model/danhmuc.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "xem";
}

$dm = new DANHMUC();
$masua = 0;

switch ($action) {
    case "xem":
        $danhmuc = $dm->laydanhmuc();
        include("main.php");
        break;

    case "them":
        // upload ảnh lên server
        $hinhanh = basename($_FILES["filelogo"]["name"]);
        $duongdan = "../../images/Logo/" . $hinhanh;
        move_uploaded_file($_FILES["filelogo"]["tmp_name"], $duongdan);

        $dm->themdanhmuc($_POST["txttendm"], $hinhanh);

        $danhmuc = $dm->laydanhmuc();
        include("main.php");
        break;

    case "xoa":
        if (isset($_GET["id_dm"])) {
            $dm->xoadanhmuc($_GET["id_dm"]);
        }
        $danhmuc = $dm->laydanhmuc();
        include("main.php");
        break;

    case "sua":
        if (isset($_GET["id_dm"])) {
            $dmuc = $dm->laydanhmuctheoid($_GET["id_dm"]);
            include("editform.php");
        } else {
            $danhmuc = $dm->laydanhmuc();
            include("main.php");
        }
        break;

    case "capnhat":
        $id_dm = $_POST["id_dm"];
        $tendm = $_POST["txttendm"];
        $logo = $_POST["txthinhcu"];
        if ($_FILES["filelogo"]["name"] != "") {

            //Xóa hình cũ khi cập nhật
            $logo_cu = " images/Logo/" . $logo;
            if (file_exists($logo_cu)) {
                unlink($logo_cu);
            }

            $logo = basename($_FILES["filelogo"]["name"]);
            $duongdan = "../../images/Logo/" . $logo;
            move_uploaded_file($_FILES["filelogo"]["tmp_name"], $duongdan);
        }
        $dm->suadanhmuc($id_dm, $tendm, $logo);

        $danhmuc = $dm->laydanhmuc();
        include("main.php");
        break;

    default:
        break;
}