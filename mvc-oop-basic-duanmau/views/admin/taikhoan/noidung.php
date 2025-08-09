<?php require_once __DIR__ . '/../header.php'; ?> 

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Quản lý tài khoản</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f8f9fa;
    }
    .container {
      
       margin: 20px auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    form.search-form {
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }
    form.search-form input[type="text"] {
        width: 300px;
        padding: 8px 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }
    form.search-form button {
        padding: 8px 16px;
        border: none;
        background-color: #007bff;
        color: white;
        border-radius: 4px;
        cursor: pointer;
    }
    form.search-form button:hover {
        background-color: #0056b3;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table thead {
        background-color: #007bff;
        color: white;
    }
    table th, table td {
        padding: 12px 10px;
        border: 1px solid #ddd;
        text-align: center;
    }
    table tr:hover {
        background-color: #f1f1f1;
    }
    a.btn-delete, a.btn-edit {
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        margin: 0 3px;
        display: inline-block;
    }
    a.btn-delete {
        background-color: #dc3545;
    }
    a.btn-delete:hover {
        background-color: #c82333;
    }
    a.btn-edit {
        background-color: #28a745;
    }
    a.btn-edit:hover {
        background-color: #218838;
    }
    .error-msg {
        color: red;
        text-align: center;
        margin-bottom: 15px;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Quản lý tài khoản</h2>

    <!-- Form tìm kiếm -->
    <form action="" method="post" class="search-form">
        <input type="text" name="user" placeholder="Tìm theo email hoặc tên" value="<?php echo isset($_POST['user']) ? htmlspecialchars($_POST['user']) : ''; ?>">
        <button type="submit" name="tim">Tìm kiếm</button>
    </form>

    <!-- Hiển thị lỗi nếu có -->
    <?php if (!empty($err)): ?>
        <div class="error-msg"><?php echo $err; ?></div>
    <?php endif; ?>

    <!-- Bảng danh sách tài khoản -->
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>   <!-- Thêm cột này -->
            <th>Mật khẩu</th>        <!-- Thêm cột này -->
            <th>Quyền</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($danhsach)): ?>
            <?php foreach ($danhsach as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user->id); ?></td>
                <td><?php echo htmlspecialchars($user->name); ?></td>
                <td><?php echo htmlspecialchars($user->email); ?></td>
                <td><?php echo htmlspecialchars($user->number ?? ''); ?></td> <!-- Số điện thoại -->
                <td><?php echo htmlspecialchars($user->password ?? ''); ?></td> <!-- Mật khẩu -->
                <td><?php echo htmlspecialchars($user->role ?? 'user'); ?></td>
                <td>
                    <a href="?act=update_taikhoan&id=<?php echo $user->id; ?>" class="btn-edit">Sửa</a>
                    <a href="?act=delete_taikhoan&id=<?php echo $user->id; ?>" class="btn-delete" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7" style="text-align:center;">Không có tài khoản nào</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</div>

</body>
</html>
