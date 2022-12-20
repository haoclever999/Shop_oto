<!-- đổi mật khẩu -->
<div class="modal fade" id="fdoimatkhau" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Đổi mật khẩu</h3>
            </div>
            <div class="modal-body">
                <form method="post" action="index.php" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="capnhatmatkhau">
                    <input type="hidden" name="txtid" value="<?php echo $_SESSION["nguoidung"]["id"]; ?>">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="text" name="txtemail"
                            value="<?php echo $_SESSION["nguoidung"]["email"]; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu cũ</label>
                        <input type="password" class="form-control" name="txtmatkhaucu" require></input>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu mới</label>
                        <input type="password" class="form-control" name="txtmatkhaumoi" require></input>
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="txtnhaplaimatkhau" require></input>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Đổi mật khẩu">
                        <a href="index.php" class="btn btn-default">
                            <span class="glyphicon glyphicon-arrow-left"></span> Thoát
                        </a>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>