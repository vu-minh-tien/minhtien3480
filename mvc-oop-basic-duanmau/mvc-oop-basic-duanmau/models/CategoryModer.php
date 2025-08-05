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
}
?>