<?php

require_once("../components/connection.php");
$tendangnhap = $_SESSION['tendangnhap'];
$sql = "SELECT * FROM thanhvien WHERE TenDangNhap like '$tendangnhap'";
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
     <table width=50% align=center border=2>
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
      ?>
        <tr>
          <td> <?php echo $rows["Loaiban"]; ?> </td>
          <td> <?php echo $rows["Thoigiandat"] ?> </td>
          <td> <?php echo $rows["Thoigianhenden"] ?> </td>
          <td> <?php
                if(intval($rows["Trangthai"])==1)
                {
                    echo "Đang chờ xác nhận";
                }
                if(intval($rows["Trangthai"])==2)
                {
                    echo "Đã xác nhận";
                }
                if(intval($rows["Trangthai"])==3){
                    echo "Đã hoàn thành";
                }
            }
           ?> </td>
        </tr>
        <?php
         
        ?>

        </table>

        </div>
  
</body>
</html>

