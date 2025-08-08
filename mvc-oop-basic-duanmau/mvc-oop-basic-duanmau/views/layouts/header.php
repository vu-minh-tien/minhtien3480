<?php  
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$nameUser = $_SESSION['user']['name'] ?? '';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ - PolyShop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
   <style>
    .navbar li a {
    font-size: 16px;
    font-weight: 500;
    color: white;
    text-decoration: none;
    padding: 8px 14px;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* Hiệu ứng hover */
.navbar li a:hover {
    background-color: rgba(255, 255, 255, 0.2); /* nền trắng mờ */
    color: #1181dcff; /* chữ vàng nhạt */
}
    .navbar-light-blue {
        background-color: #a7d8ff; /* xanh nhạt */
    }

    .navbar .nav-link {
        font-weight: 500;
    }

    .navbar .search-form {
        max-width: 300px;
    }

    .center-menu {
        margin: 0 auto;
    }
    .login-btn, .logout-btn {
    display: inline-block;
    padding: 6px 14px;
    margin-left: 10px;
    border-radius: 5px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}

.login-btn {
    background-color: #0451edff; /* xanh lá */
    color: white;
}

.login-btn:hover {
    background-color: #218838;
}

.logout-btn {
    background-color: #0451edff; /* đỏ */
    color: white;
}

.logout-btn:hover {
    background-color: #b02a37;
}
.anh img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
        }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-info px-4">
    <div class="container-fluid">
       <div class="anh">
    <a href="">
    <a href="?act=thongtin_admin"><img src="uploads/img/logo.png" alt="avatar"></a>
</a>
    
  </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
            <ul class="navbar-nav center-menu">
                <li class="nav-item"><a class="nav-link" href="?act=trangchu">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="?act=product">Sản phẩm</a></li>
                <li class="nav-item"><a class="nav-link" href="?act=about">Giới thiệu</a></li>
                <li class="nav-item"><a class="nav-link" href="?act=contact">Liên hệ</a></li>
               
            </ul>
            <form class="d-flex search-form" action="?act=search" method="GET">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Tìm kiếm..." aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <form action="" method="post" class="ms-3">
    <?php if(!empty($_SESSION['user']['name'])): ?>
        <a class="logout-btn" href="?act=dangxuat">Đăng xuất</a>
    <?php else: ?>
        <a class="login-btn" href="?act=dangnhap">Đăng nhập</a>
    <?php endif; ?>
</form>
        </div>
    </div>
</nav>

<!-- slide show -->
<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1000">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./uploads/img/0.png" class="d-block w-100" alt="Banner 1" style="height: 400px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="./uploads/img/1.png" class="d-block w-100" alt="Banner 2" style="height: 400px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="./uploads/img/2.png" class="d-block w-100" alt="Banner 3" style="height: 400px; object-fit: cover;">
    </div>
  <div class="carousel-item">
      <img src="./uploads/img/3.png" class="d-block w-100" alt="Banner 4"style="height: 400px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="./uploads/img/4.png" class="d-block w-100" alt="Banner 5"style="height: 400px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="./uploads/img/5.png" class="d-block w-100" alt="Banner 6"style="height: 400px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="./uploads/img/6.png" class="d-block w-100" alt="Banner 7"style="height: 400px; object-fit: cover;">
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>

 <div class="carousel-indicators">
    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="6" aria-label="Slide 7"></button>
  </div>
</div>
<!-- Nhớ thêm script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>