<?php require_once __DIR__ . '/../header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <style>
       

        body {
            width: 100%;
            /* margin: 0 auto; */
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .content {
            padding: 30px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        a {
            text-decoration: none;
        }

        .btn-back {
            display: inline-block;
            margin-bottom: 20px;
            color: #007bff;
            font-weight: bold;
        }

        .right {
            text-align: right;
            margin-bottom: 20px;
        }

        .btn-add {
            padding: 5px 10px;
            background-color: #11a5dbff;
            color: white;
            border-radius: 10px;
            font-weight: bold;
            text-decoration: none;
            margin-bottom: 10px;
            display: inline-block;
        }

        form {
            margin-top: 10px;
        }

        input[type="text"] {
            border-radius: 20px;
            height: 30px;
            width: 250px;
            padding: 5px 10px;
            border: 1px solid #ccc;
        }

        button {
            margin: 10px 0;
            border-radius: 20px;
            height: 35px;
            background-color: #d71818;
            color: white;
            width: 60px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #b91313;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            border-radius: 4px;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Quản lý sản phẩm</h1>
        <a href="?act=trangchu_admin" class="btn-back">← Quay lại trang chủ</a>

        <div class="right">
            <a href="?act=create_sanpham" class="btn-add">Thêm sản phẩm</a>

            <form action="" method="post" enctype="multipart/form-data">
                <button type="submit" name="tim">Tìm</button>
                <input type="text" name="tukhoa" placeholder="Nhập tên sản phẩm...">
                <span class="error"><?= isset($err) ? $err : '' ?></span>
            </form>
        </div>

        <table>
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Khuyến mãi</th>
                <th>Danh mục</th>
                <th>Hot</th>
                <th>Số lượng</th>
                <th>Hành động</th>
            </tr>
            <?php if (!empty($danhsach)): ?>
                <?php foreach ($danhsach as $tt): ?>
                    <tr>
                        <td>
                            <img src="<?= ANH_IMG . $tt->image ?>" alt="ảnh sản phẩm" width="100" height="120">
                        </td>
                        <td><?= htmlspecialchars($tt->name) ?></td>
                        <td><?= number_format($tt->price) ?> đ</td>
                        <td><?= $tt->discount ?>%</td>
                        <td><?= $tt->idcategory ?></td>
                         <td><?= $tt->descripsion ?></td>
                        <td><?= $tt->hot ? 'Có' : 'Không' ?></td>
                        <td><?= $tt->quantity ?></td>
                        <td>
                            <a style="color:black;" href="?act=update_sanpham&id=<?= $tt->id ?>">Sửa</a> /
                            <a style="color:black;" href="?act=delete_sanpham&id=<?= $tt->id ?>" onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này không?')">Xoá</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">Không có sản phẩm nào.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
