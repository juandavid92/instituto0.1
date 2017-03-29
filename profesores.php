<!DOCTYPE html>
<html>
<head>
	<title>Profesores</title>
	<?php include('head.html'); ?>
</head>
<body>
	<div class='content-loggin'>
		<?php 
			  include('header.html');
	    	  include('APP/models/functions.php');
	    ?>	  
		<div class="content-datos">
			<h4>Lista de Profesores</h4>
			<?php
	    	  	$instancia = new Functions();
            	$result = $instancia->ListaProfesores();
	            echo '<table border=1 class="tabla-datos">';
		        echo '<tr class="head-table">';
		        echo '<th>Dni</th>';
		        echo '<th>Nombre Profesor</th>';
		        echo '<th>Apellido</th>';
		        echo '<th>Edad</th>';
		        echo '</tr>';
		        while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		        	echo '<tr>';
		        	echo '<td>'.$fila['dni'].'</td>';
		            echo '<td>'.$fila['nombre'].'</td>';
		            echo '<td>'.$fila['apellido'].'</td>';
		            echo '<td>'.$fila['edad'].'</td>';
		            echo '</tr>';        
		        }
		        echo '</table>';
			?>
		<a href="home.php" class='btn btn-regresar'> Regresar</a>
		<div class="btn btn-regresar" id="crear_curso">Crear Profesor</div>
		</div>
		<div class="form-curso">
			<h4>Crear Nuevo Profesor<i class="fa fa-close cerrar_popup"></i></h4>
				<form class="form-horizontal" method="POST">
				<div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span>
                </div>
				<div class="alert alert-danger text-center" style="display:none;" id="error">
                            
                        </div> 
				<div class="form-group">

					 <label for="dni" class="col-sm-2 control-label">DNI:</label>
					 <div class="col-sm-10">
					     <input type="text" class="form-control" id="dni" name="dni" placeholder="dni" required>
					 </div>
				</div>
				<div class="form-group">

					 <label for="nombre" class="col-sm-2 control-label">Nombre:</label>
					 <div class="col-sm-10">
					     <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
					 </div>
				</div>
				<div class="form-group">
					 <label for="apellido" class="col-sm-2 control-label">Apellido:</label>
					 <div class="col-sm-10">
					      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" required>
					 </div>
			    </div>
				<div class="form-group">
					 <label for="edad" class="col-sm-2 control-label">Edad:</label>
					 <div class="col-sm-10">
					      <input type="text" class="form-control" id="edad" name="edad" placeholder="edad" required>
					 </div>
				</div>   
			  		<div class="form-group">
			    	<div class="">
			      <div class="btn btn-default" onclick="funciones.profesor();" style="float: right;">Crear</div>      
			    </div>
			  </div>
			</form>
		</div>
		</div>
	
	</div>
</body>
</html>