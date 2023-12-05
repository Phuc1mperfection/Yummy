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
  <div style="margin-right:170px; color:white;">
     <center> <h2> DANH SÁCH ĐƠN ĐẶT BÀN CỦA KHÁCH HÀNG</h2> </center>

     <center> <font color:pink> <?php echo $_SESSION["admin_book_table"] ?> </font></center>
     <br>
     <table width=80% align=center border=2>
      <tr>
        <th>Tài khoản</th>
        <th>Tên khách hàng</th>
        <th>Loại bàn</th>
        <th>Thời gian đặt</th>
        <th>Thời gian hẹn đến</th>
        <th>Trạng thái</th>
        <th>Xem chi tiết</th>
      </tr>

      <?php
        $sql1 = "select * from datban, ban, thanhvien where datban.Maban = ban.Maban and datban.MaThanhVien=thanhvien.MaThanhVien";
         $result = $conn->query($sql1);
         while($rows = $result->fetch_assoc())
         {
      ?>
        <tr>
        <td> <?php echo $rows["TenDangNhap"]; ?> </td>
        <td> <?php echo $rows["HoTen"]; ?> </td>
          <td> <?php echo $rows["Loaiban"]; ?> </td>
          <td> <?php echo $rows["ThoiGianDat"] ?> </td>
          <td> <?php echo $rows["Thoigianhenden"] ?> </td>
          <td> <?php
                if(($rows["TrangThai"])==1)
                {
                 
                    echo "Đang chờ xác nhận";

                }
                else if(($rows["TrangThai"])==2)
                {
                    
                    echo "Đã xác nhận";

                }
                else if(($rows["Trangthai"])=="3") {
                    echo "Đã hoàn thành";
                }
        
           ?> </td>

           <td>
                <?php
                    if(intval($rows["Trangthai"])=="1")
                    {
                        echo "<a href='admin_book_table_action.php?trangthai=2&MaDatBan=".$rows["MaDatBan"]."'> <button> Xác nhận </button> </a> ";
                    }
                    else if(intval($rows["Trangthai"])=="2")
                    {
                        echo "<a href='admin_book_table_action.php?trangthai=3&MaDatBan=".$rows["MaDatBan"]."'> <button> Xác nhận </button> </a> ";
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

