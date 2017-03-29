$(document).ready(function(){
	$('#show_reg').click(function(){
		$('.registro-show').slideDown(1000);
		$('.registro-hide').slideUp(1000);
		$('#error').hide();
	});
	$('#show_log').click(function(){
		$('.registro-show').slideUp(500);
		$('.registro-hide').slideDown(500);
		$('#error').hide();
	});
	$('.var_sesion').hover(function(){
		$('.btn-cerrar').slideDown(500);
	});
	$(".btn-cerrar").mouseleave(function(e){
   		$(".btn-cerrar").css("display", "none");
	});
	$('#crear_curso').click(function(){
		$('.form-curso').slideDown(10);
	});
	$('.cerrar_popup').click(function(){
		$('.form-curso').slideUp(10);
	});
});


var funciones = {
	'loggin' : function(){
			var email = $('#email').val();
            var contrasena = $('#contrasena').val();
            $.ajax({
                url:'APP/controllers/controler.php',
                type:'POST',
                data:'email='+email+'&contrasena='+contrasena
            }).done(function(resp){
                if(resp != 'incorrecto'){
                    location.href='home.php';
                }else{
                	error = document.getElementById("error");
            		error.innerHTML = '<p>Usuario o Password no identificados</p>';
                    $('#error').show();
                }
            });
	},
	'registro' : function(){
			var nombres = $('#nombre').val();
            var apellidos = $('#apellido').val();
            var email = $('#email').val();
            var contrasena = $('#contrasena').val();
            var password2 = $('#confirm-contra').val();
            if (nombres == '' || apellidos == '' || email == '' || contrasena == '') {
            	error = document.getElementById("error");
            	error.innerHTML = 'Rellenar todos los campos';
            	$('#error').show();
            }else  if (contrasena===password2) {
                $.ajax({
                    url:'APP/Controllers/controler.php',
                    type:'POST',
                    data:'nombres='+nombres+'&apellidos='+apellidos+'&email='+email+'&contrasena='+contrasena+'&opcion=registro'
                }).done(function(resp){
                    if (resp==='registrado') {
                        $('#exito').show();
                    }
                    else{
                        alert(resp);
                    }
                });
            }
            else{
            	error = document.getElementById("error");
            	error.innerHTML = 'password no son iguales';
            	$('#error').show();
            }
	},
	'curso' : function(){
		var curso = $('#curso').val();
		var descripcion = $('#descripcion').val();
		var profesor = $('#profesor').val();
		if (curso == '' || descripcion == '' || profesor == '') {
			error = document.getElementById("error");
            error.innerHTML = '<p>Falta un campo</p>';
            $('#error').show();
		}else{
			$.ajax({
                    url:'APP/Controllers/controler.php',
                    type:'POST',
                    data:'curso='+curso+'&descripcion='+descripcion+'&profesor='+profesor+'&opcion=crear_curso'
                }).done(function(resp){

                    if (resp==='creado') {
                    	exito = document.getElementById("exito");
            			exito.innerHTML = '<span>El Curso ha sido creado</span>';
                        $('#exito').show();
                        setTimeout('document.location.reload()',1000);
                    }
                    else{
                        alert(resp);
                    }
                });
		}
		
	},
	'profesor' : function(){
		var dni = $('#dni').val();
		var nombre = $('#nombre').val();
		var apellido = $('#apellido').val();
		var edad = $('#edad').val();
		if (dni == '' || nombre == '' || apellido == '' || edad == '') {
			error = document.getElementById("error");
            error.innerHTML = '<p>Falta un campo</p>';
            $('#error').show();
		}else{
			$.ajax({
                    url:'APP/Controllers/controler.php',
                    type:'POST',
                    data:'dni='+dni+'&nombre='+nombre+'&apellido='+apellido+'&edad='+edad+'&opcion=crear_profesor'
                }).done(function(resp){

                    if (resp==='creado') {
                    	exito = document.getElementById("exito");
            			exito.innerHTML = '<span>El profesor ha sido creado</span>';
                        $('#exito').show();
                        setTimeout('document.location.reload()',1000);
                    }
                    else{
                        alert(resp);
                    }
                });
		}
	},
	'alumno' : function(){
		var dni = $('#dni_alumno').val();
		var nombre = $('#nombre_alumno').val();
		var apellido = $('#apellido_alumno').val();
		var edad = $('#edad_alumno').val();
		var id_curso = $().val('#curso_alumno');
		if (dni == '' || nombre == '' || apellido == '' || edad == '' || id_curso == '') {
			error = document.getElementById("error");
            error.innerHTML = '<p>Falta un campo</p>';
            $('#error').show();
		}else{
			$.ajax({
                    url:'APP/Controllers/controler.php',
                    type:'POST',
                    data:'dni='+dni+'&nombre='+nombre+'&apellido='+apellido+'&edad='+edad+'&id_curso='+id_curso+'&opcion=crear_alumno'
                }).done(function(resp){

                    if (resp==='creado') {
                    	exito = document.getElementById("exito");
            			exito.innerHTML = '<span>El Alumno ha sido creado</span>';
                        $('#exito').show();
                        setTimeout('document.location.reload()',1000);
                    }
                    else{
                        alert(resp);
                    }
                });
		}
	}

}