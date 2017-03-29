<!DOCTYPE html>
<html>
<head>
	<title>Pagos</title>
	<?php include('head.html'); 
	?>
</head>
<body>
	<div class='content-loggin'>
		<?php 
			  include('header.html');
	    	  include('APP/models/functions.php');
	    ?>	  
		<div class="content-datos">
			<h4>Lista de Pagos</h4>
			<?php
	    	  	$instancia = new Functions();
	    	  	$result = $instancia->ListaPagos();
	            echo '<table border=1 class="tabla-datos">';
		        echo '<tr class="head-table">';
		        echo '<th>pago</th>';
		        echo '<th>Nombre Estudiante</th>';
		        echo '<th>Apellido</th>';
		        echo '<th>Curso</th>';
		        echo '<th>Fecha de pago</th>';
		        echo '<th>Descripción Pago</th>';
		        echo '</tr>';
		        while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		        	echo '<tr>';
		            echo '<td>'.$fila['id_pago'].'</td>';
		            echo '<td>'.$fila['nombre'].'</td>';
		            echo '<td>'.$fila['apellido'].'</td>';
		            echo '<td>'.$fila['curso'].'</td>';
		            echo '<td>'.$fila['fecha'].'</td>';
		            echo '<td>'. $instancia->HtmlEntities($fila['descripcion']) .'</td>';
		            echo '</tr>';        
		        }
		        echo '</table>';
			?>
		<a href="home.php" class='btn btn-regresar'> Regresar</a>
		<div class="btn btn-regresar" id="crear_curso">Ingresar nuevo pago</div>
		</div>
		<div class="form-curso">
			<h4>Generar nuevo pago<i class="fa fa-close cerrar_popup"></i></h4>
				<form class="form-horizontal" action="APP/controler.php" method="POST">
				  <div class="form-group">

					    <label for="curso" class="col-sm-2 control-label">Curso</label>
						    <div class="col-sm-10">
						      <?php
					            $result = $instancia->ListaCursos();
					            echo '<select name="curso" class="form-control" required="">';
					            echo '<option value="">Seleccione</option>';
					            while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					            	echo '<option value="'.$fila["curso"].'">'. $fila["curso"] . '</option>';
					            }
					            echo '</select>';
					        ?>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="Alumno" class="col-sm-2 control-label">Alumno</label>
						   
						    <div class="col-sm-10">
						    <?php
					            $result = $instancia->ListaAlumnos();
					            echo '<select name="alumno" class="form-control" required="">';
					            echo '<option value="">Seleccione</option>';
					            while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					            	echo '<option value="'.$fila["nombre"].'">'. $fila["nombre"] . ' ' . $fila["apellido"]  . '</option>';
					            }
					            echo '</select>';
					        ?>
						    </div>
						  </div> 
						  <div class="form-group">
						    <label for="descripcion" class="col-sm-2 control-label">Descripcion:</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" required>
						    </div>
						  </div>   
			  		<div class="form-group">
			    	<div class="">
			      <button class="btn btn-default" onclick="funciones.curso();" style="float: right;">Crear</button>      
			    </div>
			  </div>
			</form>
		</div>
		</div>
	
	</div>
</body>
</html>