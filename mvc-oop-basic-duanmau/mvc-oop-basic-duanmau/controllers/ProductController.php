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
    $sanpham_hot = $this->productModel->all_hot();
    $sanpham_moi = $this->productModel->all_moi();
    $khuyen_mai  = $this->productModel->all_khuyenmai();
    $list_product = $this->productModel->all();

  
    if (isset($_GET['search'])) {
        $key_name = trim($_GET['key_name']); 

        if ($key_name === "") {
            $thongbao = "Bạn chưa nhập thông tin";
        } else {
            $result = [];

      
            foreach ($list_product as $tt) {
                if (stripos($tt->name, $key_name) !== false) {
                    $result[] = $tt;
                }
            }

            if (empty($result)) {
                $thongbao = "Không tìm thấy";
            } else {
            
                $list_product = $result;
             
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

        public function sanpham_hot(){
            $sanpham_hot =$this->productModel->all_hot();
            include "views/user/trangchu.php";
        }

        public function sanpham_moi(){
            $sanpham_moi =$this->productModel->all_moi();
            include "views/user/trangchu.php";
        }

        public function khuyen_mai(){
            $khuyen_mai =$this->productModel->all_khuyenmai();
            include "views/user/trangchu.php";
        }

        public function chi_tiet_sp($id){
            session_start();
            $chi_tiet_sp = $this->productModel->find($id);     
            $loai= $chi_tiet_sp->category_id;                        
            $sp_lien_quan =$this->productModel->find_lien_quan($loai); 
            $comment =$this->commentModel->find_comment_idpro($id);   
                    $comment1 = new Comment();
                    if(isset($_POST['gui'])){
                        $comment1->content        = $_POST['comment'];
                        $comment1->date           = date("Y-m-d H:i:s");
                        $comment1->product_id     = $id;
                        $comment1->user_id        = $_SESSION['user']['id'];
                        
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
    }
    ?>