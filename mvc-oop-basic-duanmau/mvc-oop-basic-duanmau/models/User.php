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

class UserModel
{
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

}
