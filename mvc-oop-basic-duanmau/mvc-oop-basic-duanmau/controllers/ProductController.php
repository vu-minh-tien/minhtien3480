<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
    }

    public function Home()
    {
        include './views/layouts/header.php';
         $productModel = new ProductModel();
        $products = $productModel->getAll();
        include './views/site/home.php';
        include './views/layouts/footer.php';
    }
  public function products() {
        include './views/layouts/header.php';
        include './views/site/products.php';
        include './views/layouts/footer.php';
    }
    public function detail($id) {
        include './views/layouts/header.php';
        include './views/site/detail.php';
        include './views/layouts/footer.php';
    }
  public function register() {
        include './views/layouts/header.php';
        include './views/site/register.php';
        include './views/layouts/footer.php';
    }
 public function login() {
        include './views/layouts/header.php';
        include './views/site/login.php';
        include './views/layouts/footer.php';
    }
   public function about() {
        include './views/layouts/header.php';
        include './views/site/about.php';
        include './views/layouts/footer.php';
    }
    public function contact() {
        include './views/layouts/header.php';
        include './views/site/contact.php';
        include '../views/layouts/footer.php';
    }
}
