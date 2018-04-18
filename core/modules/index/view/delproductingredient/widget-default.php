<?php

// print_r($_POST);

$operation =ProductIngredientData::getById($_GET["operation_id"]);
$pid = $operation->product_id;
$operation->del();

//header("Location: index.php?view=productingredients&id=".$pid);
 echo"<script language='javascript'>window.location='index.php?view=productingredients&id=$pid'</script>";

?>