<?php include("view/top.php"); ?>
<br><br>
<div class="container">
    <div class="row">
        <!-- Tất cả mặt hàng - Xử lý phân trang -->
        <a name="sptatca"></a>
        <h3>Tất cả sản phẩm </h3>
        <?php
        foreach ($sanpham as $sp) {

        ?>
        <div class="col-sm-3 sanpham">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <a href="?action=xemnhom&id_dm=<?php echo $sp["id_dm"]; ?>"
                        style="color:white;font-weight:bold;"><?php echo $sp["tendm"]; ?></a>
                </div>
                <div class="panel-body">
                    <a href="?action=xemchitiet&id_sp=<?php echo $sp["id_sp"]; ?>">
                        <img src="images/<?php echo $sp["hinhanh"]; ?>" class="img-responsive" style="width:100%"
                            alt="<?php echo $sp["tensp"]; ?>">
                    </a>
                </div>
                <div class="panel-footer">
                    <a href="?action=xemchitiet&id_sp=<?php echo $sp["id_sp"]; ?>"><?php echo $sp["tensp"]; ?>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="row">
        <ul class="pagination">
            <li><a href="?trang=1"><span class="glyphicon glyphicon-step-backward"></span></a></li>
            <?php if ($tranghh > 1 && $tongsotrang > 1) ?>
            <li><a href="?trang=<?php echo $tranghh - 1 ?>"><span class="glyphicon glyphicon-chevron-left"></span></a>
            </li>
            <?php
            // Xuất các số trang
            for ($i = 1; $i <= $tongsotrang; $i++) {
                if ($i == $tranghh) { //Trang hien tai
            ?>
            <li class="active"><span><?php echo $i; ?></span></li>
            <?php } else { ?>
            <li><a href="?trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php }
            }
            if ($tranghh < $tongsotrang && $tongsotrang > 1)
            ?>
            <li><a href="?trang=<?php echo $tranghh + 1; ?>"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </li>
            <li><a href="?trang=<?php echo $tongsotrang; ?>"><span class="glyphicon glyphicon-step-forward"></span></a>
            </li>
        </ul>
    </div>
    <?php include("topview.php"); ?>
</div> 
<?php include("view/bottom.php"); ?>