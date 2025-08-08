<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bình luận</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            
            margin: 20px auto;
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 25px;
        }
        form input[type="text"] {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
            transition: border-color 0.2s;
        }
        form input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }
        form button {
            padding: 8px 15px;
            border: none;
            background: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        form button:hover {
            background: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        table thead {
            background: #007bff;
            color: white;
        }
        table th, table td {
            padding: 10px 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table tr:hover {
            background: #f1f1f1;
        }
        .btn-delete {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-delete:hover {
            text-decoration: underline;
        }
        .message {
            text-align: center;
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<?php require_once __DIR__ . '/../header.php'; ?>

<div class="container">
    <h2>Quản lý bình luận</h2>

    <!-- Form tìm kiếm -->
    <form action="" method="post">
        <input type="text" name="tukhoa" placeholder="Tìm theo sản phẩm, user hoặc nội dung" 
               value="<?php echo isset($_POST['tukhoa']) ? htmlspecialchars($_POST['tukhoa']) : ''; ?>">
        <button type="submit" name="tim">Tìm kiếm</button>
    </form>

    <!-- Hiển thị thông báo -->
    <?php if (!empty($err)) : ?>
        <p class="message"><?php echo $err; ?></p>
    <?php endif; ?>

    <!-- Bảng danh sách bình luận -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Sản phẩm</th>
                <th>Người dùng</th>
                <th>Nội dung</th>
                <th>Ngày</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($danhsach)): ?>
                <?php foreach ($danhsach as $row): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['ten_sanpham']); ?></td>
                        <td><?php echo htmlspecialchars($row['ten_user']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($row['content'])); ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td>
                            <a class="btn-delete" href="?act=delete_binhluan&id=<?php echo $row['id']; ?>" 
                               onclick="return confirm('Bạn có chắc muốn xóa bình luận này?');">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align:center;">Không có bình luận nào</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
