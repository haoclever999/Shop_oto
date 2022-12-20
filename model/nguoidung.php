<?php
class NGUOIDUNG
{
    private $id_nd;
    private $tennd;
    private $email;
    private $password;
    private $dienthoai;
    private $gioitinh;
    private $ngaydangky;
    private $hinhanh;
    private $phanquyen;
    private $trangthai;

    public function getID()
    {
        return $this->id_nd;
    }

    public function setID($value)
    {
        $this->id_nd = $value;
    }

    public function getTennguoidung()
    {
        return $this->tennd;
    }

    public function setTennguoidung($value)
    {
        $this->tennd = $value;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($value)
    {
        $this->password = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getDienthoai()
    {
        return $this->dienthoai;
    }

    public function setDienthoai($value)
    {
        $this->dienthoai = $value;
    }

    public function getGioitinh()
    {
        return $this->gioitinh;
    }

    public function setGioitinh($value)
    {
        $this->gioitinh = $value;
    }

    public function getNgaydangky()
    {
        return $this->ngaydangky;
    }

    public function setNgaydangky($value)
    {
        $this->ngaydangky = $value;
    }

    public function getHinhanh()
    {
        return $this->hinhanh;
    }

    public function setHinhanh($value)
    {
        $this->hinhanh = $value;
    }

    public function getPhanquyen()
    {
        return $this->phanquyen;
    }

    public function setPhanquyen($value)
    {
        $this->phanquyen = $value;
    }

    public function getTrangthai()
    {
        return $this->trangthai;
    }

    public function setTrangthai($value)
    {
        $this->trangthai = $value;
    }

    //Lấy danh sách người dùng
    public function laydanhsachnguoidung()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung GROUP BY id_nd DESC ";
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

    // Kiểm tra người dùng hợp lệ
    public function kiemtranguoidunghople($email, $password)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung where email=:email and password=:password and trangthai=1";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->bindValue(":password", md5($password));
            $cmd->execute();
            $result = ($cmd->rowCount() == 1);
            $cmd->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Kiểm tra khách hàng hợp lệ
    public function kiemtranguoidungkhachhang($email, $password)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung where email=:email and password=:password and trangthai=1 and phanquyen=2";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->bindValue(":password", md5($password));
            $cmd->execute();
            $result = ($cmd->rowCount() == 1);
            $cmd->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Thêm mới người dùng
    public function themnguoidung($tennd, $email, $password, $dienthoai, $gioitinh, $ngaydangky, $hinhanh, $phanquyen)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO nguoidung(tennd, email, password, dienthoai, giotinh, ngaydangky, hinhanh, phanquyen, trangthai) VALUES(:tennd, :email, :password, :dienthoai, :gioitinh, :ngaydangky, :hinhanh, :phanquyen, 1)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tennd", $tennd);
            $cmd->bindValue(":email", $email);
            $cmd->bindValue(":password", md5($password));
            $cmd->bindValue(":dienthoai", $dienthoai);
            $cmd->bindValue(":gioitinh", $gioitinh);
            $cmd->bindValue(":ngaydangky", $ngaydangky);
            $cmd->bindValue(":hinhanh", $hinhanh);
            $cmd->bindValue(":phanquyen", $phanquyen);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa người dùng
    public function xoanguoidung($id_nd)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM nguoidung WHERE id_nd=:id_nd";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id_nd", $id_nd);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật người dùng
    public function capnhatnguoidung($id_nd, $tennd, $email, $dienthoai, $gioitinh, $hinhanh)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung SET tennd=:tennd, email=:email, dienthoai=:dienthoai, gioitinh=:gioitinh, hinhanh=:hinhanh WHERE id_nd=:id_nd";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id_nd", $id_nd);
            $cmd->bindValue(":tennd", $tennd);
            $cmd->bindValue(":email", $email);
            $cmd->bindValue(":dienthoai", $dienthoai);
            $cmd->bindValue(":gioitinh", $gioitinh);
            $cmd->bindValue(":hinhanh", $hinhanh);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy thông tin một người dùng theo email
    public function laythongtinnguoidung($email)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung where email=:email";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // lấy thông tin người dùng có $email
    public function laythongtinnhanvien($email)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE email=:email AND phanquyen=1";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->execute();
            $ketqua = $cmd->fetch();
            $cmd->closeCursor();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }


    // lấy thông tin người dùng có $email
    public function laythongtinkhachhang($email)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE email=:email AND phanquyen=2";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->execute();
            $ketqua = $cmd->fetch();
            $cmd->closeCursor();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }


    // Lấy thông tin một người dùng theo id
    public function laynguoidungtheoid($id_dn)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung where id_dn=:id_dn";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id_dn", $id_dn);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    //cập nhật mật khẩu
    public function capnhatmatkhau($id_nd, $password)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung SET password=:password WHERE id_nd=:id_nd";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":password", md5($password));
            $cmd->bindValue(":id_nd", $id_nd);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    //cập nhật trạng thái
    public function capnhattrangthai($id_nd, $trangthai)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung SET trangthai=:trangthai WHERE id_nd=:id_nd";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":trangthai", $trangthai);
            $cmd->bindValue(":id_nd", $id_nd);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    //cập nhật quyền
    public function capnhatquyen($id_nd, $phanquyen)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung SET phanquyen=:phanquyen WHERE id_nd=:id_nd";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":phanquyen", $phanquyen);
            $cmd->bindValue(":id_nd", $id_nd);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
