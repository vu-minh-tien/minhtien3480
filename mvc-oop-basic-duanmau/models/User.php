<?php
class User{
    public $id;
    public $name;
    public $image;
    public $email;
    public $address;
    public $role;
    public $password;
    public $number;
    public $status;   // 1 = mở, 0 = đóng
}

class UserModel{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function all(){
        try{
            $sql = "SELECT * FROM `user`";
            $data = $this->conn->query($sql)->fetchAll();
            $dulieu = [];
            foreach($data as $tt){
                $user = new User();
                $user->id          = $tt['id'];
                $user->name        = $tt['name'];
                $user->image       = $tt['image'];
                $user->email       = $tt['email'];
                $user->address     = $tt['address'];
                $user->role        = $tt['role'];
                $user->password    = $tt['password'];
                $user->number      = $tt['number'];
                $user->status      = $tt['status'] ?? 1;
                $dulieu[] = $user;
            }
            return $dulieu;
        } catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
    }

    public function find($id){
        try {
            $sql = "SELECT * FROM user WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                $user = new User();
                $user->id = $data['id'];
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = $data['password'];
                $user->role = $data['role'] ?? 'user';
                $user->status = $data['status'] ?? 1;
                return $user;
            }
            return null;
        } catch (PDOException $err) {
            echo "Lỗi truy vấn: " . $err->getMessage();
            return null;
        }
    }

    public function create(User $user){
        try{
            $sql = "INSERT INTO `user` (`id`, `name`, `image`, `email`, `address`, `role`, `password`, `number`, `status`) 
                    VALUES (NULL, '".$user->name."', '".$user->image."', '".$user->email."', '".$user->address."',
                    '".$user->role."', '".$user->password."', '".$user->number."', '".($user->status ?? 1)."');";
            $data = $this->conn->exec($sql);
            return $data;
        } catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
    }

    public function delete_user($id) {
        try {
            $sql = "DELETE FROM `user` WHERE `id` = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Lỗi xóa user: " . $e->getMessage();
            return false;
        }
    }

    public function update(User $user) {
        try {
            $sql = "UPDATE user SET 
                name = :name, 
                email = :email,
                number = :number
                WHERE id = :id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':name', $user->name);
            $stmt->bindValue(':email', $user->email);
            $stmt->bindValue(':number', $user->number);
            $stmt->bindValue(':id', $user->id, PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Lỗi cập nhật user: " . $e->getMessage();
            return false;
        }
    }

    public function update_password(User $user) {
        try {
            $sql = "UPDATE `user` SET `password` = :password WHERE `id` = :id";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                ':password' => $user->password,
                ':id' => $user->id
            ]);
        } catch (PDOException $e) {
            echo "Lỗi cập nhật mật khẩu: " . $e->getMessage();
            return false;
        }
    }

    public function update_status($id, $status) {
    try {
        $sql = "UPDATE `user` SET `status` = :status WHERE `id` = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':status' => $status,
            ':id' => $id
        ]);
    } catch (PDOException $e) {
        echo "Lỗi cập nhật trạng thái tài khoản: " . $e->getMessage();
        return false;
    }
}
public function findByEmail($email){
    try {
        $sql = "SELECT * FROM user WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data){
            $user = new User();
            $user->id = $data['id'];
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->role = (int)$data['role'];
            $user->status = isset($data['status']) ? (int)$data['status'] : 1; // default active
            $user->number = $data['number'] ?? '';
            $user->address = $data['address'] ?? '';
            $user->image = $data['image'] ?? '';
            return $user;
        }
        return null;
    } catch(PDOException $e){
        echo "Lỗi truy vấn findByEmail: ".$e->getMessage();
        return null;
    }
}


}
