<?php
session_start();
include '../components/header_users.php';
require_once("../components/connection.php");
$tendangnhap = $_SESSION["tendangnhap"];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../assets/css/main.css" rel="stylesheet">
    <title>Document</title>

    <style>
      
      table {
        width: 100%;
        border-collapse: collapse;
        padding-left: 100px;
        margin-left: 100px;
    }
    th {
        background-color: #af634c;
        color: white;
        padding: 15px;
    }
    td {
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }
    tr:hover {background-color: #f5f5f5;}
    h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: black;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        body{
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }
    </style>

</script>
</head>
<body>
  <br> <br> <br> <br>
  <div style="margin-right:170px; color:black;">
     <center> <h3 style="font-weight:bold;">Lịch sử đặt bàn của <?php echo $tentv; ?></h3> </center>
     <br>
     <table width=100% align=center border=1>
      <tr>
        <th>Loại bàn</th>
        <th>Thời gian đặt</th>
        <th>Thời gian hẹn đến</th>
        <th>Trạng thái</th>
      </tr>

      <?php
            $sql1 = "select * from datban, ban where datban.MaBan = ban.MaBan and MaThanhVien=$matv";
         $result = $conn->query($sql1);
         while($rows = $result->fetch_assoc())
         {

          
      ?>
        <tr>
          <td> <?php echo $rows["LoaiBan"]; ?> </td>
          <td> <?php echo $rows["ThoiGianDat"]; ?> </td>
          <td> <?php echo $rows["ThoiGianHenDen"]; ?> </td>
          <td> <?php
               if($rows["TrangThai"]=="1")
               {
                
                   echo "Đang chờ xác nhận";

               }
               if($rows["TrangThai"]=="2")
               {
                   
                   echo "Đã xác nhận";

               }
               if($rows["TrangThai"]=="3") {
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

