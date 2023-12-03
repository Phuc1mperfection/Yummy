<?php
session_start();
include '../components/header_users.php';
require_once("../components/connection.php");

$sql = "SELECT ctdonhang.MaDonHang, GROUP_CONCAT(monan.TenMonAn SEPARATOR ', ') as TenMonAn, donhang.TenNguoiNhan, donhang.DiaChiNhanHang, donhang.SDT, SUM(ctdonhang.SoLuong * ctdonhang.Gia) as TongTien, donhang.TrangThai
        FROM ctdonhang
        JOIN monan ON ctdonhang.MaMonAn = monan.MaMonAn
        JOIN donhang ON ctdonhang.MaDonHang = donhang.MaDonHang
        GROUP BY ctdonhang.MaDonHang";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<style> table {
        width: 100%;
        border-collapse: collapse;
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
    </style>
<h2>Lịch sử đơn hàng</h2>
<body>
    <style>
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
            margin-top: 100px;
            padding: 0;
            background-color: #ffffff;
        }
    </style>
<?php
if ($result->num_rows > 0) {
?>
    <table width = 100%>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Tên món ăn</th>
            <th>Tên người nhận</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()):?>
        <tr>
        <td><?php echo $row["MaDonHang"]?></td>
            <td><?php echo $row["TenMonAn"]?></td>
            <td><?php echo $row["TenNguoiNhan"]?></td>
            <td><?php echo $row["DiaChiNhanHang"]?></td>
            <td><?php echo $row["SDT"]?></td>
            <td><?php echo number_format($row["TongTien"])?>đ</td>
            <?php $trangThai = $row["TrangThai"];
            $trangThaiText = "";
            if ($trangThai == 0) {
                $trangThaiText = "Đơn hàng mới tạo";
            } elseif ($trangThai == 1) {
                $trangThaiText = "Đơn đã thanh toán";
            } elseif ($trangThai == 2) {
                $trangThaiText = "Đơn đã giao hàng";
            } elseif ($trangThai == 3) {
                $trangThaiText = "Đơn hàng đã huỷ";
            }
            ?>
            <td><?php echo $trangThaiText; ?></td>
            <?php echo "</tr>";?>
        </tr>
        <?php endwhile; ?>
    </table>
<?php
} else {
    echo "Không có thành viên nào.";
}
$conn->close();
?>
</body>
</html>
<div style="position: fixed; bottom: 0; width: 100%;">
    <?php
    include '../components/footer.php';
    ?>
</div>