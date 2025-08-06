<?php  require_once __DIR__ . '/../header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
        width:1200px;
        margin:0 auto;
        }
        .content{
            margin-left:300px;
        }
        .right{
            text-align: right;
        }
        table {
            border-collapse: separate;
            border-spacing: 0 12px; /* tạo khoảng cách dọc giữa các <tr> */
            width: 100%;
        }

        th, td {
            padding: 10px 15px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
        button{
            margin:10px 0px; 
            border-radius:20px; height:35px; 
            background-color: rgba(203, 63, 203, 1); 
            color:white; 
            width:60px; 
            border: none;
        }
        button:hover{
        background-color: rgba(169, 57, 169, 1);
        }
    </style>
</head>
<body>
        <div class="content">
            <h1>Sản phẩm</h1>
            <div class="right">
                <a style="border:1px solid black; padding:2px 5px; color:white; background-color: #992fe4; border-radius: 10px; border: none;" href="?act=create_sanpham">Thêm sản phẩm</a><br>

                <form action="" method="post" enctype="multipart/form-data">
                <button style="" type="submit" name="tim">Tìm</button> 
                <input type="text" name="tukhoa" style="margin:10px 0px; border-radius:20px; height:30px; width:250px;">
                <span style="color:red;"> <?=$err?></span>
                </form>

            </div>
            <table>
                <tr>
                    <th>HÌnh ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Khuyến mãi</th>
                    <th>Danh mục </th>
                    <th>Hot</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                </tr>
                    <?php
                    foreach($danhsach as $tt){
                        ?>
                        <tr>
                        <td>
                           
                           <img src="<?= ANH_IMG . $tt->image ?>" alt="ảnh sản phẩm" width="100" height="120">
                        </td>
                        <td><?= $tt->name?></td>
                        <td><?= $tt->price?></td>
                        <td><?= $tt->discount?></td>
                        <td><?= $tt->category_id?></td>
                        <td><?= $tt->hot?></td>
                        <td><?= $tt->quantity?></td>
                        <td>
                            <a style="color:black;" href="?act=update_sanpham&id=<?=$tt->id?>">Sửa /</a>
                            <a style="color:black;" href="?act=delete_sanpham&id=<?=$tt->id?>" onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này không?')">Xoá</a>
                        </td>
                        </tr>
                        <?php
                    }
                    ?>
            </table>
            </div>
</body>
</html>