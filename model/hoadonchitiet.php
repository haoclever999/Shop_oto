<?php
class HOADONCT
{

    // Thêm chi tiết đơn hàng mới, trả về khóa của dòng mới thêm
    public function themchitiethoadon($id_hd, $id_sp, $gia, $soluong, $thanhtien)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO hoadonct(id_hd, id_sp, gia, soluong, thanhtien) 
					VALUES(:id_hd, :id_sp, :gia, :soluong, :thanhtien)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':id_hd', $id_hd);
            $cmd->bindValue(':id_sp', $id_sp);
            $cmd->bindValue(':gia', $gia);
            $cmd->bindValue(':soluong', $soluong);
            $cmd->bindValue(':thanhtien', $thanhtien);
            $cmd->execute();
            $id = $db->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
