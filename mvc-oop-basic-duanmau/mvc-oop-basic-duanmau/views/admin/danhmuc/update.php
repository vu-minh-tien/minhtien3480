<?php require_once __DIR__ . '/../header.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cập nhật danh mục</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            margin-top: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
        }
        button {
            margin-top: 25px;
            width: 100%;
            padding: 12px 0;
            background-color: #007bff;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 15px;
            font-weight: bold;
            text-align: center;
        }
        .error {
            color: #d93025;
        }
        .success {
            color: #188038;
        }
        a.back-link {
            display: block;
            text-align: center;
            margin-top: 30px;
            text-decoration: none;
            color: #555;
            font-size: 14px;
        }
        a.back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Cập nhật danh mục</h2>
    <form method="post" action="">
        <label for="name_danhmuc">Tên danh mục mới</label>
        <input type="text" name="name_danhmuc" id="name_danhmuc" 
               value="<?php echo isset($_POST['name_danhmuc']) ? htmlspecialchars($_POST['name_danhmuc']) : htmlspecialchars($ten_danhmuc_cu->name); ?>" 
               required />

        <button type="submit" name="update_danhmuc">Cập nhật</button>
    </form>

    <?php if(!empty($loi)): ?>
        <div class="message error"><?php echo $loi; ?></div>
    <?php elseif(!empty($thanhcong)): ?>
        <div class="message success"><?php echo $thanhcong; ?></div>
    <?php endif; ?>

    <a href="?act=danhmuc" class="back-link">&larr; Quay lại danh sách danh mục</a>
</div>
</body>
</html>
