
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            width: 1200px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        main {
            margin-left: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        h1 {
            margin: 0px;
            font-size: 24px;
            color: #333;
        }

        form {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
            width: 100%;
        }

        button {
            padding: 10px 20px;
            background-color: rgb(217, 28, 217);
            border: none;
            border-radius: 20px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 10px;
            width: fit-content;
        }

        button:hover {
            background-color: rgba(183, 54, 183, 1);
        }

        a {
            color: #007bff;
            text-decoration: none;
            margin-bottom: 10px;
        }


    </style>
</head>
<body>
    <main>
<h1>Trang update danh mục</h1>
<form action="" method="post" enctype="multipart/form-data">
 <label for="">Tên danh mục</label> <br>
 <input type="text" name="name_danhmuc" value="<?= $ten_danhmuc_cu->name?>">
 <button type="submit" name="update_danhmuc">sửa</button>
 <a style="color:black;" href="?act=danhmuc">Quay lại</a>
 <span style="color:green;"> <?=$thanhcong?></span>
 <span style="color:red;"> <?=$loi?></span>
</form>
</main>
</body>
</html>