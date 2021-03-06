<section class="content-header">
	<a href="index.php?view=newingredient" class="btn pull-right btn-default"><i class="glyphicon glyphicon-plus-sign"></i> <strong>Agregar Ingrediente o Producto</strong></a>
		<h1><strong>Ingredientes o Productos en el inventario</strong></h1>
</section>
<section class="content">
<div class="row">


	<div class="col-md-12">
		<div class="clearfix"></div>


<?php

$products = IngredientData::getAllActive();
if(count($products)>0){

	?>

<div class="clearfix"></div>
<div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"></h3>
                                </div>
                                <div class="box-body table-responsive">
                                <table class="table table-bordered table-hover datatable">
	<thead>
		<th><strong>Codigo</strong></th>
		<th><strong>Nombre</strong></th>
		<th><strong>Precio</strong></th>
		<th></th>
	</thead>
	<?php foreach($products as $product):?>
	<tr>
		<td><?php echo $product->code; ?></td>
		<td><?php echo $product->name; ?></td>
		<td>$ <?php echo number_format($product->price_out,2,".",","); ?></td>
		<td style="width:90px;">
<!--		<a href="index.php?view=hideproduct&id=<?php echo $product->id; ?>" title="Desactivar Producto" class="btn tip btn-sm btn-default"><i class="glyphicon glyphicon-eye-close"></i></a>-->
		<a href="index.php?view=updateingredient&id=<?php echo $product->id; ?>" title="Editar Producto" class="btn tip btn-sm btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
		<a href="index.php?view=delingredient&id=<?php echo $product->id;?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
</div>
</div>
<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2><strong>No hay Ingredientes</strong></h2>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>
</section>