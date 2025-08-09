<?php require_once __DIR__ . '/../header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh mục</title>
    <style>
      
        body {
            
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .content {
            margin: 20px auto;
            padding: 40px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            color: #2c3e50;
        }

        a {
            /* display: inline-block; */
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 40px;
            background-color: #fff;
        }

        th, td {
            padding: 12px 20px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f1f1f1;
            color: #333;
            font-weight: bold;
        }

        td {
            background-color: #ffffff;
        }

        input[type="text"] {
            height: 35px;
            width: 220px;
            padding: 5px 15px;
            border-radius: 20px;
            border: 1px solid #ccc;
            outline: none;
        }

        button {
            background-color: #e91e63;
            color: white;
            border: none;
            border-radius: 20px;
            width: 80px;
            height: 35px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 10px;
        }

        button:hover {
            background-color: #c2185b;
        }

        .right {
            text-align: right;
        }

        span.message {
            display: inline-block;
            margin-left: 10px;
            font-size: 14px;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="content">
        <?php 
            // Khởi tạo biến hiển thị thông báo nếu chưa có
            $thongbao = $thongbao ?? '';
            $thanhcong = $thanhcong ?? '';
            $loi = $loi ?? '';
            $danhsach = $danhsach ?? []; // giả sử có dữ liệu mảng danh mục
        ?>

        <h1>Trang quản lý danh mục</h1>
        

        <!-- Form thêm danh mục -->
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>Tên danh mục</th>
                    <td>
                        <input type="text" name="name_danhmuc" placeholder="Tạo tên danh mục">
                        <button type="submit" name="create_danhmuc">Tạo mới</button>
                        <span class="message success"><?=$thanhcong?></span>
                        <span class="message error"><?=$loi?></span>
                    </td>
                </tr>
            </table>
        </form>

        <!-- Bảng danh sách danh mục -->
        <table>
            <caption style="text-align:left; font-weight:bold; padding:10px 0;"><?=$thongbao?></caption>
            <tr>
                <th>Danh mục</th>
                <th>Số lượng</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
            <?php foreach($danhsach as $ds): ?>
                <tr>
                    <td><?= htmlspecialchars($ds->name) ?></td>
                    <td><?= $ds->sum ?></td>
                    <td><?= $ds->date ?></td>
                    <td>
                        <a style="color:black;" href="?act=update_danhmuc&id=<?=$ds->id?>">Sửa</a> /
                        <a style="color:black;" href="?act=delete_danhmuc&id=<?=$ds->id?>" onclick="return confirm('Bạn có chắc là muốn xóa không?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
