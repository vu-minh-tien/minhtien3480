<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    

    body {
        width: 100%;
        /* max-width: 1200px; */
    
        font-family: Arial, sans-serif;
        background-color: #f5f6fa;
        color: #333;
        /* padding: 30px 15px; */
    }

    /* Khối nội dung chính */
    .content {
        width: 100%;
        /* max-width: 900px; */
        background-color: #fff;
        /* margin: 0 auto; */
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .content h1 {
        font-size: 28px;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    /* Form tìm kiếm */
    form {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        align-items: center;
    }

    form input[type="text"] {
        flex: 1;
        padding: 10px 15px;
        border-radius: 20px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    form button {
        padding: 10px 20px;
        border-radius: 20px;
        border: none;
        background-color: #d91c1c;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form button:hover {
        background-color: #b71616;
    }

    span {
        font-weight: bold;
        color: red;
        margin-left: 10px;
    }

    /* Bảng dữ liệu */
    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
    }

    table th, table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #ecf0f1;
        color: #2c3e50;
        font-weight: bold;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    table td a {
        text-decoration: none;
        color: #2980b9;
        margin-right: 10px;
        transition: color 0.2s ease;
    }

    table td a:hover {
        text-decoration: underline;
        color: #1c5980;
    }
</style>
</head>
<body>
    <?php  require_once __DIR__ . '/../header.php';?>
    <div class="content">
    <h1>Trang quản lý tài khoản</h1>
            <form action=""method="post" enctype ="multipart/form-data">
            <button type="submit" name="tim">Tìm</button> <input type="text" name="user" style="border-radius:20px;">
            <span style="color:red;"> <?=$err?></span>
        </form>
    <table border="1">
        <tr>
            <th>Tên </th>
            <th>email</th>
            <th>Điện thoại</th>
            <th>role</th>
            <th>Hành động</th>
        </tr>
        <?php
        foreach($danhsach as $tt){
            ?>
            <tr>
                <td><?=$tt->name?></td>
                <td><?=$tt->email?></td>
                <td><?=$tt->number?></td>
                <td><?=$tt->role?></td>
                <td>
                    <a style="color:black;" href="">Xem chi tiết / </a>
                    <a style="color:black;" href="">Khóa</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>
</body>
</html>