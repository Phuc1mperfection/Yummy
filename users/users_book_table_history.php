<?php

require_once("../components/connection.php");
$sql = "SELECT * FROM thanhvien ";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();
$matv = intval($rows['MaThanhVien']);
$tentv = $rows['HoTen'];


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
     <center> <h2>LỊCH SỬ ĐẶT BÀN CỦA QUÝ KHÁCH <?php echo $tentv; ?></h2> </center>
     <br>
     <table width=70% align=center border=2>
      <tr>
        <th>Loại bàn</th>
        <th>Thời gian đặt</th>
        <th>Thời gian hẹn đến</th>
        <th>Trạng thái</th>
      </tr>

      <?php
            $sql1 = "select * from datban, ban where datban.Maban = ban.Maban and MaThanhVien=$matv";
         $result = $conn->query($sql1);
         while($rows = $result->fetch_assoc())
         {
          $rows["Trangthai"] = strval($rows["Trangthai"]);
      ?>
        <tr>
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
               else if(($rows["TrangThai"])==3) {
                   echo "Đã hoàn thành";
               }
           ?> </td>
        </tr>
        <?php
         }
        ?>

        </table>

        </div>
  
</body>
</html>

