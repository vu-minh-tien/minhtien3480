<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
    body{
        margin:0 auto;
        width:1200px;

    }
    main{
        margin-left:260px;
        background-color:	#f5f5f5; /* hồng pastel */
        color: #333;
        font-family: 'Segoe UI', sans-serif;    
        padding-bottom:100px;
    }

    input {
        margin-top:20px;
        width:400px;
        height:30px;
        border-radius: 10px;
    }

    button{
        margin-right:150px;
        background-color: rgb(217, 28, 217);
        border-radius: 10px;
        height:30px;
        width:90px;
        margin:20px;
        border:none;
        color:white;
    }
    button:hover{
        background-color: rgba(191, 45, 191, 1);
    }
    td a{
        border:none;    
        margin:20px;
        color:black;
        margin-left:1px;
        border-radius: 10px;
        padding: 3px;
        margin-left:15px;
    }

     </style>
</head>
<body>
    <?php  require_once __DIR__ . '/../header.php';?>
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
                <select name="category_id" id="">
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
            <td><input type="text" name="description" ></td>
        </tr>
        <tr>
            <th>Số lượng</th>
            <td><input type="number" name="quantity"></td>
        </tr>

        <tr>
            <td><a href="?act=<?='quanly_sanpham'?>">quay lại</a></td>
            <td><button  type="submit" name="create_sanpham">Tạo</button></td>
        </tr>

    </table>

    <span style="color:red;"><?= $loi?></span>
    <span style="color:green;"><?= $thanhcong?></span>
    </main>
    
</form>
</body>
</html>