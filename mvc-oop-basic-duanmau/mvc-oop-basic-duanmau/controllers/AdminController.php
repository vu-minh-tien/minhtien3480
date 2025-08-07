<?php


require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/CommentModel.php';
require_once __DIR__ . '/../models/CategoryModel.php';

class AdminController {
    public $productModel;
    public $userModel;
    public $commentModel;
    public $categoryModel;

    public function __construct() {
        $this->productModel  = new ProductModel();
        $this->userModel     = new UserModel();
        $this->commentModel  = new CommentModel();
        $this->categoryModel = new CategoryModel();
    }

    public function trangchu_admin() {
        include "views/admin/trangchu_admin.php";
    }

    public function quanly_danhmuc() {
        $danhsach = $this->categoryModel->all();
        $thanhcong = "";
        $loi = "";
        $danhmuc = new Category();

        if (isset($_POST['create_danhmuc'])) {
            $danhmuc->name  = $_POST['name_danhmuc'];
            $danhmuc->date  = date("Y-m-d H:i:s");

            if (empty($danhmuc->name)) {
                $loi = "kiểm tra lại dữ liệu";
            } else {
                $ketqua = $this->categoryModel->create_danhmuc($danhmuc);
                if ($ketqua === 1) {
                    $thanhcong = "tạo danh mục thành công";
                    $danhsach = $this->categoryModel->all();
                } else {
                    $loi = "tạo danh mục thất bại";
                }
            }
        }

        include "views/admin/danhmuc/noidung.php";
    }
public function create_danhmuc() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $this->cate->create_danhmuc($name);
        header('Location: index.php?url=quanly_danhmuc');
        exit;
    }

    include './views/admin/danhmuc/create.php';
}
    public function delete_danhmuc($id) {
        $danhmuc = $this->categoryModel->find($id);
        $thongbao = "";
        $loi = "";
        $thanhcong = "";
        if (!$danhmuc) {
            $thongbao = "Danh mục không tồn tại!";
        } else if ($danhmuc->sum > 0) {
            $thongbao = "Không thể xóa khi danh mục vẫn còn sản phẩm.";
        } else {
            $ketqua = $this->categoryModel->delete_danhmuc($id);
            if ($ketqua === 1) {
                header("Location: ?act=danhmuc");
                exit;
            } else {
                $thongbao = "Xóa danh mục thất bại.";
            }
        }

        $danhsach = $this->categoryModel->all();
        include "views/admin/danhmuc/noidung.php";
    }

    public function update_danhmuc($id) {
        $ten_danhmuc_cu = $this->categoryModel->find($id);
        $thanhcong = "";
        $loi = "";
        $danhmuc = new Category();

        if (isset($_POST['update_danhmuc'])) {
            $danhmuc->id = $id;
            $danhmuc->name = $_POST['name_danhmuc'];

            if (empty($danhmuc->name)) {
                $loi = "kiểm tra lại dữ liệu";
            } else {
                $ketqua = $this->categoryModel->update_danhmuc($danhmuc);
                if ($ketqua > 0) {
                    $thanhcong = "sửa thành công tên thư mục";
                }
            }
        }

        include "views/admin/danhmuc/update_danhmuc.php";
    }

    public function quanly_taikhoan() {
        $err = "";
        $danhsach = $this->userModel->all();

        if (isset($_POST['tim'])) {
            $user = $_POST['user'];
            if (empty($user)) {
                $err = "bạn chưa nhập tên người dùng";
            }

            foreach ($danhsach as $tt) {
                if (stripos($tt->email, $user) !== false || stripos($tt->name, $user) !== false) {
                    $ketqua[] = $tt;
                }
            }

            if (empty($ketqua)) {
                $err = "không tìm thấy";
            } else {
                $danhsach = $ketqua;
            }
        }

        include "views/admin/taikhoan/noidung.php";
    }

    public function quanly_sanpham() {
        $err = "";
        $danhsach= $this->productModel->all();

        if (isset($_POST['tim'])) {
            $tukhoa = $_POST['tukhoa'];

            if (empty($tukhoa)) {
                $err = "bạn chưa nhập nội dung";
            }

            foreach ($danhsach as $tt) {
                if (stripos($tt->name, $tukhoa) !== false) {
                    $ketqua[] = $tt;
                }
            }

            if (empty($ketqua)) {
                $err = "không tìm thấy";
                $danhsach = [];
            } else {
                $danhsach = $ketqua;
            }
        }

        include "views/admin/sanpham/noidung.php";
    }

    public function create_sanpham() {
        $loi = "";
        $thanhcong = "";
        $sanpham = new Product();
        $danhsach = $this->categoryModel->all();

        if (isset($_POST['create_sanpham'])) {
            $sanpham->name = $_POST['name'];

            if ($_FILES['anh_sp']['size'] > 0) {
                $uploadPath = uploadFile($_FILES['anh_sp'], 'uploads/');
                if ($uploadPath) {
                    $sanpham->image = str_replace('uploads/', '', $uploadPath);
                }
            }
      
            $sanpham->price = $_POST['price'];
             $sanpham->idcategory = $_POST['idcategory'];
            $sanpham->descripsion = $_POST['descripsion'];
            $sanpham->hot = $_POST['hot'];
            $sanpham->discount = $_POST['discount'];
            $sanpham->quantity = $_POST['quantity'];

            if ($sanpham->name === "") {
                $loi = "kiểm tra lại các trường giữ liệu";
            } else {
                $ketqua_update = $this->productModel->create($sanpham);
                if ($ketqua_update === 1) {
                    $thanhcong = "create sản phẩm thành công";
                } else {
                    $loi = "create sản phẩm thất bại";
                }
            }
        }

        include "views/admin/sanpham/create_sanpham.php";
    }

    public function delete_sanpham($id) {                            
        $ketqua = $this->productModel->delete_sanpham($id);
        if ($ketqua === 1) {
            header("Location: ?act=sanpham");
            exit;
        } else {
            $loi = "không thể xóa";
            $danhsach = $this->productModel->all();
            include "views/admin/sanpham/noidung.php";
        }
    }

    public function quanly_binhluan() {
        include "views/admin/binhluan/noidung.php";
    }


public function update_sanpham($id) {
   
    $loi ="";
    $thanhcong="";
    $sanpham = $this->productModel->find($id);
    $danhsach =$this->categoryModel->all();

    if (isset($_POST['update_sanpham'])) {
      

        $sanpham->id         =$id;
        $sanpham->name        = $_POST['name'];
        
        if ($_FILES['anh_sp']['size'] > 0) {
            $uploadPath = uploadFile($_FILES['anh_sp'], 'uploads/');
            if ($uploadPath) {
                $sanpham->image = str_replace('uploads/', '', $uploadPath);
            }
        }
        $sanpham->price       = $_POST['price'];
        $sanpham->idcategory  = $_POST['idcategory'];
        $sanpham->descripsion = $_POST['descripsion'];
        $sanpham->hot         = $_POST['hot'];
        $sanpham->discount    = $_POST['discount'];
        $sanpham->quantity    = $_POST['quantity'];

        if($sanpham->name ===""){
            $loi = "kiểm tra lại các trường giữ liệu";
        }
        else{
            $ketqua_update = $this->productModel->update($sanpham);
                if($ketqua_update >0){
                    $thanhcong="update sản phẩm thành công";
                }
                else{
                    $loi ='update sản phẩm thất bại';
                }
            }
        }
    
    include "views/admin/sanpham/update_sanpham.php";
}
}
?>


