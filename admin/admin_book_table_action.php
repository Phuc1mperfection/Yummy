<?php
    require_once("../components/connection.php");
        $MaDatBan = $_GET["MaDatBan"]; 
        $trangthai=$_GET["trangthai"];
        $sql1 = "select * from datban, ban, thanhvien where datban.Maban = ban.Maban and datban.MaThanhVien=thanhvien.MaThanhVien and MaDatBan=$MaDatBan";
        $result = $conn->query($sql1);
        $rows = $result->fetch_assoc();

        $tt = intval($rows["Trangthai"]);
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="admin_book_table_action2.php?trangthai=<?php echo $trangthai?>">
       <center> <table border=1>
            <tr>
                <td>Tài khoản</td>
                <td> <?php echo $rows["TenDangNhap"]; ?> </td>
            </tr>
            <tr>
                <td>Tên khách hàng</td>
                <td> <?php echo $rows["HoTen"]; ?> </td>
            </tr>
            <tr>
                <td>Loại bàn</td>
                <td> <?php echo $rows["Loaiban"]; ?> </td>
            </tr>
            <tr>
                <td>Thời gian đặt</td>
                <td> <?php echo $rows["ThoiGianDat"] ?> </td>
            </tr>
            <tr>
                <td>Thời gian hẹn đến</td>
                <td> <?php echo $rows["Thoigianhenden"] ?> </td>
            </tr>
            <tr>
                <td>Trạng thái</td>
             <?php
                if($tt==1)
                {
                    echo  "<td>Đang chờ xác nhận </td>";
                }
                else if($tt==2)
                {
                    echo "<td>Đã xác nhận</td>";
                }
                else{
                    echo "<td>Đã hoàn thành</td>";
                }
        
           ?>  
                      </tr>
            <tr>
                <input type="submit" value="Xác nhận">
                <input type="hidden" name=MaDatBan value=<?php echo $MaDatBan; ?>>
            </tr>
        </table>   
            </center> 
    </form>
</body>
</html>
    
