<?php


if(!isset($_SESSION["book_table"]))
{
  $_SESSION["book_table"]="";
}
require_once("../components/connection.php");
$tendangnhap = $_SESSION['tendangnhap'];
$sql = "SELECT * FROM thanhvien WHERE TenDangNhap like '$tendangnhap'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();
$matv = $rows['MaThanhVien'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/main.css" rel="stylesheet">
    <title>Document</title>

    <script>
    // Kiểm tra nếu URL chứa tham số 'success' (có thể điều chỉnh tùy theo cách bạn xử lý redirection)
    if (window.location.search.includes('success')) {
        // Hiển thị thông báo alert khi trang được tải
        window.onload = function () {
            alert("Đặt bàn thành công!");
        };
    }
</script>
</head>
<body>
  <div style="margin-right:170px; color:white;">
     <center> <h2>MỜI QUÝ KHÁCH ĐẶT BÀN</h2> </center>
     <center> <a href="users_home.php?page=users_book_table_history"> <h5 style="color:aqua;">Lịch sử đặt bàn</h5> </a> </center>
     <center> <font color:pink> <?php echo $_SESSION["book_table"] ?> </font></center>
     <br>
     <form method=POST action="users_book_table_action.php?matv=<?php echo $matv ?>">
        <center> <h5>Loại bàn: 
          <select name="slloaiban" id="">
            <?php
              $sql1 = "select * from ban";
              $result = $conn->query($sql1);
              while($rows = $result->fetch_assoc())
              {
            ?>
              <option value="<?php echo $rows['Loaiban']; ?>"> <?php echo $rows['Loaiban']; ?> </option>
              <?php
              }
              ?>
          </select>
        
          &nbsp &nbsp

        Thời gian hẹn đến:
          <input type="datetime-local" name="thoigianhenden">
          &nbsp &nbsp
          <input type="submit" style="background-color:aqua; border:none; border-radius:10px; width:150px; height:35px;" value="Xác nhận đặt">
            </h5> </center>
     </form>

     <br>
     <br>

     <center><h4>Danh sách các bàn ở cửa hàng chúng tôi</h4></center>
     <table width=50% align=center border=2>
      <tr>
        <th>Loại bàn</th>
        <th>Ảnh</th>
        <th>Số lượng trống</th>
      </tr>

      <?php
         $result = $conn->query($sql1);
         while($rows = $result->fetch_assoc())
         {
      ?>
        <tr>
          <td> <?php echo $rows["Loaiban"]; ?> </td>
          <td> <img src='../assets/img/bannh/<?php echo $rows["Anhban"] ?>' width=250 alt=""> </td>
          <td> <?php echo $rows["Soluongconlai"] ?> </td>
        </tr>
        <?php
         }
        ?>

        </table>

        </div>
  
</body>
</html>

<?php
  unset($_SESSION["book_table"]);
?>