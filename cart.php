<?php include("view/top.php"); ?>
<br><br><br>
<div class="container">
    <div class="row" style="height: 500px;">
        <h3>Giỏ hàng của bạn</h3>
        <?php
        if (demsanphamtronggio() == 0) {
            echo "<p>Không có sản phẩm nào trong giỏ hàng.</p>";
        } else {
        ?>
        <form method="POST">
            <input type="hidden" name="action" value="capnhatgiohang">
            <table class="table table-hover">
                <tr class="info">
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <!-- <th>Khuyến mãi</th> -->
                    <th>Thành tiền</th>
                </tr>
                <?php
                    foreach ($giohang as $idsanpham => $idsp) {
                    ?>
                <tr>
                    <!-- <td>< ?php echo $idsp["id_sp"]; ?></td> -->
                    <td><?php echo $idsp["tensp"]; ?></td>
                    <td><?php echo number_format($idsp["gia"], 0, ",", ".") . " đ"; ?></td>
                    <td><input type="number" size="3" name="idsp[<?php echo $idsanpham; ?>]"
                            value="<?php echo $idsp["soluongmua"]; ?>"></td>
                    <!-- <td>< ?php echo $idsp["khuyenmai"]; ?></td> -->
                    <td><?php echo number_format($idsp["sotien"], 0, ",", ".") . " đ"; ?></td>
                    <?php } ?>
                <tr>
                    <td colspan="3" align="right"><b>Tổng tiền</b></td>
                    <td><b><?php echo number_format(tinhtiengiohang(), 0, ",", "."); ?> đ</b></td>
                </tr>
                <tr>
                    <td colspan="2" align="left"><i>Để xóa một sản phẩm nhập số lượng = 0</i> | <a
                            href="?action=xoagiohang">Xóa tất cả</a></td>
                    <td colspan="2" align="right">
                        <input class="btn btn-info" type="submit" value="cập nhật">
                        <a href="index.php?action=datmua" class="btn btn-danger">Thanh toán</a>
                    </td>
                </tr>
            </table>
        </form>
        <?php } ?>
    </div>
</div>

<?php include("view/bottom.php"); ?>