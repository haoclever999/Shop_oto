<?php
class SANPHAM
{
    private $id_sp;
    private $tensp;
    private $hinhanh;
    private $mota;
    private $soluong;
    private $daban;
    private $tonkho;
    private $gia;
    private $id_dm;
    private $ngaycapnhat;
    private $luotxem;

    public function getID()
    {
        return $this->id_sp;
    }

    public function setID($value)
    {
        $this->id_sp = $value;
    }

    public function getTensanpham()
    {
        return $this->tensp;
    }

    public function setTensanpham($value)
    {
        $this->tensp = $value;
    }

    public function getHinhanh()
    {
        return $this->hinhanh;
    }

    public function setHinhanh($value)
    {
        $this->hinhanh = $value;
    }
    public function getMota()
    {
        return $this->mota;
    }

    public function setMota($value)
    {
        $this->mota = $value;
    }

    public function getSoluong()
    {
        return $this->soluong;
    }

    public function setSoluong($value)
    {
        $this->soluong = $value;
    }

    public function getDaban()
    {
        return $this->daban;
    }

    public function setDaban($value)
    {
        $this->daban = $value;
    }

    public function getTonkho()
    {
        return $this->tonkho;
    }

    public function setTonkho($value)
    {
        $this->tonkho = $value;
    }

    public function getGia()
    {
        return $this->gia;
    }

    public function setGia($value)
    {
        $this->gia = $value;
    }

    public function getID_dm()
    {
        return $this->id_dm;
    }

    public function setID_dm($value)
    {
        $this->id_dm = $value;
    }

    public function getNgaycapnhat()
    {
        return $this->ngaycapnhat;
    }

    public function setNgaycapnhat($value)
    {
        $this->ngaycapnhat = $value;
    }

    public function getLuotxem()
    {
        return $this->luotxem;
    }

    public function setLuotxem($value)
    {
        $this->luotxem = $value;
    }

    // Lấy danh sách
    public function laysanpham()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham GROUP BY id_sp DESC ";
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
    // Lấy danh sách sản phẩm thuộc 1 danh mục
    public function laysanphamtheodanhmuc($id_dm)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham WHERE id_dm=:id_dm";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id_dm", $id_dm);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy sản phẩm theo id sản phẩm
    public function laysanphamtheoid($id_sp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM sanpham WHERE id_sp=:id_sp";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id_sp", $id_sp);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật lượt xem
    public function tangluotxem($id_sp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE sanpham SET luotxem=luotxem+1 WHERE id_sp=:id_sp";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id_sp", $id_sp);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Thêm mới
    public function themsanpham($tensp, $hinhanh, $mota, $soluong, $tonkho, $gia, $id_dm, $ngaycapnhat)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO sanpham(tensp, hinhanh, mota, soluong, daban, tonkho, gia, id_dm, ngaycapnhat, luotxem) VALUES(:tensp, :hinhanh, :mota, :soluong, 0, :tonkho, :gia, :id_dm, ngaycapnhat, 0)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tensp", $tensp);
            $cmd->bindValue(":hinhanh", $hinhanh);
            $cmd->bindValue(":mota", $mota);
            $cmd->bindValue(":soluong", $soluong);
            $cmd->bindValue(":tonkho", $tonkho);
            $cmd->bindValue(":gia", $gia);
            $cmd->bindValue(":id_dm", $id_dm);
            $cmd->bindValue(":ngaycapnhat", $ngaycapnhat);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoasanpham($id_sp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM sanpham WHERE id_sp=:id_sp";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id_sp", $id_sp);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật 
    public function suasanpham($id_sp, $tensp, $hinhanh, $mota, $soluong, $daban, $tonkho, $gia, $id_dm, $ngaycapnhat, $luotxem)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE sanpham SET tensp=:tensp ,hinhanh=:hinhanh, mota=:mota, soluong=:soluong, daban=:daban, tonkho=:tonkho, gia=:gia, id_dm=:id_dm, ngaycapnhat=:ngaycapnhat, luotxem=:luotxem WHERE id_sp=:id_sp";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tensp", $tensp);
            $cmd->bindValue(":hinhanh", $hinhanh);
            $cmd->bindValue(":mota", $mota);
            $cmd->bindValue(":soluong", $soluong);
            $cmd->bindValue(":daban", $daban);
            $cmd->bindValue(":tonkho", $tonkho);
            $cmd->bindValue(":gia", $gia);
            $cmd->bindValue(":id_dm", $id_dm);
            $cmd->bindValue(":ngaycapnhat", $ngaycapnhat);
            $cmd->bindValue(":luotxem", $luotxem);
            $cmd->bindValue(":id_sp", $id_sp);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Đếm tổng số mặt hàng
    public function demtongsosanpham()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT COUNT(*) FROM sanpham";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng phân trang (bắt đầu từ mẫu tin $m, lấy $n mẫu tin)
    public function laysanphamphantrang($m, $n)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT s.*, d.tendm
                    FROM sanpham s, danhmuc d 
                    WHERE d.id_dm=s.id_dm
                    ORDER BY id_sp DESC
                    LIMIT $m, $n";
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

    // Lấy sản phẩm nổi bật
    public function laysanphamnoibat()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT s.*, d.tendm 
                    FROM sanpham s, danhmuc d 
                    WHERE d.id_dm=s.id_dm
                    ORDER BY luotxem DESC
                    LIMIT 0, 4";
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

    // Cập nhật số lượng tồn
    public function capnhatsoluong($id, $soluong)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE sanpham SET tonkho=soluong - :daban WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":soluong", $soluong);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}