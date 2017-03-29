<!DOCTYPE html>
<html>
<head>
	<title>Alumnos</title>
	<?php include('head.html'); ?>
</head>
<body>
	<div class='content-loggin'>
		<?php 
			  include('header.html');
	    	  include('APP/models/functions.php');
	    ?>	  
		<div class="content-datos">
			<h4>Lista de Alumnos *</h4>
			<?php
	            $instancia = new Functions();
	            $result = $instancia->ListaAlumnos();
	            echo '<table border=1 class="tabla-datos">';
		        echo '<tr class="head-table">';		        
		        echo '<th>Alumno</th>';
		        echo '<th>Dni</th>';
		        echo '<th>Nombre Alumno</th>';
		        echo '<th>Apellido</th>';
		        echo '<th>Edad</th>';
		        echo '</tr>';
		        while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		        	echo '<tr>';
					echo '<td>'.$fila['id_alumno'].'</td>';	
					echo '<td>'.$fila['dni'].'</td>';	        	
		            echo '<td>'.$fila['nombre'].'</td>';
		            echo '<td>'.$fila['apellido'].'</td>';
		            echo '<td>'.$fila['edad'].'</td>';
		            echo '</tr>';        
		        }
		        echo '</table>';
			?>
		<a href="home.php" class='btn btn-regresar'> Regresar</a>
		<div class="btn btn-regresar" id="crear_curso">Crear Alumno</div>
		</div>
		<div class="form-curso">
			<h4>Crear Nuevo Alumno<i class="fa fa-close cerrar_popup"></i></h4>
				<form class="form-horizontal" method="POST">
				<div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span>
                </div>
				<div class="alert alert-danger text-center" style="display:none;" id="error">
                            
                        </div> 
				<div class="form-group">

					 <label for="dni" class="col-sm-2 control-label">DNI:</label>
					 <div class="col-sm-10">
					     <input type="text" class="form-control" id="dni_alumno" name="dni" placeholder="dni" required>
					 </div>
				</div>
				<div class="form-group">

					 <label for="nombre" class="col-sm-2 control-label">Nombre:</label>
					 <div class="col-sm-10">
					     <input type="text" class="form-control" id="nombre_alumno" name="nombre" placeholder="nombre" required>
					 </div>
				</div>
				<div class="form-group">
					 <label for="apellido" class="col-sm-2 control-label">Apellido:</label>
					 <div class="col-sm-10">
					      <input type="text" class="form-control" id="apellido_alumno" name="apellido" placeholder="apellido" required>
					 </div>
			    </div>
				<div class="form-group">
					 <label for="edad" class="col-sm-2 control-label">Edad:</label>
					 <div class="col-sm-10">
					      <input type="text" class="form-control" id="edad_alumno" name="edad" placeholder="edad" required>
					 </div>
				</div> 
				<div class="form-group">

					    <label for="curso" class="col-sm-2 control-label">Curso</label>
						    <div class="col-sm-10">
						      <?php
					            $result = $instancia->ListaCursos();
					            echo '<select name="curso" class="form-control" id="curso_alumno" required="">';
					            echo '<option value="">Seleccione</option>';
					            while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					            	echo '<option value="'.$fila["id_curso"].'">'. $fila["curso"] . '</option>';
					            }
					            echo '</select>';
					        ?>
						    </div>
				</div>  
			  		<div class="form-group">
			    	<div class="">
			      <div class="btn btn-default" onclick="funciones.alumno();" style="float: right;">Crear</div>      
			    </div>
			  </div>
			</form>
		</div>
	</div>
	</div>
</body>
</html>