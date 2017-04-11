<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
<head>

	<link href="./iconfont/material-icons.css" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
					<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
					<script src="js/materialize.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Medicine Management</title>
<style media="screen">

	.card{
		width: 40%;
		padding: 20px;
		margin-left: 30%;
	}
	img{
		height: 400px;
	}
</style>
</head>
<body>

<h1 align="center">Products </h1>

<!-- View Cart Box Start -->
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
	echo '<div class="cart-view-table-front" id="view-cart">';
	echo '<h3>Your Shopping Cart</h3>';
	echo '<form method="post" action="cart_update.php">';
	echo '<table class="striped bordered responsive-table" width="100%"  cellpadding="6" cellspacing="0">';
	echo '<tbody>';

	$total =0;
	$b = 0;
	foreach ($_SESSION["cart_products"] as $cart_itm)
	{
		$count = 100;
		$product_name = $cart_itm["product_name"];
		$product_qty = $cart_itm["product_qty"];
		$product_price = $cart_itm["product_price"];
		$product_code = $cart_itm["product_code"];

		// $product_color = $cart_itm["product_color"];
		$bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
		echo '<tr class="'.$bg_color.'">';
		echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
		echo '<td>'.$product_name.'</td>';
		echo '<td><input type="checkbox" id="'.$product_code.'" name="remove_code[]" value="'.$product_code.'" />  <label for="'.$product_code.'">Remove</label></td>';
		echo '</tr>';
		$subtotal = ($product_price * $product_qty);
		$total = ($total + $subtotal);
	}
	echo '<td colspan="4">';
	echo '<button type="submit" class="btn">Update</button>&nbsp;&nbsp;<a href="view_cart.php" class="btn">Checkout</a>';
	echo '</td>';
	echo '</tbody>';
	echo '</table>';

	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	echo '</form>';
	echo '</div>';

}
?>
<!-- View Cart Box End -->


<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price FROM products ORDER BY id ASC");
if($results){
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT

<form action="cart_update.php" method="post">
<div class="row">
<div class="col l12 s6 m6">
<div class="card ">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="images/{$obj->product_img_name}">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">{$obj->product_name}<i class="material-icons right">more info..</i></span>
			<div class="product-info">
				Price {$currency}{$obj->price}
					<label>
						<span>Quantity</span>
							<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
					</label>
						<input type="hidden" name="product_code" value="{$obj->product_code}" />
						<input type="hidden" name="type" value="add" />
						<input type="hidden" name="return_url" value="{$current_url}" />
			</div>
			<div align="center">
				<button type="submit" class="add_to_cart btn">Add</button>
				</div>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">{$obj->product_name}<i class="material-icons right">close</i></span>
				{$obj->product_desc}
    </div>
  </div>
	</div>
	</div>
</form>



EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>
<!-- Products List End -->
</body>
</html>
