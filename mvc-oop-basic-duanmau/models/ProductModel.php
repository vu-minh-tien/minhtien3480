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
public $namecategory;
}
class ProductModel {
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
 public function all(){
            try{
                $sql="SELECT pro.*, cat.name as namecategory 
FROM `product` as pro 
JOIN `category` as cat 
ON pro.idcategory = cat.id;";
                $data=$this->conn->query($sql)->fetchAll();
                $danhsachproduct=[];
                foreach($data as $value){
                    $product = new Product();
                    $product->id        =$value['id'];
                    $product->name        = $value['name'];
                    $product->image       = $value['image'];
                    $product->price       = $value['price'];
                    $product->idcategory = $value['idcategory'];
                   $product->descripsion = $value['descripsion'];
                    $product->hot         = $value['hot'];
                    $product->discount    = $value['discount'];
                    $product->quantity    = $value['quantity'];
                     $product->namecategory = $value['namecategory'];
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
                    $product->descripsion = $data['descripsion'];
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
       $sql = "SELECT * FROM `product` WHERE idcategory = :loai";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([':loai' => $loai]);
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $danhsachproduct = [];
        foreach ($result as $data) {
            $product = new Product();
            $product->id          = $data['id'];
            $product->name        = $data['name'];
            $product->image       = $data['image'];
            $product->price       = $data['price'];
            $product->idcategory  = $data['idcategory'];
            $product->descripsion = $data['descripsion'];
            $product->hot         = $data['hot'];
            $product->discount    = $data['discount'];
            $product->quantity    = $data['quantity'];

            $danhsachproduct[] = $product;
        }

        return $danhsachproduct;

    } catch (PDOException $err) {
       echo "Lỗi : " . $err->getMessage();
    }
}

        public function create(Product $product){        
            try{
                $sql="INSERT INTO `product` (`id`, `name`, `image`, `price`, `idcategory`, `descripsion`, `hot`, `discount`, `quantity`)
                 VALUES (NULL, '".$product->name."', '".$product->image."', '".$product->price."', '".$product->idcategory."', '".$product->descripsion."', '".$product->hot."','".$product->discount."','".$product->quantity."');";
                $data=$this->conn->exec($sql);
                return $data;
            }catch (PDOException $err) {
            echo "Lỗi : " . $err->getMessage();
        }
        }


        public function delete_sanpham($id) {
    try {
        // Xóa comment liên quan
        $sql = "DELETE FROM comment WHERE idproduct = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Xóa sản phẩm
        $sql = "DELETE FROM product WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return true; // báo thành công
    } catch (PDOException $err) {
        echo "Lỗi : " . $err->getMessage();
        return false; // báo thất bại
    }
}

        public function update(Product $product){                 
            try{
                $id=(int)$product->id;
                $sql="UPDATE `product` SET  `name` = '".$product->name."',`image` = '".$product->image."', `price` = '".$product->price."', `idcategory` = '".$product->idcategory."', `descripsion` = '".$product->descripsion."', `hot` = '".$product->hot."', `discount` = '".$product->discount."', `quantity` = '".$product->quantity."' WHERE `product`.`id` = $id;";
                $data=$this->conn->exec($sql);
                return $data;

            }catch (PDOException $err) {
            echo "Lỗi truy vấn sản phẩm: " . $err->getMessage();
        }
        }

       


        public function all_productuser($sql){
            try{
                $data=$this->conn->query($sql)->fetchAll();
                $danhsachproduct=[];
                foreach($data as $value){
                     $product = new Product();
                    $product->id          =$value['id'];
                    $product->name        = $value['name'];
                    $product->image       = $value['image'];
                    $product->price       = $value['price'];
                    $product->idcategory = $value['idcategory'];
                    $product->descripsion = $value['descripsion'];
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

public function searchByName($keyword) {
    $sql = "SELECT * FROM product WHERE name LIKE :keyword";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['keyword' => '%' . $keyword . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}

?>