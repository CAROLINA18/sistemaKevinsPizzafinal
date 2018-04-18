<?php

if(count($_POST)>0){
	$product = IngredientData::getById($_POST["product_id"]);
	$product->name = $_POST["name"];
	$product->code = $_POST["code"];
	$product->price_out = $_POST["price_out"];
	$product->unit = $_POST["unit"];
	$product->user_id = Session::getUID();
	$product->update();
    setcookie("pro","true");
	print "<script>window.location='index.php?view=updateingredient&id=$_POST[product_id]';</script>";


}


?>