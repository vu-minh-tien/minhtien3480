<?php
class Product {
public $id;
public $name;
public $image;
public $price;
public $idcategory;
public $descripsion;
public $hot;
public $discount;
public $quantity;
}
class ProductModel {
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
 public function all(){
            try{
                $sql="SELECT * FROM `product`";
                $data=$this->conn->query($sql)->fetchAll();
                $danhsachproduct=[];
                foreach($data as $value){
                    $product = new Product();
                    $product->id        =$value['id'];
                    $product->name        = $value['name'];
                    $product->image       = $value['image'];
                    $product->price       = $value['price'];
                    $product->idcategory = $value['idcategory'];
                    $product->description = $value['description'];
                    $product->hot         = $value['hot'];
                    $product->discount    = $value['discount'];
                    $product->quantity    = $value['quantity'];
                    $danhsachproduct[]=$product;
                }
                return $danhsachproduct;

            }catch (PDOException $err) {
            echo "Lỗi : " . $err->getMessage();
        }
        }
public function find($id){                                    
            try{
                $sql="SELECT * FROM `product` WHERE id = $id";
                $data=$this->conn->query($sql)->fetch();
                if($data !== false){
                     $product = new Product();
                    $product->id        =$data['id'];
                    $product->name        = $data['name'];
                    $product->image       = $data['image'];
                    $product->price       = $data['price'];
                    $product->idcategory = $data['idcategory'];
                    $product->description = $data['description'];
                    $product->hot         = $data['hot'];
                    $product->discount    = $data['discount'];
                    $product->quantity    = $data['quantity'];
                    return $product;
                }

            }catch (PDOException $err) {
            echo "Lỗi : " . $err->getMessage();
        }
        }

            public function find_loai($loai) {
    try {
       $sql = "SELECT * FROM `product` WHERE category_id = :loai";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([':loai' => $loai]);
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dsproduct = [];
        foreach ($result as $data) {
            $product = new Product();
            $product->id          = $data['id'];
            $product->name        = $data['name'];
            $product->image       = $data['image'];
            $product->price       = $data['price'];
            $product->idcategory  = $data['idcategory'];
            $product->description = $data['description'];
            $product->hot         = $data['hot'];
            $product->discount    = $data['discount'];
            $product->quantity    = $data['quantity'];

            $dsproduct[] = $product;
        }

        return $dsproduct;

    } catch (PDOException $err) {
       echo "Lỗi : " . $err->getMessage();
    }
}

        public function create(Product $product){        
            try{
                $sql="INSERT INTO `product` (`id`, `name`, `image`, `price`, `idcategory`, `description`, `hot`, `discount`, `quantity`)
                 VALUES (NULL, '".$product->name."', '".$product->image."', '".$product->price."', '".$product->idcategory."', '".$product->description."', '".$product->hot."','".$product->discount."','".$product->quantity."');";
                $data=$this->conn->exec($sql);
                return $data;
            }catch (PDOException $err) {
            echo "Lỗi : " . $err->getMessage();
        }
        }


        public function deleteproduct($id){                               
            try{
                $sql="DELETE FROM product WHERE `product`.`id` = $id";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi : " . $err->getMessage();
        }
        }

        public function update(Product $product){                 
            try{
                $id=(int)$product->id;
                $sql="UPDATE `product` SET , `name` = '".$product->name."',`image` = '".$product->image."', `price` = '".$product->price."', `idcategory` = '".$product->idcategory."', `description` = '".$product->description."', `hot` = '".$product->hot."', `discount` = '".$product->discount."', `quantity` = '".$product->quantity."' WHERE `product`.`id` = $id;";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

        public function all_hot(){
            try{
                $sql="SELECT * FROM `product` Where `hot` = 1 LIMIT 8";
                $data=$this->conn->query($sql)->fetchAll();
                $dsproduct=[];
                foreach($data as $value){
                     $product = new Product();
                    $product->id        =$value['id'];
                    $product->name        = $value['name'];
                    $product->image       = $value['image'];
                    $product->price       = $value['price'];
                    $product->idcategory = $value['idcategory'];
                    $product->description = $value['description'];
                    $product->hot         = $value['hot'];
                    $product->discount    = $value['discount'];
                    $product->quantity    = $value['quantity'];
                    $dsproduct[]=$product;
                }
                return $dsproduct;

            }catch (PDOException $err) {
            echo "Lỗi : " . $err->getMessage();
        }
        }

        public function all_moi(){
            try{
                $sql="SELECT * FROM `product` Where `hot` = 2 LIMIT 8";
                $data=$this->conn->query($sql)->fetchAll();
                $dsproduct=[];
                foreach($data as $value){
                     $product = new Product();
                    $product->id        =$value['id'];
                    $product->name        = $value['name'];
                    $product->image       = $value['image'];
                    $product->price       = $value['price'];
                    $product->idcategory = $value['idcategory'];
                    $product->description = $value['description'];
                    $product->hot         = $value['hot'];
                    $product->discount    = $value['discount'];
                    $product->quantity    = $value['quantity'];
                    $dsproduct[]=$product;
                }
                return $dsproduct;

            }catch (PDOException $err) {
            echo "Lỗi: " . $err->getMessage();
        }
        }

        public function all_khuyenmai(){
            try{
                $sql="SELECT * FROM `product` Where `hot` = 3 LIMIT 8";
                $data=$this->conn->query($sql)->fetchAll();
                $dsproduct=[];
                foreach($data as $value){
                     $product = new Product();
                    $product->id           =$value['id'];
                    $product->name        = $value['name'];
                    $product->image       = $value['image'];
                    $product->price       = $value['price'];
                    $product->idcategory = $value['idcategory'];
                    $product->description = $value['description'];
                    $product->hot         = $value['hot'];
                    $product->discount    = $value['discount'];
                    $product->quantity    = $value['quantity'];
                    $dsproduct[]=$product;
                }
                return $dsproduct;

            }catch (PDOException $err) {
            echo "Lỗi : " . $err->getMessage();
        }
        }

        public function all_productuser($sql){
            try{
                $data=$this->conn->query($sql)->fetchAll();
                $dsproduct=[];
                foreach($data as $value){
                     $product = new Product();
                    $product->id          =$value['id'];
                    $product->name        = $value['name'];
                    $product->image       = $value['image'];
                    $product->price       = $value['price'];
                    $product->idcategory = $value['idcategory'];
                    $product->description = $value['description'];
                    $product->hot         = $value['hot'];
                    $product->discount    = $value['discount'];
                    $product->quantity    = $value['quantity'];
                    $dsproduct[]=$product;
                }
                return $dsproduct;

            }catch (PDOException $err) {
            echo "Lỗi : " . $err->getMessage();
        }
        }


}

?>