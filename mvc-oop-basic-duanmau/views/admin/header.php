<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Xử lý đăng xuất
if (isset($_GET['act']) && $_GET['act'] === 'dangxuat') {
    session_destroy();
    header("Location: ?act=dangnhap");
    exit;
}

$currentPage = $_GET['act'] ?? 'trangchu_admin';
$page = $_GET['page'] ?? 'dashboard'; 
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Header</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
        }
        .menu {
            height: 60px;
            background-color: rgba(28, 170, 235, 1);
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: white;
            justify-content: space-between;
        }
        .menu .left {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .menu li {
            list-style: none;
            display: inline-block;
        }
        .menu a {
            text-decoration: none;
            color: white;
            padding: 8px 12px;
            transition: background-color 0.3s;
            border-radius: 5px;
        }
        .menu a:hover,
        .menu a.active {
            background-color: rgba(255, 255, 255, 0.3);
        }
        .anh img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
        }
        .menu a.logout-btn {
    background-color: #0451edff; /* đỏ */
    color: white;
    font-weight: bold;
    border-radius: 5px;
    padding: 8px 14px;
    transition: background-color 0.3s ease;
}

.menu a.logout-btn:hover {
    background-color: #b02a37; /* đỏ đậm khi hover */
    color: white;
}
    </style>
</head>
<body>
    <div class="menu">
  <div class="anh">
    <a href="">
    <a href="?act=thongtin_admin"><img src="uploads/img/logo.png" alt="avatar"></a>
</a>
    
  </div>
        <div class="left">
            <strong><?= isset($_SESSION['admin']) ? $_SESSION['admin'] : 'Admin' ?></strong>
            <li><a href="?act=trangchu_admin" class="<?= $currentPage == 'trangchu_admin' ? 'active' : '' ?>">Trang chủ</a></li>
            <li><a href="?act=danhmuc" class="<?= $currentPage == 'danhmuc' ? 'active' : '' ?>">Quản lý danh mục</a></li>
            <li><a href="?act=sanpham" class="<?= $currentPage == 'sanpham' ? 'active' : '' ?>">Quản lý sản phẩm</a></li>
            <li><a href="?act=taikhoan" class="<?= $currentPage == 'taikhoan' ? 'active' : '' ?>">Quản lý tài khoản</a></li>
            <li><a href="?act=binhluan" class="<?= $currentPage == 'binhluan' ? 'active' : '' ?>">Quản lý bình luận</a></li>
           
        </div> 
        <li>
    <a href="?act=dangxuat" 
       onclick="return confirm('Bạn chắc là muốn đăng xuất?')" 
       class="logout-btn <?= $currentPage == 'dangxuat' ? 'active' : '' ?>">
       Đăng xuất
    </a>
</li>
    </div>
</body>
</html>
