<?php
//header("Location: index.php?view=users");
$ing = IngredientData::getById($_GET["id"]);
$ing->del2();
if (mysql_affected_rows() == 1  ){
echo"<script language='javascript'>window.location='index.php?view=ingredients'</script>";
}
else {

echo "<div class = jumbotron>Este Ingrediente no se puede borrar por que tiene productos asociados , Primero borre el ingrediente dentro del producto</div>";
}


printf("Registros borrados: %d\n", mysql_affected_rows());
?>