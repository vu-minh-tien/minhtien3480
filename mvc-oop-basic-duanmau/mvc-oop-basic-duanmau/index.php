<?php 
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ProductController.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';

// Route
$act = $_GET['act'] ?? '/';
$id = $_GET['id'] ?? null;

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'=>(new ProductController())->Home(),
    'home' => (new ProductController())->home(),
 'products' => (new ProductController())->products(),
    'detail' => (new ProductController())->detail($id),
    'register' => (new ProductController())->register(),
    'login' => (new ProductController())->login(),
    'about' => (new ProductController())->about(),
    'contact' => (new ProductController())->contact(),

// ADMIN
    'admin-dashboard' => (new AdminController())->dashboard(),
    'admin-products' => (new AdminController())->products(),
    'admin-categories' => (new AdminController())->categories(),
    'admin-users' => (new AdminController())->users(),
    'admin-comments' => (new AdminController())->comments(),




};
?>