<?php require_once __DIR__ . '/../header.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Cập nhật sản phẩm</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        padding: 20px;
    }
    main {
        background: #fff;
        max-width: 600px;
        margin: 0 auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    h1 {
        text-align: center;
        color: #d91c1c;
        margin-bottom: 25px;
    }
    form table {
        width: 100%;
    }
    th {
        text-align: left;
        padding: 10px 0;
        width: 150px;
        vertical-align: top;
    }
    td {
        padding: 10px 0;
    }
    input[type="text"],
    input[type="number"],
    input[type="file"],
    select {
        width: 100%;
        padding: 10px 15px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 15px;
        background-color: #fff;
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    input:focus,
    select:focus {
        border-color: #d91c1c;
        outline: none;
        box-shadow: 0 0 6px rgba(217, 28, 28, 0.3);
    }
    .current-img {
        max-width: 120px;
        border-radius: 8px;
        margin-top: 5px;
    }
    button {
        background-color: #d91c1c;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 15px;
        transition: background-color 0.3s;
    }
    button:hover {
        background-color: #a51414;
    }
    .actions {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
    .actions a {
        height: 40px;
        padding: 10px 20px;
        background: #ccc;
        color: black;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s;
    }
    .actions a:hover {
        background-color: #aaa;
    }
    .message {
        margin-top: 15px;
        font-weight: bold;
    }
    .error {
        color: red;
    }
    .success {
        color: green;
    }
</style>
</head>
<body>
<main>
    <h1>Cập nhật sản phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Tên sản phẩm</th>
                <td><input type="text" name="name" value="<?= htmlspecialchars($sanpham->name) ?>"></td>
            </tr>
            <tr>
                <th>Ảnh hiện tại</th>
                <td>
                  <?php if (!empty($sanpham->image)) : ?>
    <img src="<?= 'uploads/' . htmlspecialchars($sanpham->image) ?>" alt="Ảnh sản phẩm" class="current-img">
<?php else: ?>
    <span>Chưa có ảnh</span>
<?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Ảnh mới</th>
                <td><input type="file" name="anh_sp"></td>
            </tr>
            <tr>
                <th>Loại</th>
                <td>
                    <select name="idcategory" required>
                        <option value="">-- Chọn danh mục --</option>
                        <?php foreach ($danhsach as $dm): ?>
                            <option value="<?= $dm->id ?>" <?= $sanpham->idcategory == $dm->id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($dm->name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Hot</th>
                <td><input type="number" name="hot" min="1" max="3" value="<?= htmlspecialchars($sanpham->hot) ?>"></td>
            </tr>
            <tr>
                <th>Giá</th>
                <td><input type="number" name="price" value="<?= htmlspecialchars($sanpham->price) ?>"></td>
            </tr>
            <tr>
                <th>Giảm giá (%)</th>
                <td><input type="number" name="discount" min="0" max="100" value="<?= htmlspecialchars($sanpham->discount) ?>"></td>
            </tr>
            <tr>
                <th>Miêu tả</th>
                <td><input type="text" name="descripsion" value="<?= htmlspecialchars($sanpham->descripsion) ?>"></td>
            </tr>
            <tr>
                <th>Số lượng</th>
                <td><input type="number" name="quantity" value="<?= htmlspecialchars($sanpham->quantity) ?>"></td>
            </tr>
        </table>
        <div class="actions">
            <a href="?act=sanpham">Quay lại</a>
            <button type="submit" name="update_sanpham">Cập nhật</button>
        </div>
        <?php if (!empty($loi)): ?>
            <div class="message error"><?= htmlspecialchars($loi) ?></div>
        <?php endif; ?>
        <?php if (!empty($thanhcong)): ?>
            <div class="message success"><?= htmlspecialchars($thanhcong) ?></div>
        <?php endif; ?>
    </form>
</main>
</body>
</html>
