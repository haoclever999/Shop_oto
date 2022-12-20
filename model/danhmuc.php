<?php
class DANHMUC
{
    private $id_dm;
    private $tendm;
    private $logo;

    public function getIDdanhmuc()
    {
        return $this->id_dm;
    }

    public function setIDdanhmuc($value)
    {
        $this->id_dm = $value;
    }

    public function getTendanhmuc()
    {
        return $this->tendm;
    }

    public function setTendanhmuc($value)
    {
        $this->tendm = $value;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($value)
    {
        $this->logo = $value;
    }

    // Lấy danh sách
    public function laydanhmuc()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM danhmuc GROUP BY id_dm DESC ";
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

    // Thêm mới
    public function themdanhmuc($tendm, $logo)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO danhmuc(tendm, logo) VALUES(:tendm, :logo)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tendm", $tendm);
            $cmd->bindValue(":logo", $logo);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoadanhmuc($id_dm)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM danhmuc WHERE id_dm=:id_dm";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id_dm", $id_dm);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật 
    public function suadanhmuc($id_dm, $tendm, $logo)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE danhmuc SET tendm=:tendm, logo=:logo WHERE id_dm=:id_dm";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tendm", $tendm);
            $cmd->bindValue(":logo", $logo);
            $cmd->bindValue(":id_dm", $id_dm);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy danh mục theo id
    public function laydanhmuctheoid($id_dm)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM danhmuc WHERE id_dm=:id_dm";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id_dm", $id_dm);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}