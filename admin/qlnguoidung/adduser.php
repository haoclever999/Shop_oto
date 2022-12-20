<?php include("../view/top.php"); ?>
<div>
    <h3>Thêm người dùng</h3>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="xulythem">
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="email" name="txtemail" required>
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input class="form-control" type="password" name="txtmatkhau" required>
        </div>
        <div class="form-group">
            <label>Nhập lại mật khẩu</label>
            <input class="form-control" type="password" name="txtnhaplaimatkhau" required>
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input class="form-control" type="number" name="txtsodienthoai" required>
        </div>
        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" class="form-control" name="txthoten" required>
        </div>
        <div class="form-group">
            <label>Loại người dùng</label>
            <select class="form-control" name="optdanhmuc">
                <option value="1">Quản trị</option>
                <option value="2">Nhân viên</option>
                <option value="3">Khách hàng</option>
            </select>
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" class="form-control" name="filehinhanh" required>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Đăng ký">
            <input class="btn btn-warning" type="reset" value="Hủy">
        </div>
    </form>
</div>
<script>
// if (!phoneNumber.value.match(/^[0][0-9]{9}$/)) {
//         alert("Số điện thoại phải dài 10 ký tự và chữ số đầu tiên không được là 0!");
//         phoneNumber.focus();
//         return false;
//     }
</script>
<?php include("../view/bottom.php"); ?>