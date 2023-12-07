<?php
require_once("../components/connection.php");
$MaDatBan = $_GET["MaDatBan"];
$trangthai = $_GET["trangthai"];
$sql1 = "select * from datban, ban, thanhvien where datban.MaBan = ban.MaBan and datban.MaThanhVien=thanhvien.MaThanhVien and MaDatBan=$MaDatBan";
$result = $conn->query($sql1);
$rows = $result->fetch_assoc();


$tt = intval($rows["TrangThai"]);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            margin: 20px auto;
            width: 60%;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form method="POST" action="admin_book_table_action2.php?trangthai=<?php echo $trangthai ?>">
        <center>
            <table border=1>
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
                    <td> <?php echo $rows["LoaiBan"]; ?> </td>
                </tr>
                <tr>
                    <td>Thời gian đặt</td>
                    <td> <?php echo $rows["ThoiGianDat"] ?> </td>
                </tr>
                <tr>
                    <td>Thời gian hẹn đến</td>
                    <td> <?php echo $rows["ThoiGianHenDen"] ?> </td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <?php
                    if ($tt == 1) {
                        echo  "<td>Đang chờ xác nhận </td>";
                    } else if ($tt == 2) {
                        echo "<td>Đã xác nhận</td>";
                    } else {
                        echo "<td>Đã hoàn thành</td>";
                    }

                    ?>
                </tr>
                <tr>
                    <?php
                    if ($trangthai == "2") {
                        echo "<input type='submit' value='Xác nhận Đơn đặt'>";
                    }
                    if ($trangthai == "3") {
                        echo "<input type='submit' value='Xác nhận Đơn đã hoàn thành'>";
                    }
                    ?>
                    <input type="hidden" name=MaDatBan value=<?php echo $MaDatBan; ?>>
                </tr>
            </table>
        </center>
    </form>
</body>

</html>