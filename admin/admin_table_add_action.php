<?php
     session_start();
     require_once("../components/connection.php");
     $loaiban=$_POST["txtloaiban"];
     $ghichu=$_POST["txtghichu"];
     $anhban = $_POST["txtanhban"];
     $soluong = $_POST["txtsoluong"];
     $sql="select * From ban where loaiban like '$loaiban'";
    $result = $conn->query($sql);
	if ($result->num_rows>0){
		$_SESSION["admin_add_table"]="Tên loại bàn $loaiban đã có rồi";
        header("Location:admin_home.php?page=admin_table_add.php");
    }
    else 
		$sql = "insert into ban(loaiban,ghichu,anhban,soluong,soluongconlai) values ('$loaiban','$ghichu','$anhban',$soluong,$soluong)";
     
        
        $conn->query($sql) or die($conn->error);
        if($conn->connect_error=="")
        {
            echo "<script>
    alert('Thêm bàn thành công!');
    setTimeout(function() {
        window.location.replace('admin_home.php?page=admin_table');
    }, 1);
 </script>";
        }

        else{
		    $_SESSION["admin_add_table"] = "Lỗi khi thêm dữ liệu";
		    header("Location:admin_home.php?page=admin_table_add.php");
        }
        $conn->close();

?>