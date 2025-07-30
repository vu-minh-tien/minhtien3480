<?php
class product {
public $id;
public $name;
public $image;
public $price;
public $idcategory;
public $descripsion;
public $hot;
public $view;
public $discount;
}

class ProductModel {
    private $db;

    public function __construct() {
        $this->db = connectDB();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM product");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS, 'product');
           $products = [];
    foreach ($data as $row) {
        $product = new product();
        $product->id = $row['id'] ?? null;
        $product->name = $row['name'] ?? '';
        $product->image = $row['image'] ?? ''; // Đảm bảo lấy ảnh
        $product->price = $row['price'] ?? 0;
        $product->idcategory = $row['idcategory'] ?? null;
        $product->descripsion = $row['descripsion'] ?? '';
        $product->hot = $row['hot'] ?? 0;
        $product->view = $row['view'] ?? 0;
        $product->discount = $row['discount'] ?? 0;

        $products[] = $product;
    }
    }
}
?>