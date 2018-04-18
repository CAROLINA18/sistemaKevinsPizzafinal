<div class="row">
<div class="col-md-8 col-md-offset-2">
<h2><strong>Nuevo Usuario</strong></h2>
<form class="form-horizontal" method="post" action="index.php?view=adduser" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><strong>Nombre</strong></label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><strong>Apellidos</strong></label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellidos">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><strong>Nombre de usuario</strong></label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><strong>Email</strong></label>
    <div class="col-lg-10">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label"><strong>Password</strong></label>
    <div class="col-lg-10">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_admin"> <strong>Super Administrador</strong>
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default"><strong>Nuevo Usuario</strong></button>
    </div>
  </div>
</form>
</div>
</div>