<div class="row">

	<div class="col-md-12">
	<h1><strong>Reabastecer Inventario</strong></h1>
	<p><b><strong>Buscar producto por nombre o por codigo:</strong></b></p>
		<form>
		<div class="row">
			<div class="col-md-6">
				<input type="hidden" name="view" value="re">
				<input type="text" name="product" class="form-control">
			</div>
			<div class="col-md-3">
			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> <strong>Buscar</strong></button>
			</div>
		</div>
		</form>
	</div>


<?php if(isset($_GET["product"])):?>
	<?php
$products = IngredientData::getLike($_GET["product"]);
if(count($products)>0){
	?>
<h3>Resultados de la Busqueda</h3>
<table class="table table-bordered table-hover">
	<thead>
		<th><strong>Codigo</strong></th>
		<th><strong>Nombre</strong></th>
		<th><strong>Unidad</strong></th>
		<th><strong>Precio unitario</strong></th>
		<th><strong>En inventario</strong></th>
		<th><strong>Cantidad</strong></th>
		<th style="width:100px;"></th>
		<th><strong>Total</strong></th>
	</thead>
	<?php
	
$products_in_cero=0;
	 foreach($products as $product):
	 	$preciouni= number_format($product->price_out,2,".",",");
	 	
$q= Operation2Data::getQYesF($product->id);
$totalfinal= number_format($preciouni*$q,3,".",",");
	?>
		<form method="post" action="index.php?view=addtore">
	<tr class="<?php if($q<=$product->inventary_min){ echo "danger"; }?>">
		<td style="width:80px;"><?php echo $product->id; ?></td>
		<td><?php echo $product->name; ?></td>
		<td><?php echo $product->unit; ?></td>
		<td>$ <?php echo number_format($product->price_out,2,".",","); ?></td>
		<td>
			<?php echo $q; ?>
		</td>
		<td>
		<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
		<input type="" class="form-control" required name="q" placeholder="Cantidad de producto ..."></td>
		<td style="width:100px;">
		<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-refresh"></i> <strong>Agregar</strong></button>
		</td>
		<td>
			<?php echo  $totalfinal; ?>
		</td>

	</tr>
	</form>
	<?php endforeach;?>
</table>

	<?php
}
?>
<br><hr>
<hr><br>
<?php else:
?>

<?php endif; ?>

<?php if(isset($_SESSION["errors"])):?>
<h2><strong>Errores</strong></h2>
<p></p>
<table class="table table-bordered table-hover">
<tr class="danger">
	<th><strong>Codigo</strong></th>
	<th><strong>Producto</strong></th>
	<th><strong>Mensaje</strong></th>
</tr>
<?php foreach ($_SESSION["errors"]  as $error):
$product = IngredientData::getById($error["product_id"]);
?>
<tr class="danger">
	<td><?php echo $product->id; ?></td>
	<td><?php echo $product->name; ?></td>
	<td><b><?php echo $error["message"]; ?></b></td>
</tr>

<?php endforeach; ?>
</table>
<?php
unset($_SESSION["errors"]);
 endif; ?>


<!--- Carrito de compras :) -->
<?php if(isset($_SESSION["reabastecer"])):
$total = 0;
?>
<h2>Lista de Reabastecimiento</h2>
<table class="table table-bordered table-hover">
<thead>
	<th style="width:30px;"><strong>Codigo</strong></th>
	<th style="width:30px;"><strong>Cantidad</strong></th>
	<th style="width:30px;"><strong>Unidad</strong></th>
	<th><strong>Producto</strong></th>
	<th style="width:30px;"><strong>Precio Unitario</strong></th>
	<th style="width:30px;"><strong>Precio Total</strong></th>
	<th ></th>
</thead>
<?php foreach($_SESSION["reabastecer"] as $p):
$product = IngredientData::getById($p["product_id"]);
$preciouni= number_format($product->price_out,2,".",",");
$q= Operation2Data::getQYesF($product->id);
$totalfinal= number_format($preciouni*$p["q"],3,".",",");
?>
<tr >
	<td><?php echo $product->id; ?></td>
	<td ><?php echo $p["q"]; ?></td>
	<td><?php echo $product->unit; ?></td>
	<td><?php echo $product->name; ?></td>
	<td>$ <?php echo number_format($product->price_out,2,".",","); ?></td>
	<td>
			<?php echo  $totalfinal; ?>
		</td>
	<td style="width:30px;"><a href="index.php?view=clearre&product_id=<?php echo $product->id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a></td>
</tr>

<?php endforeach; ?>
</table>
<form method="post" class="form-horizontal" id="processsell" action="index.php?view=processre">
<h2><strong>Resumen</strong></h2>


  <div class="row">
<div class="col-md-6 col-md-offset-6">
<table class="table table-bordered">
<tr>
	<td><p><strong>Subtotal</strong></p></td>
	<td><p><b>$ <?php echo number_format($totalfinal*.84 , 3); ?></b></p></td>
</tr>
<tr>
	<td><p><strong>IVA</strong></p></td>
	<td><p><b>$ <?php echo number_format($totalfinal*.16 , 3); ?></b></p></td>
</tr>
<tr>
	<td><p><strong>Total</strong></p></td>
	<td><p><b>$ <?php echo number_format($totalfinal,3); ?></b></p></td>
</tr>

</table>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input name="is_oficial" type="hidden" value="1">
        </label>
      </div>
    </div>
  </div>
<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
		<a href="index.php?view=clearre" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-remove"></i> <strong>Cancelar</strong></a>
        <button class="btn btn-lg btn-primary"><i class="fa fa-refresh"></i> Procesar Reabastecimiento</button>
        </label>
      </div>
    </div>
  </div>
</form>

</div>
</div>

<br><br><br><br><br>
<?php endif; ?>

</div>