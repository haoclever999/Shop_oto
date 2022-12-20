<?php include("../view/top.php"); ?>

<h3>Quản lý sản phẩm</h3>
<br>
<a href="index.php?action=them" class="btn btn-info">Thêm sản phẩm</a>

<br />
<br />

<table class="table table-hover" id="table-sp">
    <tr>
        <th>Tên sản phẩm</th>
        <th>Danh mục</th>
        <th>Hình ảnh</th>
        <th>Mô tả</th>
        <th>Đã bán</th>
        <th>Tồn kho</th>
        <th>Giá</th>
        <th>Lượt xem</th>
        <th>Ngày cập nhật</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    <?php
    foreach ($sanpham as $sp) {
    ?>
        <tr>
            <td><?php echo $sp["tensp"]; ?></td>
            <?php foreach ($danhmuc as $dm)
                if ($sp["id_dm"] === $dm["id_dm"]) { ?> <td><?php echo $dm["tendm"];
                                                        } ?> </td>
                <td><img src="../../images/<?php echo $sp["hinhanh"]; ?>" width="100px"></td>
                <td class="motasp"><?php echo $sp["mota"]; ?></td>
                <td><?php echo $sp["daban"]; ?></td>
                <td><?php echo $sp["tonkho"]; ?></td>
                <td><?php echo number_format($sp["gia"], 0, ",", "."); ?> đồng</td>
                <td><?php echo $sp["luotxem"]; ?></td>
                <td><?php echo $sp["ngaycapnhat"]; ?></td>
                <td><a class="btn btn-warning" href="?action=sua&id_sp=<?php echo $sp["id_sp"]; ?>">Sửa</a></td>
                <td><a class="btn btn-danger" href="?action=xoa&id_sp=<?php echo $sp["id_sp"]; ?>">Xóa</a></td>
        </tr>
    <?php
    } ?>
</table>

<?php include("../view/bottom.php"); ?>