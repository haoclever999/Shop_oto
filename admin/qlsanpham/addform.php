<?php include("../view/top.php"); ?>
<div>
    <h3>Thêm sản phẩm</h3>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="xulythem">
        <div class="form-group">
            <label>Hãng xe</label>
            <select class="form-control" name="optdanhmuc">
                <?php foreach ($danhmuc as $dm) { ?>
                <option value="<?php echo $dm["id_dm"]; ?>"><?php echo $dm["tendm"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tên hàng</label>
            <input class="form-control" type="text" name="txttensp" required>
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control" name="txtmota" required></textarea>
        </div>
        <div class="form-group">
            <label>Giá bán</label>
            <input class="form-control" type="number" name="txtgia" required>
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input class="form-control" type="number" name="txtsoluong" required>
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" class="form-control" name="filehinhanh" required>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Lưu">
            <input class="btn btn-warning" type="reset" value="Hủy">
        </div>
    </form>

</div>
<?php include("../view/bottom.php"); ?>