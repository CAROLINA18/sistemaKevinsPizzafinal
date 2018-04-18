<?php

//print_r($_GET);

$operation = Operation2Data::getById($_GET["id"]);
$operation->del();

print "<script>window.location='index.php?view=inventary'</script>";

?>