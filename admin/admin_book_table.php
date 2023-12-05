<?php

if(!isset($_SESSION["admin_book_table"]))
{
    $_SESSION["admin_book_table"]="";
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
        width: 100%;
        border-collapse: collapse;
    }
    th {
        background-color: #af634c;
        color: white;
        padding: 15px;
    }
    tr {
    transition: background-color 0.3s ease;
}
    tr:hover {background-color: #666362;}
            
          table {
  width: 80%;
  margin: 20px auto;
  font-size:20px;
    text-align: center;}

      th, td {
        border: 2px solid #ddd;
        padding: 10px;
        text-align: center;
      }

      th {
        background-color: #af634c;
        color: white;
      }

      img {
        max-width: 100%;
        height: auto;
      }
      body{
        background-color: #f2f2f2;
      }
      /* Để làm cho ảnh có góc bo tròn */
      img {
        border-radius: 5px;
      }
</style>
    </style>
  <div style="margin-right:170px; color:white;">
      <h2> Thành viên đặt bàn</h2> 

     <center> <font color:pink> <?php echo $_SESSION["admin_book_table"] ?> </font></center>
     <br>
     <table width=100% align=center border = 1>
      <tr>
        <th width= 10%>Tài khoản</th>
        <th>Tên khách hàng</th>
        <th>Loại bàn</th>
        <th>Thời gian đặt</th>
        <th>Thời gian hẹn đến</th>
        <th>Trạng thái</th>
        <th>Xem chi tiết->xác nhận</th>
      </tr>

      <?php
        $sql1 = "select * from datban, ban, thanhvien where datban.MaBan = ban.MaBan and datban.MaThanhVien=thanhvien.MaThanhVien order by ThoiGianDat desc";
         $result = $conn->query($sql1);
         while($rows = $result->fetch_assoc())
         {
      ?>
        <tr>
        <td> <?php echo $rows["TenDangNhap"]; ?> </td>
        <td> <?php echo $rows["HoTen"]; ?> </td>
          <td> <?php echo $rows["LoaiBan"]; ?> </td>
          <td> <?php echo $rows["ThoiGianDat"] ?> </td>
          <td> <?php echo $rows["ThoiGianHenDen"] ?> </td>
          <td> <?php

                if(($rows["TrangThai"])=="1")
                {
                 
                    echo "Đang chờ xác nhận";

                }
                if(($rows["TrangThai"])=="2")
                {
                    
                    echo "Đã xác nhận";

                }
                if(($rows["TrangThai"])=="3") {
                    echo "Đã hoàn thành";
                }
        
           ?> </td>

           <td>
                <?php
                    if($rows["TrangThai"]=="1")
                    {
                        echo "<a href='admin_book_table_action.php?trangthai=2&MaDatBan=".$rows["MaDatBan"]."'> <button  type='button' class='btn btn-primary' > Xác nhận Đơn đặt </button> </a> ";
                    }
                    else if($rows["TrangThai"]=="2")
                    {
                        echo "<a href='admin_book_table_action.php?trangthai=3&MaDatBan=".$rows["MaDatBan"]."'> <button  type='button' class='btn btn-primary' > Xác nhận hoàn thành </button> </a> ";
                        
                    }
                    else{
                        echo " Đã xác nhận ";
                    }
                ?>
           </td>
        </tr>
        <?php
        }
        ?>

        </table>

        </div>

  
</body>
</html>

