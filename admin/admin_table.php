<?php

if(!isset($_SESSION["admin_table"]))
{
    $_SESSION["admin_table"]="";
}
require_once("../components/connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/main.css" rel="stylesheet">
    <title>Document</title>

</script>
</head>
<body>
    <style>
       table {
            width: 80%;
            margin: 20px auto;
            font-size: 20px;
            text-align: center;
        }

        th,
        td {
            border: 2px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #af634c;
            color: white;
            font-size: 22px;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        body {
            background-color: #f2f2f2;
        }

        /* Để làm cho ảnh có góc bo tròn */
        img {
            border-radius: 5px;
        }

        tr:hover {
            background-color: grey;
        }

        tr {
            transition: background-color 0.3s ease;
        }
        a{
            text-decoration: none;
        }
    </style>
  <div style="margin-right:170px; color:white;">
     <center> <h2> DANH SÁCH BÀN CỦA CỬA HÀNG</h2> </center>
     <center>
    <a href="admin_home.php?page=admin_table_add" style="
        display: inline-block;
        padding: 10px 20px;
        color: white;
        background-color: #4CAF50;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
    ">Thêm một bàn mới</a></center>	

     <center> <font color:pink> <?php echo $_SESSION["admin_table"] ?> </font></center>
     <br>
     <table width=90% align=center border=1>
      <tr>
        <th>Mã bàn</th>
        <th>Loại bàn</th>
        <th>Ghi chú</th>
        <th>Hình minh họa</th>
        <th>Số lượng</th>
        <th>Số lượng còn lại</th>
       
        <th>Cập nhật</th>
        <th>Xóa</th>
      </tr>

      <?php
        $sql1 = "select * from ban";
         $result = $conn->query($sql1);
         while($rows = $result->fetch_assoc())
         {
      ?>
        <tr>
        <td> <?php echo $rows["MaBan"]; ?> </td>
        <td> <?php echo $rows["LoaiBan"]; ?> </td>
          <td> <?php echo $rows["GhiChu"]; ?> </td>
          <td> <img width=200 src='../assets/img/bannh/<?php echo $rows["AnhBan"] ?>'> </td>
          <td> <?php echo $rows["SoLuong"] ?> </td>
          <td> <?php echo $rows["SoLuongConLai"] ?> </td>
      
          <td><button type="button" class="btn btn-primary" onclick="window.location.href='admin_home.php?page=admin_table_edit&MaBan=<?php echo $rows['MaBan']; ?>'">Cập nhật</button> </td>
        <td><button type="button" class="btn btn-danger" onclick="if(confirm('Bạn chắc chưa?')) window.location.href='admin_table_delete.php?MaBan=<?php echo $rows['MaBan']; ?>'">Xóa</button> </td>    

        </tr>
        <?php
        }
        ?>

        </table>

        </div>

  
</body>
</html>

