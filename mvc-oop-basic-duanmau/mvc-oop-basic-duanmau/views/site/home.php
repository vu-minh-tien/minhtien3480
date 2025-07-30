<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ - PolyShop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4 text-center">Sản phẩm mới nhất</h2>
        <div class="row">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img src="<?= BASE_URL . 'uploads/img/' . htmlspecialchars($product->image) ?>"
     alt="<?= htmlspecialchars($product->name) ?>"
     class="card-img-top"
     style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($product->name) ?></h5>
                                <p class="card-text text-danger">
                                    <?= number_format($product->price) ?>₫
                                    <?php if ($product->discount > 0): ?>
                                        <span class="badge bg-warning text-dark">-<?= $product->discount ?></span>
                                    <?php endif; ?>
                                </p>
                                <a href="?act=detail&id=<?= $product->id ?>" class="btn btn-sm btn-primary">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-muted text-center">Không có sản phẩm nào.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
