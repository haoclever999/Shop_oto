<?php include("view/top.php"); ?>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <h2 class="text-primary"><?php echo $spct["tensp"]; ?></h2>
            <div><img src="images/<?php echo $spct["hinhanh"]; ?>" width="50%"></div>
            <h3 class="text-primary">Giá bán:
                <span class="text-danger"><?php echo number_format($spct["gia"], 0, ",", "."); ?> đ</span>
            </h3><br>
            <div>
                <p class="motasp"><?php echo $spct["mota"]; ?></p>
            </div>
            <br>
            <div>
                <form class="form-inline" method="POST">
                    <input type="hidden" name="action" value="chovaogio">
                    <input type="hidden" name="txtid_sp" value="<?php echo $spct["id_sp"] ?>">
                    <input type="number" class="form-control" name="txtsoluong" value="1" require>
                    <input type="submit" class="btn btn-info" value="Chọn mua">
                </form>
                <br />
            </div>
        </div>
        <div class="col-sm-3">
            <h3>Sản phẩm cùng loại:</h3>
            <div style="height: 500px">
                <marquee behavior="scroll" direction="up" onmouseover="stop()" onmouseout="start()" height="100%">
                    <?php
                    foreach ($sanpham as $s) {
                        if ($s["id_sp"] != $spct["id_sp"]) {
                    ?>
                            <div>
                                <div class="panel panel-info text-center">
                                    <div class="panel-heading">
                                        <a href="?action=xemchitiet&id_sp=<?php echo $s["id_sp"]; ?>">
                                            <?php echo $s["tensp"]; ?>
                                        </a>
                                    </div>
                                    <div class="panel-body">
                                        <a href="?action=xemchitiet&id_sp=<?php echo $s["id_sp"]; ?>">
                                            <img src="images/<?php echo $s["hinhanh"]; ?>" class="img-responsive" style="width:100%"></a>
                                        <div>Giá bán: <span class="text-danger">
                                                <?php echo number_format($s["gia"], 0, ",", "."); ?>đ</span>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a class="btn btn-info" href="?action=xemchitiet&id_sp=<?php echo $s["id_sp"]; ?>">
                                            Chi tiết</a>
                                        <a class="btn btn-danger" href="?action=chovaogio&txtid_sp=<?php echo $s["id_sp"]; ?>&txtsoluong=1">Chọn
                                            mua</a>
                                    </div>

                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </marquee>
            </div>
        </div>
    </div>
</div>

<?php include("view/bottom.php"); ?>