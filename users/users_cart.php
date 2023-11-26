<?php 
require_once("../components/connection.php");
$sql="select a.*,b.TenDanhMuc from MonAn a,DanhMuc b where a.MaDanhMuc=b.MaDanhMuc order by MaMonAn asc";
$result=$conn->query($sql) or die($conn->error);
if (!empty($_GET["action"])){
    switch($_GET["action"]){
        case "add":
            if (!empty($_POST["quantity"])) {
                $MaMonAn = $_GET["MaMonAn"];
                $productByMaMonAn = $conn->query("select * from MonAn where MaMonAn=".$MaMonAn);
                $r = $productByMaMonAn->fetch_assoc();
                $quantity = $_POST["quantity"];
        
                $itemKey = $r["MaMonAn"]; 
                if (isset($_SESSION["cart_item"][$itemKey])) {
                    $_SESSION["cart_item"][$itemKey]["pquantity"] += $quantity;
                } else {
                    $_SESSION["cart_item"][$itemKey] = array(
                        "MaMonAn" => $r["MaMonAn"],
                        "TenMonAn" => $r["TenMonAn"],
                        "Gia" => $r["Gia"],
                        "pquantity" => $quantity,
                        "Anh" => $r["Anh"]
                    );
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
    }
}

?>

<html>
	<head>
		<meta charset="utf-8">
		<link href="../assets/css/cart.css" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<title>0200366_66PM5_NguyenHongPhuc</title>
	</head>
	<body>
		<style>
			#btnCheckout {
	background-color: #ffffff;
	border: #00d068 1px solid;
	padding: 5px 10px;
	color: rgb(0, 208, 17);
	float: left;
	text-decoration: none;
	border-radius: 3px;
	margin: 10px 0px;
	padding-right : 10px;
}
		</style>
		<div id="shopping-cart">
			<h2><div class="txt-heading">Giỏ hàng</div></h2>
			<a id="btnEmpty" href=?action=empty>Empty Cart</a>
			<a id="btnCheckout" href="checkout.php">Xác nhận</a>
			<?php 
				$total_quantity = 0;
				$total_price = 0;
			?>
			<table>
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
                $item_price = $item["pquantity"]*$item["Gia"];
    ?>
                <tr valign=middle>
                <td><img width=50px src="../assets/img/menu/<?php echo $item['Anh']; ?>" class="cart_item-image"><?php echo $item['TenMonAn']; ?></td>        
                    <td><?php echo $item["MaMonAn"];?></td>
                    <td><?php echo $item["pquantity"];?></td>
                    <td><?php echo $item["Gia"];?>$</td>
                    <td><a href="?action=remove&MaMonAn=<?php echo $item["MaMonAn"];?>" class="remove-item"><i class='fas fa-times fa-2x' style ='color:red; align = center;'></i></a></td>
                </tr>
    <?php 
                $total_quantity +=$item["pquantity"];
                $total_price +=($item["pquantity"]*$item["Gia"]);
            }
        }
    ?>
    <tr>
        <td colspan=2>Total:</td>
        <td><?php echo $total_quantity?></td>
        <td colspan=2><strong><?php echo number_format($total_price,2)." VND";?></strong></td>
    </tr>
</table>
</div>
<div id="product-grid">
    <div class="txt-heading">Products</div>
    <?php if ($result->num_rows>0){
        while ($r = $result->fetch_assoc()){
    ?>      
        <div class=product-item>
            <form method=POST action="?action=add&MaMonAn=<?php echo $r["MaMonAn"];?>">
            <div class="product-image"><img src="../assets/img/menu/<?php echo $r['Anh']; ?>" width="250px" height="250px"></div>                <div class="product-tile-footer">
                    <div class="product-title"><?php echo $r["MaMonAn"]."-".$r["TenMonAn"];?></div>
                    <div class="product-price"><?php echo number_format($r["Gia"]);?> VND</div>
                    <div class="cart-action">
                        <input type=text class="product-quantity" name=quantity value=1 size=2>
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
