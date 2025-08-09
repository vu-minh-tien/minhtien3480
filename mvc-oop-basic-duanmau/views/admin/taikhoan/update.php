<?php require_once __DIR__ . '/../header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .container {
    max-width: 700px;
    margin: 20px auto;
    background: #fff;
    padding: 30px 40px;
    border-radius: 8px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
}

.container h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
    font-weight: 600;
}

form {
    margin-bottom: 40px;
}

form div {
    margin-bottom: 18px;
}

label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #555;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
    border-color: #28a745; /* Xanh lá cho cập nhật, hoặc đổi màu nếu cần */
    outline: none;
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
}

button {
    display: inline-block;
    padding: 12px 25px;
    border-radius: 6px;
    border: none;
    font-size: 16px;
    cursor: pointer;
    font-weight: 600;
    transition: background-color 0.3s ease;
}

button[name="update_info"] {
    background-color: #28a745;
    color: #fff;
}

button[name="update_info"]:hover {
    background-color: #218838;
}

button[name="change_password"] {
    background-color: #007bff;
    color: #fff;
}

button[name="change_password"]:hover {
    background-color: #0056b3;
}

p {
    font-weight: 600;
    margin-bottom: 20px;
}

p[style*="color:red"] {
    color: #dc3545;
}

p[style*="color:green"] {
    color: #28a745;
}
   </style>
</head>
<body>
    <div class="container" style="max-width:700px; margin:20px auto; background:#fff; padding:20px; border-radius:8px;">
    <h2>Cập nhật thông tin khách hàng</h2>

    <?php if ($loi): ?>
        <p style="color:red;"><?= htmlspecialchars($loi) ?></p>
    <?php elseif ($thanhcong): ?>
        <p style="color:green;"><?= htmlspecialchars($thanhcong) ?></p>
    <?php endif; ?>

    <form action="" method="post" style="margin-bottom: 40px;">
        <div>
            <label>Tên:</label><br>
            <input type="text" name="name" value="<?= htmlspecialchars($user->name) ?>" required style="width:100%; padding:8px;">
        </div>
        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="<?= htmlspecialchars($user->email) ?>" required style="width:100%; padding:8px;">
        </div>
        <div>
            <label>Số điện thoại:</label><br>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($user->phone ?? '') ?>"placeholder="Nhập số điện thoại mới" required style="width:100%; padding:8px;">

        </div>
        <button type="submit" name="update_info" style="margin-top: 15px; padding:10px 20px; background:#28a745; color:#fff; border:none; border-radius:5px;">Cập nhật thông tin</button>
    </form>

    <h2>Đổi mật khẩu</h2>
    <form action="" method="post">
        <div>
            <label>Mật khẩu cũ:</label><br>
           <input type="text" name="password_old" value="<?= htmlspecialchars($user->password) ?>" required style="width:100%; padding:8px;" >
        <div>
            <label>Mật khẩu mới:</label><br>
            <input type="password" name="password_new" required style="width:100%; padding:8px;"placeholder=" Mật khẩu mới ">
        </div>
        <div>
            <label>Xác nhận mật khẩu mới:</label><br>
            <input type="password" name="password_confirm" required style="width:100%; padding:8px;"placeholder="Nhập lại mật khẩu mới ">
        </div>
        <button type="submit" name="change_password" style="margin-top: 15px; padding:10px 20px; background:#007bff; color:#fff; border:none; border-radius:5px;">Đổi mật khẩu</button>
    </form>
</div>

</body>
</html>
