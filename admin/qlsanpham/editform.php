<?php include("../view/top.php"); ?>
<div>
    <h3>Cập nhật sản phẩm</h3>
    <form method="post" action="index.php" enctype="multipart/form-data">
        <input type="hidden" name="action" value="capnhat">
        <input type="hidden" name="txtid_sp" value="<?php echo $s["id_sp"]; ?>">
        <div class="form-group">
            <label>Hãng xe</label>
            <select class="form-control" name="optdanhmuc">
                <?php foreach ($danhmuc as $dm) { ?>
                <option value="<?php echo $dm["id+dm"]; ?>" <?php if ($dm["id_dm"] == $s["id_dm"]) echo "selected"; ?>>
                    <?php echo $dm["tendm"]; ?> </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input class="form-control" type="text" name="txttensp" value="<?php echo $s["tensp"]; ?>">
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control" name="txtmota"><?php echo $s["mota"]; ?></textarea>
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input class="form-control" type="number" name="txtgia" value="<?php echo $s["gia"]; ?>" required>
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input class="form-control" type="number" name="soluong" value="<?php echo $s["soluong"]; ?>">
        </div>
        <div class="form-group">
            <label>Đã bán</label>
            <input class="form-control" type="number" name="txtdaban" value="<?php echo $s["daban"]; ?>" required>
        </div>
        <div class="form-group">
            <label>Tồn kho</label>
            <input class="form-control" type="number" name="txttonkho" value="<?php echo $s["tonkho"]; ?>" required>
        </div>
        <div class="form-group">
            <label>Ngày cập nhật</label>
            <input class="form-control" type="number" name="txtngaycapnhat" value="<?php echo $s["ngaycapnhat"]; ?>"
                required>
        </div>
        <div class="form-group">
            <label>Lượt xem</label>
            <input class="form-control" type="number" name="txtluotxem" value="<?php echo $s["luotxem"]; ?>" required>
        </div>
        <div class="form-group">
            <label>Hình ảnh</label><br>
            <input type="hidden" name="txthinhcu" value="<?php echo $s["hinhanh"]; ?>">
            <img src="../../<?php echo $s["hinhanh"]; ?>" width="200" height="200" class="img-thumbnail"><br />
            <input type="checkbox" id="chkdoianh" name="chkdoianh" value="1"> Đổi ảnh<br>
        </div>
        <div id="file" class="form-group">
            <input type="file" class="form-control" name="filehinhanh">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Cập nhật">
            <input class="btn btn-warning" type="reset" value="Hủy">
        </div>
    </form>
</div>

<!-- JQuery: hiển thị/tắt phần tử chọn file hình ảnh -->
<script>
$(document).ready(function() {
    $("#file").hide();
    $("#chkdoianh").click(function() {
        $("#file").toggle(500);
    });
});
</script>
<?php include("../view/bottom.php"); ?>