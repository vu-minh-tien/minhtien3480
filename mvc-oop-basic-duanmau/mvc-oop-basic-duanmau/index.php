<?php 
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminController.php';
require_once './controllers/UserController.php';
require_once './controllers/Dangnhap_dangkyController.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';

// Route
$act = $_GET['act'] ?? '/';
$id = $_GET['id'] ?? null;

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
  //đăng nhập,đăng xuất,đăng ký
    '/'               =>(new Nhap_kyController())->home(),
    'dangxuat'       =>(new Nhap_kyController())->dangxuat(),
    'dangnhap'        =>(new Nhap_kyController())->dangnhap(),
    'dangky'          =>(new Nhap_kyController())->dangky(),


    // user
   
    'danhsach_sanpham'        =>(new ProductController())->trangsp_user(),
    'trangchu'           =>(new ProductController())->trangchu(),
    'product'            =>(new ProductController())->product(),
    'contact'                 =>(new ProductController())->contact(),
    'about'              =>(new ProductController())->about(),
    // 'sanpham_hot'             =>(new ProductController())->sanpham_hot(),
    // 'sanpham_moi'             =>(new ProductController())->sanpham_moi(),
    // 'khuyen_mai'              =>(new ProductController())->khuyen_mai(),
    'chitietsanpham'             =>(new ProductController())->chitietsanpham($id),
    


    
    // // admin
    // 'trangchu_admin'         => (new AdminController())->trangchu_admin(),

    // 'quanly_sanpham'         => (new AdminController())->quanly_sanpham(),
    // 'delete_sanpham'         => (new AdminController())->delete_sanpham($id),
    // 'update_sanpham'         => (new AdminController())->update_sanpham($id),
    

    // 'quanly_danhmuc'         => (new AdminController())->quanly_danhmuc(),
    // 'quanly_taikhoan'        => (new AdminController())->quanly_taikhoan(),
    // 'quanly_binhluan'        => (new AdminController())->quanly_binhluan(),
    // 'quanly_donhang'         => (new AdminController())->quanly_donhang(),

    // 'create_sanpham'         => (new AdminController())->create_sanpham(),
    // 'delete_danhmuc'         => (new AdminController())->delete_danhmuc($id),
    // 'update_danhmuc'         => (new AdminController())->update_danhmuc($id),

    
};
?>