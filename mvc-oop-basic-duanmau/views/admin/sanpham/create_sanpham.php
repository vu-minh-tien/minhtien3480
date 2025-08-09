<?php  require_once __DIR__ . '/../header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f5f5f5;
        color: #333;
    }

    main {
        padding: 40px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  
    display: flex;
        flex-direction: column;
        align-items: center;
    }

    h1 {
        font-size: 28px;
        margin-bottom: 30px;
        color: #d91c1c;
        text-align: center;
    }

    table {
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
        /* width: 100%; */
        width: 400px;
        padding: 10px 15px;
        border-radius: 8px;
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

    button {
        padding: 10px 25px;
        background-color: rgba(224, 14, 14, 1);
        border: none;
        border-radius: 10px;
        color: white;
        font-size: 15px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #a81414;
    }

    td a {
        display: inline-block;
        padding: 8px 16px;
        background-color: #ccc;
        color: black;
        border-radius: 8px;
        text-decoration: none;
        margin-right: 10px;
        transition: background-color 0.3s;
    }

    td a:hover {
        background-color: #aaa;
    }

    span {
        display: block;
        margin-top: 20px;
        font-weight: bold;
    }

    span[style*="color:red"] {
        color: red !important;
    }

    span[style*="color:green"] {
        color: green !important;
    }
</style>

</head>
<body>
   
    <main>
<h1>Trang Create sản phẩm</h1>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <th>Tên sản phẩm</th>
            <td><input type="text" name="name" ></td>
        </tr>
        <tr>
            <th>ảnh</th>
            <td><input type="file" name="anh_sp" ><br>
        </td>
        </tr>
        <tr>
            <th>loại</th>
            <td>
                <select name="idcategory" id="">
                    <option value="">chọn danh mục</option>
                    <?php
                    foreach($danhsach as $tt){
                        ?>
                    <option value="<?=$tt->id?>"><?=$tt->name?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>hot</th>
            <td><input type="number" name="hot" min=1 max=3></td>
        </tr>
        <tr>
            <th>giá</th>
            <td><input type="number" name="price" ></td>
        </tr>
        <tr>
            <th>giảm giá</th>
            <td><input type="number" name="discount"></td>
        </tr>
        <tr>
            <th>Miêu tả</th>
            <td><input type="text" name="descripsion" ></td>
        </tr>
        <tr>
            <th>Số lượng</th>
            <td><input type="number" name="quantity"></td>
        </tr>

        <tr>
            <td><a href="?act=<?='sanpham'?>">quay lại</a></td>
            <td><button  type="submit" name="create_sanpham">Tạo</button></td>
        </tr>

    </table>

    <span style="color:red;"><?= $loi?></span>
    <span style="color:green;"><?= $thanhcong?></span>
    </main>
    
</form>
</body>
</html>