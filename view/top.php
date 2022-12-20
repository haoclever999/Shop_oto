<!DOCTYPE html>
<html lang="en">

<head>
    <title>NHCAR - Cửa hàng ô tô cũ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="nhcar">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="nav-logo" href="index.php"><img src="images/Logo/Logo.png"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#"> Danh mục sản phẩm</a>

                        <ul class="dropdown-menu">
                            <?php foreach ($danhmuc as $dm) { ?>
                            <li>
                                <a href="?action=xemnhom&id_dm=<?php echo $dm["id_dm"]; ?>">
                                    <img
                                        src="images/Logo/<?php echo $dm["logo"]; ?>">&nbsp;&nbsp;&nbsp;<?php echo $dm["tendm"]; ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li><a href="#">Liên hệ</a></li>
                    <li>
                        <form role="form" id="f-search" action="search">
                            <input type="text" name="txtsearch" id="txtsearch" placeholder="Tìm kiếm...">
                            <button type="submit" id="btnsearch"><img src="images/Icon/search.png"></button>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (!isset($_SESSION["nguoidung"])) { ?>
                    <li>
                        <a href="admin/ktnguoidung/index.php">
                            <img src="images/Icon/user.png"> Đăng nhập
                        </a>
                    </li>
                    <?php } else { ?>
                    <li>
                        <a href="#"> <img src="images/avartar/<?php echo $_SESSION["nguoidung"]["hinhanh"]; ?>"
                                style="vertical-align: middle; width: 25px; height: 25px; border-radius: 50%;">
                            <?php echo $_SESSION["nguoidung"]["tennd"]; ?>
                        </a>
                        <ul class="dropdown-menu" style="left:0">
                            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Thông báo</a></li>
                            <li><a href="../admin/qlnguoidung/edituser.php"><span
                                        class="glyphicon glyphicon-edit"></span> Hồ
                                    sơ cá nhân</a></li>
                            <li><a href="../admin/qlnguoidung/doimatkhau.php"><span
                                        class="glyphicon glyphicon-wrench"></span>
                                    Đổi mật khẩu</a></li>
                            <li class="divider"></li>
                            <li><a href="../ktnguoidung/index.php?action=dangxuat"><span
                                        class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="index.php?action=xemgiohang" class="text-warning">
                            <img src="images/Icon/shopping-cart.png"> Giỏ hàng
                            <span class="sptronggio">
                                <?php
                                echo demsanphamtronggio();
                                ?>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>