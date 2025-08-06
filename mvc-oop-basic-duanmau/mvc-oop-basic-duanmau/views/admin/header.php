<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Xử lý đăng xuất
if (isset($_GET['act']) && $_GET['act'] === 'dangxuat') {
    session_destroy();
    header("Location: ?act=dangxuat");
    exit;
}
$currentPage = $_GET['act'] ?? 'trangchu_admin';
$page = $_GET['page'] ?? 'dashboard'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
        .menu{
            background-color:rgba(121, 46, 121, 1);
        }
        h1{
            margin:0px;
        }
        
     </style>
</head>
<body>
    
    <div class="menu">
 <?= $_SESSION['admin']?> 
  <div class="anh">
    <a href="">
    <a href="?act=thongtin_admin"><img src="" alt="avatar"></a>
</a>
    
  </div>
        <li><a href="?act=<?='trangchu_admin'?>"  class="<?=$currentPage == 'trangchu_admin' ?'active':''?>">Trang chủ</a></li>
        <li><a href="?act=<?='danhmuc'?>"  class="<?=$currentPage == 'danhmuc' ?'active':''?>">Quản lý danh mục</a></li>
        <li><a href="?act=<?='sanpham'?>"  class="<?=$currentPage == 'sanpham' ?'active':''?>">Quản lý sản phẩm</a></li>
        <li><a href="?act=<?='taikhoan'?>" class="<?=$currentPage == 'taikhoan' ?'active':''?>">Quản lý tài khoản</a></li>
        <li><a href="?act=<?='binhluan'?>" class="<?=$currentPage == 'binhluan' ?'active':''?>">Quản lý bình luận</a></li>
        <li><a href="?act=<?='dangxuat'?>" name="dangxuat" onclick="return confirm('Bạn có chắc là muốn đăng xuất không?')" class="<?=$currentPage == 'dangxuat' ?'active':''?>">Đăng xuất</a></li>
        
    </div>

</body>
</html>