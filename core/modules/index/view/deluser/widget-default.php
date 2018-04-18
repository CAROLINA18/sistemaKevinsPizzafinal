<?php
//header("Location: index.php?view=users");
$alumn = UserData::getById($_GET["id"]);
$alumn->del2();
if (mysql_affected_rows() == 1  ){
echo"<script language='javascript'>window.location='index.php?view=users'</script>";
}
else {

echo "<div class = jumbotron>Este Usuario no se puede borrar por que tiene ventas asociadas , Primero borre el historial de ventas.</div>";
}


printf("Registros borrados: %d\n", mysql_affected_rows());
?>