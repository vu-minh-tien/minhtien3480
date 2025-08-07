<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
  
    <style>
        body {
            margin: 0 auto;
            width: 1200px;
        }

        form {
            border: 1px solid transparent;
            padding: 50px;
            width: 400px;
            margin: 100px auto;
            border-radius: 20px;
            box-shadow: 0px 0px 2px 2px rgba(35, 117, 189, 1);
            background-color: #fff;
        }

        h2 {
            text-align: center;
        }

        a {
            margin-left: 140px;
            display: block;
            margin-top: 10px;
            text-align: center;
        }

        input, select {
            width: 250px;
            border-radius: 20px;
            height: 30px;
            padding: 5px 10px;
            border: 1px solid #ccc;
        }

        table td {
            padding: 10px 5px; 
        }

        button {
            margin-left: 130px;
            background: #c82840ff;
            border: none;
            color: white;
            padding: 8px 18px;
            border-radius: 20px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        span {
            color: red;
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form method="POST">
        <h2>Đăng nhập</h2>
        <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input type="email" name="email" required placeholder="Nhập email"></td>
            </tr>

            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" name="password" required placeholder="Nhập mật khẩu"></td>
            </tr>

            <tr>
                <td>Vai trò:</td>
                <td>
                    <select name="role">
                        <option value="1">Khách hàng</option>
                        <option value="0">Người quản trị</option>
                    </select>
                </td>
            </tr>
        </table><br>

        <button type="submit" name="dangnhap">Đăng nhập</button>
        <span><?= $loi ?? '' ?></span>
        <a href="?act=dangky">Đăng ký tài khoản</a>
    </form>
</body>
</html>
