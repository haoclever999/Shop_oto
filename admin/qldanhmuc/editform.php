<?php include("../view/top.php"); ?>
<div>
    <h2>Cập nhật danh mục</h2><br>
    <form method="post" action="index.php" style="width: 50%;" enctype="multipart/form-data">
        <input type="hidden" name="action" value="capnhat">
        <input type="hidden" name="id_dm" value="<?php echo $dmuc["id_dm"]; ?>">

        <div class="form-group">
            <label>Tên danh mục</label>
            <input class="form-control" type="text" name="txttendm" value="<?php echo $dmuc["tendm"]; ?>">
        </div>

        <div class="form-group">
            <label>Logo</label><br>
            <input type="hidden" name="txthinhcu" value="<?php echo $dmuc["logo"]; ?>">
            <img src="../../images/Logo/<?php echo $dmuc["logo"]; ?>" width="200" height="200"
                class="img-thumbnail"><br />
            <input type="checkbox" id="chkdoilogo" name="chkdoilogo" value="1">
            <label for="chkdoilogo" style="font-weight: normal;">Đổi logo</label> <br>
        </div>
        <div id="file" class="form-group">
            <input type="file" class="form-control" name="filelogo">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Cập nhật">
            <input class="btn btn-warning" type="reset" value="Hủy">
        </div>
    </form>
</div>
<script>
const chkdoilogo = document.querySelector('#chkdoilogo')
const showfile = document.querySelector('#file')

window.onload = function() {
    showfile.style.display = 'none'
};

chkdoilogo.addEventListener('click', () => {
    if (showfile.style.display !== 'block')
        showfile.style.display = 'block'
    else
        showfile.style.display = 'none'
})
</script>
<?php include("../view/bottom.php"); ?>