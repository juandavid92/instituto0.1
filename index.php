<!DOCTYPE html>
<html>
<?php include("head.html"); ?>
<body>
<div class="content-loggin">
  <header>
  <h1>
    Bienvenido Instituto ABC
  </h1>
  </header>
  <form class="form-horizontal">
  <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Su cuenta ha sido registrada</span>
                </div>
                <div class="alert alert-danger text-center" style="display:none;" id="error">
                            
                        </div>    
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>
  </div>
  <div class="form-group registro-show">
    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group registro-show">
    <label for="apellido" class="col-sm-2 control-label">Apellido</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Aplellido">
    </div>
  </div>
  <div class="form-group">
    <label for="contrasena" class="col-sm-2 control-label">Contraseña</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña" required>
      <input type="checkbox" class="registro-hide" id="view_pass" onchange="document.getElementById('contrasena').type = this.checked ? 'text' : 'password'"> <span class="registro-hide">Mostrar Contraseña</span>
    </div>
  </div>
  <div class="form-group registro-show">
    <label for="confirm-contra" class="col-sm-2 control-label">Confirmar</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="confirm-contra" id="confirm-contra" placeholder="Repetir Contraseña">
    </div>
  </div>    
   
  <div class="form-group">
    <div>
      <button type="button"  class="btn btn-default registro-hide" onclick="funciones.loggin();">Ingresar</button>
      <div id="show_reg" class="btn btn-default registro-hide">Registrate</div>
      <div id="show_log" class="btn btn-default registro-show">Volver</div>
      <button type="button"  class="btn btn-default registro-show" onclick="funciones.registro();">Registrarme</button>
    </div>
  </div>
</form>
</div>
  

</body>
</html>