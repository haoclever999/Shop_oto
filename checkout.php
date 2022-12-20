<?php include("view/top.php"); ?>
<br><br><br>
<div class="container">
	<div class="row">
		<h3>Vui lòng nhập đầy đủ thông tin</h3>
		<div class="col-sm-6">
			<h4>Thông tin khách hàng</h4>
			<?php
			if (isset($_SESSION["khachhang"])) {
			?>
				<form method="post">
					<input type="hidden" name="txtid" value="<?php echo $_SESSION["khachhang"]["id_nd"]; ?>">
					<input type="hidden" name="action" value="luudonhang">
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="txtemail" value="<?php echo $_SESSION["khachhang"]["email"]; ?>" disabled>
					</div>
					<div class="form-group">
						<label>Họ tên</label>
						<input type="text" class="form-control" name="txttennd" value="<?php echo $_SESSION["khachhang"]["tennd"]; ?>" disabled>
					</div>
					<div class="form-group">
						<label>Số điện thoại</label>
						<input type="number" class="form-control" name="txtdienthoai" value="<?php echo $_SESSION["khachhang"]["dienthoai"] ?>" disabled>
					</div>
					<div class="form-group">
						<label>Địa chỉ giao hàng</label>
						<textarea class="form-control" name="txtdiachi" required></textarea>
					</div>
					<div class="form-group">
						<input type="submit" value="Hoàn tất đơn hàng" class="btn btn-primary">
					</div>
				</form>
			<?php
			} else {
			?>
				<form method="post">
					<input type="hidden" name="action" value="luudonhang">
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="txtemail" required>
					</div>
					<div class="form-group">
						<label>Họ tên</label>
						<input type="text" class="form-control" name="txttennd" required>
					</div>
					<div class="form-group">
						<label>Số điện thoại</label>
						<input type="number" class="form-control" name="txtdienthoai" required>
					</div>
					<div class="form-group">
						<label>Địa chỉ</label>
						<textarea class="form-control" name="txtdiachi" required></textarea>
					</div>
					<div class="form-group">
						<input type="submit" value="Hoàn tất đơn hàng" class="btn btn-primary">
					</div>
				</form>
			<?php
			}
			?>
		</div>
		<div class="col-sm-6">
			<h4>Các mặt hàng đã chọn</h4>
			<table class="table table-bordered">
				<tr class="info">
					<th>Sản phẩm</th>
					<th>Đơn giá</th>
					<th>Số lượng</th>
					<th>Thành tiền</th>
				</tr>
				<?php foreach ($giohang as $sanpham => $sp) : ?>
					<tr>
						<td><?php echo $sp["tensp"]; ?></td>
						<td><?php echo number_format($sp["gia"], 0, ",", ".") . "đ"; ?></td>
						<td><?php echo $sp["soluongmua"]; ?></td>
						<td><?php echo number_format($sp["sotien"], 0, ",", ".") . "đ"; ?></td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="3" align="right"><b>Tổng tiền</b></td>
					<td><b><?php echo number_format(tinhtiengiohang(), 0, ",", "."); ?>đ</b></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<br>
<?php include("view/bottom.php"); ?>