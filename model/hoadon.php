<?php
class HOADON
{
    // Thêm đơn hàng mới, trả về khóa của dòng mới thêm
    public function themhoadon($id_nd, $id_dc, $tongtien)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO hoadon(id_nd, id_dc, tongtien) 
					VALUES(:id_nd,:id_dc,:tongtien)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':id_nd', $id_nd);
            $cmd->bindValue(':id_dc', $id_dc);
            $cmd->bindValue(':tongtien', $tongtien);
            $cmd->execute();
            $id = $db->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoahoadon($id_hd)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM hoadon WHERE id_hd=:id_hd";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id_hd", $id_hd);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy danh sách
    public function layhoadon()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM hoadon";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy đơn hàng theo id
    public function layhoadontheonguoidung($id_nd)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM hoadon WHERE id_nd=:id_nd";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id_nd", $id_nd);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật 
    public function suatrangthaidon($id_hd, $trangthai)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE hoadon SET trangthai=:trangthai WHERE id_hd=:id_hd";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":trangthai", $trangthai);
            $cmd->bindValue(":id_hd", $id_hd);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
