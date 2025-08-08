<?php require_once 'views/layouts/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <style>
        /* Chi tiết sản phẩm */
        .product-detail {
            display: flex;
            gap: 30px;
            margin: 30px 0;
        }
        .product-detail img {
            width: 350px;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
        }
        .product-info h2 {
            margin-top: 0;
        }
        .price {
            color: red;
            font-size: 22px;
            font-weight: bold;
        }
        .desc {
            margin: 15px 0;
        }

        /* Sản phẩm liên quan */
        .related-products {
            margin-top: 50px;
        }
        .related-products h3 {
            margin-bottom: 20px;
        }
        .related-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
        }
        .related-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            text-align: center;
            transition: transform 0.2s ease;
            padding-bottom: 10px;
        }
        .related-card:hover {
            transform: translateY(-5px);
        }
        .related-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }
        .related-card h4 {
            font-size: 16px;
            margin: 10px 0 5px;
        }

        /* Bình luận */
        .comments {
            margin-top: 50px;
        }
        .comment-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        h3{
            text-align: center;
            color: #ec3030ff;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Chi tiết sản phẩm -->
    <div class="product-detail">
        <div class="product-image">
            <img src="uploads/<?php echo htmlspecialchars($chitietsanpham->image); ?>" 
                 alt="<?php echo htmlspecialchars($chitietsanpham->name); ?>">
        </div>
        <div class="product-info">
            <h2><?php echo htmlspecialchars($chitietsanpham->name); ?></h2>
            <p class="price"><?php echo number_format($chitietsanpham->price, 0, ',', '.'); ?> VNĐ</p>
            <div class="desc"><?php echo nl2br(htmlspecialchars($chitietsanpham->descripsion)); ?></div>
            <p><b>Danh mục:</b> <?php echo htmlspecialchars($chitietsanpham->idcategory); ?></p>
            <form action="" method="post">
                <input type="number" name="quantity" value="1" min="1">
                <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </div>

    <!-- Sản phẩm liên quan -->
    <div class="related-products">
        <h3>SẢN PHẨM LIÊN QUAN </h3>
        <div class="related-container">
            <?php if(!empty($sp_lien_quan)): ?>
                <?php foreach($sp_lien_quan as $sp): ?>
                    <div class="related-card">
                        <a href="index.php?act=chitietsanpham&id=<?php echo $sp->id; ?>">
                            <img src="uploads/<?php echo htmlspecialchars($sp->image); ?>" 
                                 alt="<?php echo htmlspecialchars($sp->name); ?>">
                            <h4><?php echo htmlspecialchars($sp->name); ?></h4>
                            <p class="price"><?php echo number_format($sp->price, 0, ',', '.'); ?> VNĐ</p>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Không có sản phẩm liên quan.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bình luận -->
    <div class="comments">
        <h3>Bình luận</h3>
        <?php if(isset($_SESSION['user'])): ?>
            <form action="" method="post">
                <textarea name="comment" rows="4" placeholder="Nhập bình luận..." required></textarea><br>
                <button type="submit" name="gui">Gửi bình luận</button>
            </form>
        <?php else: ?>
            <p>Bạn cần <a href="index.php?act=dangnhap">đăng nhập</a> để bình luận.</p>
        <?php endif; ?>

        <?php if(!empty($comment)): ?>
            <?php foreach($comment as $cm): ?>
                <div class="comment-item">
                    <b><?php echo htmlspecialchars($cm->user_name ?? 'Người dùng'); ?></b>
                    <p><?php echo nl2br(htmlspecialchars($cm->content)); ?></p>
                    <small><?php echo $cm->date; ?></small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Chưa có bình luận nào.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>

<?php require_once 'views/layouts/footer.php'; ?>
