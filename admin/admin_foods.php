<?php
require_once("../components/connection.php");
if (!isset($_SESSION["foods_error"])) {
    $_SESSION["foods_error"] = "";
}
$result = $conn->query("SELECT * FROM monan order by MaMonAn desc");
?>

<html>

<head>
    <meta charset="UTF_8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
    </style>
    <h1>Món ăn</h1>
    <center>
        <font color=red>
            <?php
            echo $_SESSION["foods_error"];
            ?>
        </font>
        <a href="admin_home.php?page=admin_foods_add" style="
        display: inline-block;
        padding: 10px 20px;
        color: white;
        background-color: #4CAF50;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
    ">Thêm mới món ăn</a>
    </center>

    <form method="POST" style="text-align: center;">
        <table width=90%>
            <tr style="text-align: center;">
                <th width=10% style="text-align: center;">Mã món ăn</th>
                <th width=10%>Tên món ăn</th>
                <th width=10%>Giá</th>
                <th width=26%>Thông tin món ăn</th>
                <th>Trạng thái</th>
                <th style="text-align: center;">Ảnh</th>
                <th>Mã danh mục</th>
                <th> Hành động </th>
                <?php
                $sql = "SELECT * FROM monan as pr inner join danhmuc as cg where pr.MaDanhMuc = cg.MaDanhMuc;";
                $result = $conn->query($sql) or die("Can't get recordset");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
            <tr>
                <td><?php echo $row["MaMonAn"]; ?></td>
                <td><?php echo $row["TenMonAn"]; ?></td>
                <td><?php echo number_format($row["Gia"], 0, '.', ',') . ' VND'; ?></td>
                <td><?php echo $row["ThongTinMonAn"]; ?></td>
                <td>
                    <?php
                        if ($row["TrangThai"] == 1) {
                            echo '<i class="fas fa-check" style="color: green;"></i>'; // FontAwesome check icon for "Còn"
                        } else {
                            echo '<i class="fas fa-times" style="color: blue;"></i>'; // FontAwesome times icon for "Hết"
                        }
                    ?>
                </td>
                <td><img width="300" src="../assets/img/menu/<?php echo $row["Anh"]; ?>"></td>
                <td><a href="admin_home.php?page=admin_foods_edit&MaMonAn=<?php echo $row["MaMonAn"]; ?>" class="btn btn-primary">Sửa</a></td>
                <td><a onclick="return confirm('Are you sure delete <?php echo $row["TenMonAn"]; ?>?');" href="admin_foods_delete.php?MaMonAn=<?php echo $row["MaMonAn"]; ?>" class="btn btn-danger">Xóa</a></td>
            </tr>
    <?php
                    }
                } else {
                    echo "<tr><td colspan=7>Tap ket qua rong</td></tr>";
                }
                $conn->close();
                unset($_SESSION["foods_error"]);
    ?>
    <tr>
    </tr>
        </table>
    </form>

</body>

</html>