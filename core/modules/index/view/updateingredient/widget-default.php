<?php
$product = IngredientData::getById($_GET["id"]);
if($product!=null):
?>
<section class="content-header">
    <h1><?php echo $product->name ?> <small>Editar Producto</small></h1>
</section>
<section class="content">
<div class="row">
	<div class="col-md-12">
  <?php if(isset($_COOKIE["prod"])):?>
    <p class="alert alert-info">La informacion del producto se ha actualizado exitosamente.</p>
  <?php setcookie("prdupd","",time()-18600); endif; ?>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateing" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><strong>Codigo*</strong></label>
    <div class="col-md-6">
      <input type="text" name="code" class="form-control" id="name" value="<?php echo $product->code; ?>" placeholder="Codigo del Producto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><strong>Nombre*</strong></label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" id="name" value="<?php echo $product->name; ?>" placeholder="Nombre del Producto">
    </div>
  </div>
 
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><strong>Precio*</strong></label>
    <div class="col-md-6">
      <input type="text" name="price_out" class="form-control" id="price_out" value="<?php echo $product->price_out; ?>" placeholder="Precio">
    </div>
  </div>
 
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><strong>Unidad*</strong></label>
    <div class="col-md-6">
      <input type="text" name="unit" class="form-control" id="unit" value="<?php echo $product->unit; ?>" placeholder="Unidad del Producto">
    </div>
  </div>
 
<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
    <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
      <button type="submit" class="btn  btn-success">Actualizar Producto</button>
    </div>
  </div>
</form>
<script>
  $("#addproduct").submit(function(e){
    

  });
</script>

<br><br><br><br><br><br><br><br><br>
	</div>
</div>
<?php endif; ?>
</section>