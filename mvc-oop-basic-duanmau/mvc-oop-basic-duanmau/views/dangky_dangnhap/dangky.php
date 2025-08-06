<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đăng ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 20px;
            background: #f9f9f9;
        }
        table {
            width: 100%;
        }
        td {
            padding: 8px;
        }
        input {
            width: 100%;
            padding: 6px;
        }
        button {
            padding: 10px 15px;
            background-color: #c82840ff;
            color: white;
            border: none;
            border-radius: 5px;
            }
    </style>
</head>
<body>
    <form method="POST">
        <h2>Đăng ký</h2>
        <table>
            <tr>
                <td>Tên:</td>
                <td><input type="text" name="name" required placeholder="Nhập tên người dùng"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" required placeholder="Nhập email"></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" name="password" required placeholder="Nhập mật khẩu"></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="text" name="address" required placeholder="Nhập địa chỉ" minlength="10" maxlength="100"></td>
            </tr>
            <tr>
                <td>SDT:</td>
                <td><input type="text" name="number" required placeholder="Nhập số điện thoại" pattern="[0-9]{10}" title="Số điện thoại phải gồm 10 chữ số"></td>
            </tr>
        </table>
        <br>
        <button type="submit" name="dangky">Đăng ký</button>
        <br><br>
        <span style="color:red;"> <?= $loi ?? '' ?></span>
        <span style="color:green;"> <?= $thanhcong ?? '' ?></span>
        <br><br> 
        <a href="?act=dangnhap">Đăng nhập</a>
    </form>
</body>
</html>
