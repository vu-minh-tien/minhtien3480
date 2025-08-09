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
}

class UserModel{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

            public function all(){
            try{
                $sql="SELECT * FROM `user`";
                $data=$this->conn->query($sql)->fetchAll();
                $dulieu=[];
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
                    $dulieu[]=$user;
                }
                return $dulieu;

            }catch (PDOException $err) {
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
                $user = new User(); // nếu bạn có class User để map dữ liệu
                $user->id = $data['id'];
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = $data['password']; // hoặc cột tương ứng
                $user->role = $data['role'] ?? 'user';
                return $user;
            }
            return null;
        } catch (PDOException $err) {
            echo "Lỗi truy vấn: " . $err->getMessage();
            return null;
        }
    }



                public function create(User $user){        //thêm người dùng
            try{
                $sql="INSERT INTO `user` (`id`, `name`, `image`, `email`, `address`, `role`, `password`, `number`) 
                VALUES (NULL, '".$user->name."', '".$user->image."', '".$user->email."', '".$user->address."',
                 '".$user->role."', '".$user->password."', '".$user->number."');";
                $data=$this->conn->exec($sql);
                return $data;
            }catch (PDOException $err) {
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

}
