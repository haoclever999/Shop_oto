<div class="row">
    <!-- Hàng nổi bật -->
    <h3>Sản phẩm nổi bật</h3>
    <?php
    foreach ($sanphamnoibat as $s) :
    ?>
    <div class="col-sm-3">
        <div class="panel panel-danger text-center">
            <div class="panel-heading">
                <strong>
                    <a class="panel-title" href="?action=xemnhom&id_dm=<?php echo $s["id_dm"]; ?>">
                        <?php echo $s["tendm"]; ?>
                </strong>
                </a>
            </div>
            <div class="panel-body">
                <a href="?action=xemchitiet&id_sp=<?php echo $s["id_sp"]; ?>"><img
                        src="images/<?php echo $s["hinhanh"]; ?>" class="img-responsive" style="width:100%"
                        alt="<?php echo $s["tensp"]; ?>"></a>

            </div>
            <div class=" panel-body-2">
                <a href="?action=xemchitiet&id_sp=<?php echo $s["id_sp"]; ?>"
                    class="tensp-topview"><?php echo $s["tensp"]; ?></a>
            </div>
            <div class="panel-footer">
                <a class="btn btn-success" href="?action=xemchitiet&id_sp=<?php echo $s["id_sp"]; ?>">Chi tiết</a>
                <a class="btn btn-danger" href="?action=chovaogio&txtid_sp=<?php echo $s["id_sp"]; ?>&txtsoluong=1">Chọn
                    mua</a>

            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>