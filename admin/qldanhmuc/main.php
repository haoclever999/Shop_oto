<?php include("../view/top.php"); ?>

<h3>Quản lý danh mục</h3>
<br>
<div id="buttonthem">
    <a class="btn btn-info">Thêm danh mục</a> <br>&nbsp;
</div>
<div id="formthem">
    <form method="POST" style="width:50%;margin-left: 25px;" enctype="multipart/form-data">
        <input type="hidden" name="action" value="them">
        <div class="form-group">
            <label for="txttendm">Tên danh mục</label>
            <input id="txttendm" type="text" name="txttendm" placeholder="Nhập tên danh mục" class="form-control">
        </div>

        <div class="form-group">
            <label for="logo">Logo</label><br>
            <input id="logo" type="file" class="form-control" name="filelogo">
        </div>

        <div>
            <input type="submit" value="Lưu" class="btn btn-primary">
        </div>

    </form>
</div>

<table class="table table-hover">
    <tr>
        <th>Tên danh mục</th>
        <th>Logo</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    <?php
    foreach ($danhmuc as $dm) {
    ?>
    <tr>
        <td><?php echo $dm["tendm"]; ?></td>
        <td><img src="../../images/Logo/<?php echo $dm["logo"]; ?>" style="border: none; width:100px"
                class="img-thumbnail"></td>
        <td><a href="index.php?action=sua&id_dm=<?php echo $dm["id_dm"]; ?>">Sửa</a></td>
        <td><a href="index.php?action=xoa&id_dm=<?php echo $dm["id_dm"]; ?>">Xóa</a></td>
    </tr>
    <?php
    } ?>
</table>
<br>

<script type="text/javascript">
const showformthem = document.querySelector('#formthem')
const showbtnthem = document.querySelector("#buttonthem")

window.onload = function() {
    showformthem.style.display = 'none'
};

showbtnthem.addEventListener('click', () => {
    if (showformthem.style.display !== 'block')
        showformthem.style.display = 'block'
    else
        showformthem.style.display = 'none'
})
</script>
<?php include("../view/bottom.php"); ?>