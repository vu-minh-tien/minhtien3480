<?php require_once __DIR__ . '/../header.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
        }
        .container {
           
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
        }
        form.search-form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            gap: 10px;
        }
        form.search-form input {
            padding: 8px 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form.search-form button {
            padding: 8px 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form.search-form button:hover {
            background: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        table thead {
            background: #007bff;
            color: white;
        }
        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        table tr:hover {
            background: #f1f1f1;
        }
        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }
        .btn {
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }
        .btn-edit {
            background: #ffc107;
        }
        .btn-delete {
            background: #dc3545;
        }
        .btn-edit:hover {
            background: #e0a800;
        }
        .btn-delete:hover {
            background: #c82333;
        }
        .no-data {
            text-align: center;
            padding: 15px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Quản lý sản phẩm</h2>
     <!-- Nút thêm sản phẩm -->
    <div style="text-align: right; margin-bottom: 15px;">
        <a href="?act=create_sanpham" 
           style="display: inline-block; padding: 8px 15px; background: #28a745; color: white; border-radius: 4px; text-decoration: none;">
            + Thêm sản phẩm
        </a>
    </div>

    <!-- Form tìm kiếm -->
   <form action="" method="post" class="search-form">
    <input type="text" name="tukhoa" placeholder="Tìm theo tên sản phẩm..." 
           value="<?php echo isset($_POST['tukhoa']) ? htmlspecialchars($_POST['tukhoa']) : ''; ?>">
    <button type="submit" name="tim">Tìm kiếm</button>
</form>

    <!-- Bảng sản phẩm -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên đồng hồ </th>
                <th>Giá</th>
                <th>Loại đồng hồ </th>
                <th>Số lượng</th>
                <th>Hot</th>
                <th>Giảm giá</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($danhsach)): ?>
            <?php foreach ($danhsach as $p): ?>
                <tr>
                    <td><?php echo $p->id; ?></td>
                    <td>
    <img src="uploads/<?php echo htmlspecialchars($p->image); ?>" 
         alt="Ảnh sản phẩm" class="product-img">
</td>
                    <td><?php echo htmlspecialchars($p->name); ?></td>
                    <td><?php echo number_format($p->price, 0, ',', '.'); ?> đ</td>
                    <td><?php echo $p->namecategory; ?></td>
                    <td><?php echo $p->quantity; ?></td>
                    <td><?php echo $p->hot; ?></td>
                    <td><?php echo $p->discount; ?>%</td>
                    <td>
                        <a href="?act=update_sanpham&id=<?php echo $p->id; ?>" class="btn btn-edit">Sửa</a>
                        <a href="?act=delete_sanpham&id=<?php echo $p->id; ?>" 
                           onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?');" 
                           class="btn btn-delete">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9" class="no-data">Không có sản phẩm nào</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
   
</div>

</body>
</html>
