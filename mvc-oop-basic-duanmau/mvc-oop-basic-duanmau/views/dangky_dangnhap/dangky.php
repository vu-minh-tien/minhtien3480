<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đăng ký</title>
    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(to right, #4facfe, #00f2fe);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

form {
    background: #fff;
    border-radius: 20px;
    padding: 30px 40px;
    width: 420px;
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
    animation: fadeIn 0.6s ease-in-out;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

table {
    width: 100%;
}

td {
    padding: 10px 0;
    font-weight: bold;
    color: #555;
}

input {
    width: 100%;
    height: 38px;
    padding: 5px 12px;
    border: 1px solid #ccc;
    border-radius: 20px;
    outline: none;
    transition: border-color 0.3s ease;
}

input:focus {
    border-color: #4facfe;
}

button {
    width: 100%;
    background: #4facfe;
    border: none;
    color: white;
    padding: 10px 0;
    border-radius: 20px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: background 0.3s ease, transform 0.2s ease;
    margin-top: 10px;
}

button:hover {
    background: #00c6ff;
    transform: scale(1.03);
}

a {
    display: block;
    margin-top: 15px;
    text-align: center;
    text-decoration: none;
    color: #4facfe;
    font-weight: 500;
    transition: color 0.3s ease;
}

a:hover {
    color: #00c6ff;
}

span {
    display: block;
    text-align: center;
    margin-top: 10px;
}

/* Hiệu ứng load */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
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
