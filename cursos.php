<!DOCTYPE html>
<html>
<head>
	<title>Cursos</title>
	<?php include('head.html'); ?>
</head>
<body>
	<div class='content-loggin'>
		<?php 
			  include('header.html');
	    	  include('APP/models/functions.php');
	    ?>	  
		<div class="content-datos" style="padding-bottom: 0px;">
			<h4>Lista de Cursos</h4>

			<?php
	    	  	$instancia = new Functions();
            	$result = $instancia->ListaCursos();
	            echo '<table border=1 class="tabla-datos">';
		        echo '<tr class="head-table">';
		        echo "<th>Nombre Curso</th>";
		        echo "<th>Descripcion</th>";
		        echo "</tr>";
		        while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		        	echo '<tr>';
		            echo '<td>'.$fila["curso"].'</td>';
		            echo '<td>'.$fila["descripcion"].'</td>';
		            echo '</tr>';        
		        }
		        echo '</table>';
			?>
			<a href="home.php" class='btn btn-regresar'> Regresar</a>
			<div class="btn btn-regresar" id="crear_curso">Crear nuevo curso</div>
		</div>
		<div class="form-curso">
			<h4>Crear Nuevo Curso<i class="fa fa-close cerrar_popup"></i></h4>
				<form class="form-horizontal" method="POST">
				<div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span>
                </div>
				<div class="alert alert-danger text-center" style="display:none;" id="error">
                            
                        </div> 
				  <div class="form-group">

					    <label for="curso" class="col-sm-2 control-label">Curso</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="curso" name="curso" placeholder="Curso" required>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" required>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="Profesor" class="col-sm-2 control-label">Profesor</label>
						   
						    <div class="col-sm-10">
						    <?php
					    	  	
					            $result = $instancia->ListaProfesores();
					            echo '<select id="profesor" name="Profesor" class="form-control" required="">';
					            echo '<option value="">Elija profesor</option>';
					            while($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					            	echo '<option value="'.$fila["id_profesor"].'">'. $fila["nombre"].'</option>';
					            }
					            echo '</select>';
					        ?>
							     
						    	
						    
						     
						    </div>
						  </div>    
			  		<div class="form-group">
			    	<div class="">
			      <div class="btn btn-default" onclick="funciones.curso();" style="float: right;">Crear</div>      
			    </div>
			  </div>
			</form>
		</div>
	</div>
</body>
</html>