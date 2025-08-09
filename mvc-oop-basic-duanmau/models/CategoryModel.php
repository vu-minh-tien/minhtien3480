<?php
class Category {
    public $id;
    public $name;
    public $sum;
    public $date;
}
class CategoryModel{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
public function all(){
            try{
                $sql="SELECT cat.*, COALESCE(SUM(pro.quantity),0) as sum FROM `category` as cat
                LEFT JOIN product as pro 
                ON pro.idcategory = cat.id 
                GROUP BY cat.id 
                ORDER BY sum DESC";
                $data=$this->conn->query($sql)->fetchAll();
                $danhsachCategory=[];
                foreach($data as $value){
                    $Category = new Category();
                    $Category->id          =$value['id'];
                    $Category->name        =$value['name'];
                    $Category->date        =$value['date'];
                    $Category->sum         =$value['sum'];
                    $danhsachCategory[]=$Category;
                }
                return $danhsachCategory;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }
        // Thêm danh mục
    public function create_danhmuc(Category $category) {
        try{
        $sql = "INSERT INTO `category`(`id`, `name`, `date`) VALUES (NULL,'".$category->name."','".$category->date."')";
       $data=$this->conn->exec($sql);
          return $data;
        }catch (PDOException $err) {
            echo "Lỗi : " . $err->getMessage();
        }
    }
public function delete_danhmuc($id){        //thêm danh mục
            try{
                $sql="DELETE FROM category WHERE `category`.`id` = $id";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function find($id){//tìm
            try{
                $sql="SELECT * FROM `category` Where id = $id";
                $data=$this->conn->query($sql)->fetch();
                if($data !== false){
                    $danhmuc = new Category();
                    $danhmuc->id          = $data['id'];
                    $danhmuc->name        = $data['name'];
                    $danhmuc->date        = $data['date'];

                    return $danhmuc;
                }

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function update_danhmuc(Category $danhmuc){      
            try{
                $id = (int)$danhmuc->id;
                $sql="UPDATE `category` SET `name` = '".$danhmuc->name."' WHERE `category`.`id` = $id;";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }
   
}
?>