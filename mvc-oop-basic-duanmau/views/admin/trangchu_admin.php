<?php  require_once "header.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
   
</style>
    </head>
<body>
    <!-- slide show -->
<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1000">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./uploads/img/0n.png" class="d-block w-100" alt="Banner 1" style="height: 800px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="./uploads/img/1n.png" class="d-block w-100" alt="Banner 2" style="height: 800px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="./uploads/img/2n.png" class="d-block w-100" alt="Banner 3" style="height: 800px; object-fit: cover;">
    </div>
  <div class="carousel-item">
      <img src="./uploads/img/3n.png" class="d-block w-100" alt="Banner 4"style="height: 800px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="./uploads/img/4n.png" class="d-block w-100" alt="Banner 5"style="height: 800px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="./uploads/img/5n.png" class="d-block w-100" alt="Banner 6"style="height: 800px; object-fit: cover;">
    </div>
    <div class="carousel-item">
      <img src="./uploads/img/6n.png" class="d-block w-100" alt="Banner 7"style="height: 800px; object-fit: cover;">
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