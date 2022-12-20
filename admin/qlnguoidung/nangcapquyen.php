<?php include("../view/top.php"); ?>
<div>
    <h3>Nâng cấp quyền</h3>
    <form method="post" action="index.php">
        <input type="hidden" name="action" value="nangcapquyen">
        <input type="hidden" name="txtid" value="<?php echo $ndung["id"]; ?>">
        <div class="form-group">
            <label>Họ tên</label>
            <input class="form-control" type="text" name="txthoten" placeholder="Họ tên"
                value="<?php echo $ndung["hoten"]; ?>" disabled>
        </div>
        <div>
            <label>Quyền</label>
            <select class="form-control" name="optquyen">
                <option value="1" <?php if ($ndung["loai"] == 1) echo "selected"; ?>>
                    Quản trị </option>
                <option value="2" <?php if ($ndung["loai"] == 2) echo "selected"; ?>>
                    Nhân viên </option>
                <option value="3" <?php if ($ndung["loai"] == 3) echo "selected"; ?>>
                    Khách hàng</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Lưu">
            <input class="btn btn-warning" type="reset" value="Hủy">
        </div>
    </form>
</div>
<?php include("../view/bottom.php"); ?>