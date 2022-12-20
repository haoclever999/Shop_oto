<?php include("../view/top.php"); ?>
<!-- cập nhật hồ sơ -->
<div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Hồ sơ cá nhân</h3>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="capnhatnguoidung">
                    <div class="text-center">
                        <img class="img-circle"
                            src="../../images/avartar/<?php echo $_SESSION["nguoidung"]["hinhanh"]; ?>"
                            alt="<?php echo $_SESSION["nguoidung"]["tennd"]; ?>" width="150px" height="150px">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="txtemail" placeholder="Email"
                            value="<?php echo $_SESSION["nguoidung"]["email"]; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" type="number" name="txtdienthoai" placeholder="Email"
                            value="<?php echo $_SESSION["nguoidung"]["sodienthoai"]; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" type="text" name="txthoten" placeholder="Họ tên"
                            value="<?php echo $_SESSION["nguoidung"]["hoten"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="txthinhanh" value="<?php echo $_SESSION["nguoidung"]["hinhanh"]; ?>">
                        <input type="checkbox" id="chkdoianh" name="chkdoianh" value="1"> Đổi ảnh đại
                        diện<br>
                    </div>
                    <div id="file" class="form-group">
                        <input type="file" name="fhinh">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="txtid" value="<?php echo $_SESSION["nguoidung"]["id"]; ?>">
                        <input type="hidden" name="action" value="capnhat">
                        <input class="btn btn-primary" type="submit" value="Lưu">
                        <input class="btn btn-warning" type="reset" value="Hủy">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#file").hide();
    $("#chkdoianh").click(function() {
        $("#file").toggle(500);
    });
});
</script>
<?php include("../view/top.php"); ?>