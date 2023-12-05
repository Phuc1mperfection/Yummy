<?php
require_once("../components/connection.php");

$sql = "SELECT ctdonhang.MaDonHang, GROUP_CONCAT(monan.TenMonAn SEPARATOR ', ') as TenMonAn, donhang.TenNguoiNhan, donhang.DiaChiNhanHang, donhang.SDT, SUM(ctdonhang.SoLuong * ctdonhang.Gia) as TongTien,donhang.NgayDatHang, donhang.TrangThai
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
        font-size: 22px;
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
<h2>Quản lý đơn hàng</h2>
<body>
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
            <th>Ngày đặt</th>
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
            <td><?php echo date('m-d-Y', strtotime($row["NgayDatHang"])) ?></td>
                <?php $trangThai = $row["TrangThai"];
            $trangThaiText = "";
            if ($trangThai == 0) {
                $trangThaiText = "Đơn hàng mới tạo";
            } elseif ($trangThai == 1) {
                $trangThaiText = "Đơn hàng đang được chuẩn bị";
            } elseif ($trangThai == 2) {
                $trangThaiText = "Đơn hàng đang trên đường giao đến bạn";
            } elseif ($trangThai == 3) {
                $trangThaiText = "Đơn hàng đã đến tay bạn";
            } elseif ($trangThai == 4) {
                $trangThaiText = "Đơn hàng đã bị huỷ";
            }
            ?>
            <td><?php echo $trangThaiText; ?></td>
            <?php echo "</tr>";?>
        </tr>
        <?php endwhile; ?>
    </table>
<?php
} else {
    echo "Bạn đã đặt đơn nào đâu !!!";
}
$conn->close();
?>
</body>
</html>
    </div>
</div>