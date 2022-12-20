<!DOCTYPE html>
<html>

<head>
    <title>NHCAR - Cửa hàng ô tô cũ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/oldcar.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>

<body class="f-resgis-login">
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 flogin" id="flogin">
                <form method="POST" action="index.php">
                    <h2 class="text-flogin">ĐĂNG NHẬP</h2><br>
                    <?php if (isset($tb) && $tb != "") {
                        echo "<p style='color:#ff2c2c'>$tb</p>";
                    } ?>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" require><br>
                    <input type="password" class="form-control" id="matkhau" name="matkhau" placeholder="Mật khẩu"
                        require> <br>
                    <input type="hidden" name="action" value="xldangnhap">
                    <input type="checkbox" id="showpass" onclick="showPassLogin()">
                    <label for="showpass">Hiện mật khẩu</label><br /><br />
                    <input type="submit" class="btn-flogin" value="Đăng nhập"><br>
                    <a href="#">Quên mật khẩu</a>
                    <a onclick="showFormRegister();">Đăng ký</a>
                </form>
            </div>

            <div class="col-sm-4 f-register" id="f-register" style="display:none">
                <form method="POST" action="index.php">
                    <h2 class="register">ĐĂNG KÝ</h2>
                    <div>
                        <p id="messError" style="color:red"></p>
                    </div>
                    <div class="form-group">
                        <label for="txttennd">Tên người dùng:</label>
                        <input class="form-control" type="text" name="txttennd" id="txttennd"
                            placeholder="Tên người dùng" onblur="checkTenND()" require>
                    </div>
                    <div class="form-group">
                        <label for="txtemail">Email:</label>
                        <input type="text" class="form-control" name="txtemail" id="txtemail" placeholder="Email"
                            onblur="checkEmail()" require>
                    </div>
                    <div class="form-group">
                        <label for="txtmatkhau">Mật khẩu:</label>
                        <input type="password" class="form-control" name="txtmatkhau" id="txtmatkhau"
                            placeholder="Mật khẩu" onblur="checkMatKhau()" require>
                    </div>
                    <div class="form-group">
                        <label for="txtnhaplaimatkhau">Nhập lại mật khẩu:</label>
                        <input type="password" class="form-control" name="txtnhaplaimatkhau" id="txtnhaplaimatkhau"
                            placeholder="Nhập lại mật khẩu" onblur="checkNhapLaiMatKhau()" require>
                    </div>
                    <div class="form-group">
                        <label for="txtdienthoai">Điện thoại:</label>
                        <input type="text" class="form-control" name="txtdienthoai" id="txtdienthoai"
                            placeholder="Mật khẩu" onblur="checkMatKhau()" require>
                    </div>
                    <div class="form-group">
                        <label for="txtnhaplaimatkhau">Giới tính:</label>
                        <select class="form-control" name="optgioitinh">
                            <option value="1" selected>Nam</option>
                            <option value="2">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="showpass" onclick="showPass()">
                        <label for="showpass">Hiện mật khẩu</label>
                    </div>
                    <input type="submit" class="btn-f-register" value="Đăng ký"><br>
                    <input type="hidden" name="action" value="xldangky">
                    <p class="register">Already have an account? <a href="loginform.php"><b>Đăng nhập</b></a></p>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

</body>

</html>