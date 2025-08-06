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
            border-spacing: 0 12px; 
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
            background-color: rgba(201, 43, 201, 1);
            color:white;
            border-radius:20px;
            width:70px;
            height:35px;
        }
        button:hover{
            background-color: rgba(180, 59, 180, 1);
        }
    </style>
</head>
<body>
  
    <div class="content">
        <?php $thongbao=""; ?>
        
    <h1>Trang quản lý danh mục</h1>
        <form action=""method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>Tên danh mục</th>
                    <td><input type="text" name="name_danhmuc" style="height:30px; width:200px;border-radius:20px;">
                    <button style="border: none;" tpye="submit" name="create_danhmuc">Tạo</button>
                    <span style="color:green;"><?=$thanhcong?></span>
                    <span style="color:red;"><?=$loi?></span>
                    </td></tr>
            </table>
        </form>

    <table>
        <span><?=$thongbao?></span>
        <tr>
            <th>danh mục</th>
            <th>Số lượng</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>

        </tr>
        <?php
        foreach($danhsach as $ds){
            ?>
            <tr>
                <td><?=$ds->name?></td>
                <td><?=$ds->sum?></td>
                <td><?=$ds->date?></td>
                <td>
                <a style="color:black;" href="?act=update_danhmuc&id=<?=$ds->id?>">Sửa / </a>
                <a style="color:black;" href="?act=delete_danhmuc&id=<?=$ds->id?>" onclick="return confirm('Bạn có chắc là muốn xóa không?')">Xóa</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>
</body>
</html>