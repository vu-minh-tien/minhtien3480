<?php require_once 'views/layouts/header.php'; ?>

<!DOCTYPE html>
<html lang="vi">
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
        position: relative;
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
    .price-old {
        text-decoration: line-through;
        color: gray;
        font-size: 16px;
    }
    .price {
        color: red;
        font-size: 22px;
        font-weight: bold;
    }
    .desc {
        margin: 15px 0;
    }
    .badge-sale {
        position: absolute;
        top: 0;
        left: 0;
        background: red;
        color: white;
        padding: 6px 10px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 0 0 6px 0;
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
        position: relative;
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
    .related-card .price-old {
        font-size: 13px;
    }
    .related-card .badge-sale {
        top: 10px;
        left: 10px;
        border-radius: 4px;
        padding: 4px 6px;
    }

    /* Bình luận */
    .comments {
        margin-top: 50px;
        padding: 20px;
        background: #fafafa;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .comments h3 {
        text-align: center;
        color: #ec3030;
        margin-bottom: 20px;
    }
    .comments form {
        margin-bottom: 20px;
    }
    .comments textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: vertical;
        font-size: 14px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }
    .comments button {
        background-color: #ec3030;
        color: #fff;
        padding: 8px 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.2s ease;
    }
    .comments button:hover {
        background-color: #c22525;
    }
    .comment-item {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
    }
    .comment-item b {
        color: #333;
    }
    .comment-item p {
        margin: 5px 0;
        font-size: 14px;
    }
    .comment-item small {
        color: #888;
        font-size: 12px;
    }
</style>

</head>
<body>

<div class="container">
    <!-- Chi tiết sản phẩm -->
    <div class="product-detail">
        <?php if (!empty($chitietsanpham->discount) && $chitietsanpham->discount > 0): ?>
            <span class="badge-sale">-<?php echo $chitietsanpham->discount; ?>%</span>
        <?php endif; ?>

        <div class="product-image">
            <img src="uploads/<?php echo htmlspecialchars($chitietsanpham->image); ?>" 
                 alt="<?php echo htmlspecialchars($chitietsanpham->name); ?>">
        </div>
        <div class="product-info">
            <h2><?php echo htmlspecialchars($chitietsanpham->name); ?></h2>
            
            <?php if (!empty($chitietsanpham->discount) && $chitietsanpham->discount > 0): ?>
                <?php 
                    $old_price = $chitietsanpham->price;
                    $new_price = $old_price - ($old_price * $chitietsanpham->discount / 100);
                ?>
                <p class="price-old"><?php echo number_format($old_price, 0, ',', '.'); ?> VNĐ</p>
                <p class="price"><?php echo number_format($new_price, 0, ',', '.'); ?> VNĐ</p>
            <?php else: ?>
                <p class="price"><?php echo number_format($chitietsanpham->price, 0, ',', '.'); ?> VNĐ</p>
            <?php endif; ?>

            <div class="desc"><?php echo nl2br(htmlspecialchars($chitietsanpham->descripsion)); ?></div>
            <p><b>Loại đồng hồ:  </b> <?php echo htmlspecialchars($chitietsanpham->idcategory); ?></p>
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
                        <?php if (!empty($sp->discount) && $sp->discount > 0): ?>
                            <span class="badge-sale">-<?php echo $sp->discount; ?>%</span>
                        <?php endif; ?>
                        <a href="index.php?act=chitietsanpham&id=<?php echo $sp->id; ?>">
                            <img src="uploads/<?php echo htmlspecialchars($sp->image); ?>" 
                                 alt="<?php echo htmlspecialchars($sp->name); ?>">
                            <h4><?php echo htmlspecialchars($sp->name); ?></h4>
                            <?php if (!empty($sp->discount) && $sp->discount > 0): ?>
                                <?php 
                                    $old_price = $sp->price;
                                    $new_price = $old_price - ($old_price * $sp->discount / 100);
                                ?>
                                <p class="price-old"><?php echo number_format($old_price, 0, ',', '.'); ?> VNĐ</p>
                                <p class="price"><?php echo number_format($new_price, 0, ',', '.'); ?> VNĐ</p>
                            <?php else: ?>
                                <p class="price"><?php echo number_format($sp->price, 0, ',', '.'); ?> VNĐ</p>
                            <?php endif; ?>
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
