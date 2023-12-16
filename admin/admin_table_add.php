<?php

if(!isset($_SESSION["admin_add_table"]))
{
    $_SESSION["admin_add_table"]="";
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
        a{
            text-decoration: none;
        }
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
  <div style="margin-right:170px; color:white;">
     <center> <h2> THÊM BÀN CỬA HÀNG</h2> </center>

     <center> <font color:pink> <?php echo $_SESSION["admin_add_table"] ?> </font></center>
     <br>
     <form method="POST" action="admin_table_add_action.php">
     <table align=center border=1>
        <tr>
            <td>Loại bàn</td>
            <td> <input type="text" name=txtloaiban> </td>
        </tr>

        <tr>
            <td>Ghi chú</td>
            <td> <input type="text" name=txtghichu> </td>
        </tr>

        <tr>
            <td>Ảnh bàn</td>
            <td> <input type="text" name=txtanhban> </td>
    </tr>
    <tr>
            <td>Số lượng</td>
            <td> <input type="text" name=txtsoluong> </td>

        </tr>
        <tr>
            
            <td><input type="reset" value= "Làm mới"></td>
            <td> <input type="submit" value="Thêm mới"> </td>
        </tr>
    </table>
    </form>

        </div>

  
</body>
</html>

