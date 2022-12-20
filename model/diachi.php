<?php
class DIACHI
{

    // Thêm địa chỉ mới, trả về khóa của dòng mới thêm
    public function themdiachi($id_nd, $diachi)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO diachi(id_nd, diachi) VALUES(:id_nd,:diachi)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':id_nd', $id_nd);
            $cmd->bindValue(':diachi', $diachi);
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