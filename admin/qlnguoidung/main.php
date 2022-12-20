<?php include("../view/top.php"); ?>
<h3>Quản lý người dùng</h3>
<a href="index.php?action=them" class="btn btn-info">Thêm người dùng</a>
<br /><br />
<table class="table table-hover">
    <tr>
        <th>Email</th>
        <th>Tên</th>
        <th>Phân quyền</th>
        <th>Trạng thái</th>
        <th>Khóa</th>
        <th>Nâng cấp quyền</th>
    </tr>
    <?php foreach ($nguoidung as $nd) { ?>
    <tr>
        <td><?php echo $nd["email"]; ?></td>
        <td><?php echo $nd["hoten"]; ?></td>
        <td>
            <?php
                if ($nd["loai"] == 1) echo "Quản trị";
                elseif ($nd["loai"] == 2) echo "Nhân viên";
                else echo "Khách hàng";
                ?>
        </td>
        <td>
            <?php if ($nd["loai"] != 1) {
                    if ($nd["trangthai"] == 1) echo "Kích hoạt";
                    else echo "Khóa";
                }
                ?>
        </td>
        <td>
            <?php
                if ($nd["loai"] != 1) {
                    if ($nd["trangthai"] == 1) {
                ?>
            <a href="?action=khoa&trangthai=0&id=<?php echo $nd["id"]; ?>">Khóa</a>
        </td>
        <?php
                    } else {
        ?>
        <a href="?action=khoa&trangthai=1&id=<?php echo $nd["id"]; ?>">Kích hoạt</a></td>
        <?php }
                } ?>
        <td><a href="index.php?action=nangcap&id=<?php echo $nd["id"]; ?>" class="btn btn-warning">Nâng cấp</a></td>
    </tr>
    <?php  } ?>
</table>

<?php include("../view/bottom.php"); ?>