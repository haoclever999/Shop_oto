<!DOCTYPE html>
<html lang="en">

<head>
    <title>NHCAR - Trang quản trị</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/oldcar.js"></script>
</head>

<body>
    <!-- Menu mh nhỏ -->
    <nav class="navbar navbar-inverse visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="nav-logo" href="index.php"><img src="../../images/Logo/Logo.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Bảng điều khiển</a></li>
                    <li><a href="../qldanhmuc/index.php">Quản lý danh mục</a></li>
                    <li><a href="../qlsanpham/index.php">Quản lý sản phẩm</a></li>
                    <li><a href="#">Hóa đơn</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Menu mh nhỏ - kết thúc -->
    <div class="container-fluid">
        <div class="row content">
            <!-- Menu mh lớn -->
            <div class="col-sm-2 sidenav hidden-xs" id="sidenav-admin">
                <a class="nav-logo sidenav-logo" href="index.php">
                    <img src="../../images/Logo/Logo.png">
                </a>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#"><span class="glyphicon glyphicon-cog"></span> Bảng điều khiển</a>
                    </li>
                    <li><a href="../qldanhmuc/index.php">
                            <span class="glyphicon glyphicon-list-alt"></span> Quản lý danh mục</a> </li>
                    <li><a href="../qlsanpham/index.php">
                            <span class="glyphicon glyphicon-gift"></span> Quản lý sản phẩm</a> </li>
                    <li><a href="../qlhoadon/index.php">
                            <span class="glyphicon glyphicon-gift"></span> Quản lý hóa đơn</a> </li>
                    <?php if (isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["phanquyen"] == 0) { ?>
                    <li class="active"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Quản trị hệ
                            thống</a></li>
                    <li><a href="../qlnguoidung/"><span class="glyphicon glyphicon-list-alt"></span> Quản lý người
                            dùng</a></li>
                    <?php } ?>
                </ul><br>
            </div>
            <!-- Menu mh lớn - kết thúc -->
            <br>

            <div class="col-sm-10">
                <div class="container-fluid">
                    <div class="dropdown" id="dropdown-menu-info" style="text-align: right;">
                        <a onclick="dropMenuInfo('menu-info')" id="info">
                            <span> <img src="../../images/avartar/<?php echo $_SESSION["nguoidung"]["hinhanh"]; ?>"
                                    style="vertical-align: middle; width: 25px; height: 25px; border-radius: 50%;">
                            </span>
                            <?php if (isset($_SESSION["nguoidung"])) echo $_SESSION["nguoidung"]["tennd"]; ?>
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right" id="menu-info">
                            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Thông báo</a></li>
                            <li><a href="../qlnguoidung/edituser.php"><span class="glyphicon glyphicon-edit"></span> Hồ
                                    sơ cá nhân</a></li>
                            <li><a href="../qlnguoidung/doimatkhau.php"><span class="glyphicon glyphicon-wrench"></span>
                                    Đổi mật khẩu</a></li>
                            <li class="divider"></li>
                            <li><a href="../ktnguoidung/index.php?action=dangxuat"><span
                                        class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>