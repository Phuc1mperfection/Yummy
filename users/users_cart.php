
<?php 
session_start();
require_once("../components/connection.php");
if (isset($_SESSION['success_message'])) {
    echo $_SESSION['success_message'];
    unset($_SESSION['success_message']);
  }
$sql="select a.*,b.TenDanhMuc from MonAn a,DanhMuc b where a.MaDanhMuc=b.MaDanhMuc order by MaMonAn asc";
$result=$conn->query($sql) or die($conn->error);
if (!empty($_GET["action"])){
    switch($_GET["action"]){
        case "add":
            if (!empty($_POST["SoLuong"]) && isset($_GET["MaMonAn"])) {
                $MaMonAn = $_GET["MaMonAn"];
                $productByMaMonAn = $conn->query("select * from MonAn where MaMonAn=".$MaMonAn);
                if ($productByMaMonAn->num_rows > 0) {
                    $r = $productByMaMonAn->fetch_assoc();
                    $quantity = $_POST["SoLuong"];
            
                    $itemKey = $r["MaMonAn"]; 
                    if (!isset($_SESSION["cart_item"])) {
                        $_SESSION["cart_item"] = array();
                    }
                    if (isset($_SESSION["cart_item"][$itemKey])) {
                        $_SESSION["cart_item"][$itemKey]["SoLuong"] += $quantity;
                    } else {
                        $_SESSION["cart_item"][$itemKey] = array(
                            "MaMonAn" => $r["MaMonAn"],
                            "TenMonAn" => $r["TenMonAn"],
                            "Gia" => $r["Gia"],
                            "SoLuong" => $quantity,
                            "Anh" => $r["Anh"]
                        );
                    }
                } else {
                    echo "No product found with MaMonAn: $MaMonAn";
                }
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])){
                foreach($_SESSION["cart_item"] as $k=>$v){
                    if ($_GET["MaMonAn"]==$k){
                        unset($_SESSION["cart_item"][$k]);
                    }
                }
                if (empty($_SESSION["cart_item"])) {
                    unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
            case "increase":
                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($_GET["MaMonAn"], array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($_GET["MaMonAn"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["SoLuong"])) {
                                    $_SESSION["cart_item"][$k]["SoLuong"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["SoLuong"]++;
                            }
                        }
                    }
                }
                break;
            case "decrease":
                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($_GET["MaMonAn"], array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($_GET["MaMonAn"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["SoLuong"])) {
                                    $_SESSION["cart_item"][$k]["SoLuong"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["SoLuong"]--;
                                if($_SESSION["cart_item"][$k]["SoLuong"] <= 0) {
                                    unset($_SESSION["cart_item"][$k]);
                                }
                            }
                        }
                    }
                }
                break;
    }
}
?>
<html>
	<head>
		<meta charset="utf-8">
		<link href="../assets/css/cart.css" rel="stylesheet">
		<link href="../assets/css/main.css" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<title>0200366_66PM5_NguyenHongPhuc</title>
	</head>
	<body>
		<style>
        td img.cart_item-image {
            display: block;
            float: left;
        }
		</style>
		<div id="shopping-cart">
			<h2><div class="txt-heading">Giỏ hàng</div></h2>
			<?php 
				$total_quantity = 0;
				$total_price = 0;
			?>
			<table style="width:60%;">
    <tr>
        <th>Tên món</th>
        <th>Mã món ăn</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th width = 10>Remove</th>
    </tr>
    <?php 
        if (!empty($_SESSION["cart_item"])){
            foreach($_SESSION["cart_item"] as $item){
                $item_price = $item["SoLuong"]*$item["Gia"];
    ?>
                <tr valign=middle align="center">
    <td><img width=50px src="../assets/img/menu/<?php echo $item['Anh']; ?>" class="cart_item-image"><?php echo $item['TenMonAn']; ?></td>        
    <td><?php echo $item["MaMonAn"];?></td>
    <td>
        <a href="users_cart.php?action=decrease&MaMonAn=<?php echo $item["MaMonAn"];?>">-</a>
        <?php echo $item["SoLuong"];?>
        <a href="users_cart.php?action=increase&MaMonAn=<?php echo $item["MaMonAn"];?>">+</a>
    </td>
    <td><?php echo number_format($item["Gia"]);?> đ</p></td>
    <td><a href="users_cart.php?action=remove&MaMonAn=<?php echo $item["MaMonAn"];?>" class="remove-item"><i class='fas fa-times fa-2x' style ='color:red; align = center;'></i></a></td>
</tr>
    <?php 
                $total_quantity +=$item["SoLuong"];
                $total_price +=($item["SoLuong"]*$item["Gia"]);
            }
        }
    ?>
    <tr>
        <td colspan=2>Total:</td>
        <td><?php echo $total_quantity?></td>
        <td colspan=2><strong><?php echo number_format($total_price,0)." đ";?></strong></td>
    </tr>
</table>
        </div>
        <div id="product-grid">
            <a id="btnEmpty" href="users_cart.php?action=empty">Empty Cart</a>
            <a id="btnCheckout" href="users_checkout.php">Xác nhận</a>
        </div>
<br>
        <div id="product-grid">
        <div class="txt-heading">Products</div>
        <?php if ($result->num_rows>0){
            while ($r = $result->fetch_assoc()){
        ?>   
           
        <div class=product-item>
        <form method="POST" action="users_cart.php?action=add&MaMonAn=<?php echo $r['MaMonAn']; ?>">     
               <div class="product-image"><img src="../assets/img/menu/<?php echo $r['Anh']; ?>" width="250px" height="250px"></div>          
                <div class="product-tile-footer">
                <div class="product-title"><?php echo $r["MaMonAn"]."-".$r["TenMonAn"];?></div>
                <p class="product-price"><?php echo number_format($r["Gia"]);?> VND</p>
                <div class="cart-action">
                    <input type=text class="product-quantity" name=SoLuong value=1 size=2>
                    <input type=submit value="Add to Cart" class="btnAddAction">
                </div>
            </div>
                </form>
        </div>
            <?php
                }
            }
            ?>
		</div>
	</body>
</html>
