    <?php
    require_once __DIR__ . '/../models/ProductModel.php';
    require_once __DIR__ . '/../models/User.php';
    require_once __DIR__ . '/../models/CommentModel.php';
    require_once __DIR__ . '/../models/CategoryModel.php';
    class ProductController {
        public $productModel;
        public $userModel;
        public $commentModel;
        public $categoryModel;

        public function __construct(){
            $this->productModel  = new ProductModel();
            $this->userModel     = new UserModel();
            $this->commentModel  = new CommentModel();
            $this->categoryModel = new CategoryModel();
        }

      
public function trangchu(){
    $thongbao = "";
   
    $danhsach_sp = $this->productModel->all();

  
    if (isset($_GET['search'])) {
        $key_name = trim($_GET['key_name']); 

        if ($key_name === "") {
            $thongbao = "Bạn chưa nhập thông tin";
        } else {
            $result = [];

      
            foreach ($danhsach_sp as $tt) {
                if (stripos($tt->name, $key_name) !== false) {
                    $result[] = $tt;
                }
            }

            if (empty($result)) {
                $thongbao = "Không tìm thấy";
            } else {
            
                $danhsach_sp = $result;
             
                include "views/user/hienthitheoten.php";
                return; 
            }
        }
    }


    include "views/user/trangchu.php";
}

        public function sanpham(){
            $thongbao="";
            $priceFilter = isset($_GET['price']) ? $_GET['price'] : null; 
                        
           $sql = "SELECT * FROM `product` WHERE 1"; 

           switch($priceFilter){
                case '1':
                    $sql .= " AND price < 5000000"; 
                    break;
                case '2':
                    $sql .= " AND price BETWEEN 5000000 AND 10000000";
                    break;
                case '3':
                    $sql .= " AND price BETWEEN 10000000 AND 20000000";
                    break;
                case '4':
                    $sql .= " AND price BETWEEN 20000000 AND 30000000";
                    break;
                case '5':
                    $sql .= " AND price > 30000000";
                    break;
            
           }
            $danhsach_sp = $this->productModel->all($sql);
            if(empty($danhsach_sp)){
                $thongbao="không có sản phẩm nào";
            }

            include "views/user/product.php";
        }

        public function lien_he(){
            include "views/user/contact.php";
        }

        public function gioi_thieu(){
        include "views/user/about.php";
        }


        public function chitietsanpham($id){
            session_start();
            $chitietsanpham = $this->productModel->find($id);     
            $loai= $chitietsanpham->idcategory;                        
            $sp_lien_quan =$this->productModel->find_loai($loai); 
            $comment =$this->commentModel->find_comment_idpro($id);   
                    $comment1 = new Comment();
                    if(isset($_POST['gui'])){
                        $comment1->content        = $_POST['comment'];
                        $comment1->date           = date("Y-m-d H:i:s");
                        $comment1->idproduct     = $id;
                        $comment1->iduser        = $_SESSION['user']['id'];
                        
                        $noidung =$_POST['comment'];
                        if(!empty($noidung)){   
                            $ketqua = $this->commentModel->create($comment1);
                            if($ketqua ===1){
                                $comment = $this->commentModel->find_comment_idpro($id);
                            }
                            else{
                            $loi= "không thể create ";
                            }
                        }


                    }
            include "views/user/chitietsanpham.php";
        }
public function search() {
    $keyword = $_GET['keyword'] ?? '';
    $productModel = new ProductModel();
    $products = $productModel->searchByName($keyword);
    require 'views/user/search_result.php';
}

    }
    ?>