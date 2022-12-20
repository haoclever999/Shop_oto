<?php include("view/top.php"); ?>
<br><br>
<div class="container">
    <div class="row">

        <h3>Các sản phẩm <?php echo $tendm; ?></h3>
        <?php
        if ($sanpham != null) {
            foreach ($sanpham as $sp) :
        ?>
        <div class="col-sm-3">
            <div class="panel panel-info text-center">
                <div class="panel-heading"><a href="?action=xemchitiet&id_sp=<?php echo $sp["id_sp"]; ?>">
                        <?php echo $sp["tensp"]; ?></a></div>
                <div class="panel-body">
                    <a href="?action=xemchitiet&id_sp=<?php echo $sp["id_sp"]; ?>">
                        <img src="images/<?php echo $sp["hinhanh"]; ?>" class="img-responsive" style="width:100%"
                            alt="<?php echo $sp["tensp"]; ?>"></a>
                </div>
                <div>Giá bán: <span class="text-danger"><?php echo number_format($sp["gia"], 0, ",", "."); ?>
                        đ</span> </div><br />
                <div class="panel-footer">
                    <a class="btn btn-info" href="?action=xemchitiet&id_sp=<?php echo $sp["id_sp"]; ?>">
                        Chi tiết</a>
                    <a class="btn btn-danger"
                        href="?action=chovaogio&txtid_sp=<?php echo $sp["id_sp"]; ?>&txtsoluong=1 ">Chọn
                        mua</a>
                </div>

            </div>
        </div>
        <?php
            endforeach;
        } else {
            echo "<p>Vui lòng xem danh mục khác...</p>";
        }
        ?>


    </div>

    <?php include("topview.php"); ?>
</div>
<?php include("view/bottom.php"); ?>