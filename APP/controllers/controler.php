<?php 

	require_once('../models/functions.php');
    
    if (isset($_GET['opcion'])) {
        $opcion = $_GET['opcion'];
    }else if(isset($_POST['opcion'])){
        $opcion = $_POST['opcion'];
    }else{
        $opcion = null;
    }

    switch ($opcion) {
        case 'profesores':
            header("location: ../../profesores.php");
            break;
        case 'cursos':
            header("location: ../../cursos.php");
            break;
        case 'pagos':
            header("location: ../../pagos.php");
            break;
        case 'alumnos':
            header("location: ../../alumnos.php");
            break;  
        case 'registro':
                $nombres=$_POST['nombres'];
                $apellidos=$_POST['apellidos'];
                $email = $_POST['email'];
                $password = $_POST['contrasena'];
                $instancia = new Functions();
                 if($instancia->registrar($nombres,$apellidos,$email,$password)){
                      echo "registrado";
                  }else{
                      echo "No se pudo registrar";
                  }
            break;  
        case 'crear_curso':
                $curso=$_POST['curso'];
                $descripcion=$_POST['descripcion'];
                $profesor=$_POST['profesor'];
                $instancia = new Functions();
                if ($instancia->CrearCurso($curso,$descripcion,$profesor)) {
                    echo "creado";
                }else{
                    echo "No se pudo crear";
                }

            break;  
        case 'crear_profesor':
                $dni = $_POST['dni'];
                $nombre =  $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $edad= $_POST['edad'];
                $instancia = new Functions();
                if ($instancia->CrearProfesor($dni,$nombre,$apellido,$edad)) {
                    echo "creado";
                }else{
                    echo "No se pudo crear";
                }
            break;
        case 'crear_alumno':
                $dni = $_POST['dni'];
                $nombre =  $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $edad= $_POST['edad'];
                $curso= $_POST['id_curso'];
                $instancia = new Functions();
                if ($instancia->CrearAlumno($dni,$nombre,$apellido,$edad)) {
                    $id_alumno = $instancia->consultarId($dni);
                    if ($instancia->AsociarAlumnoCurso($id_alumno,$curso)) {
                        echo "creado";
                    }
                    
                }else{
                    echo "No se pudo crear";
                }
            break;                 
        default:
            $user = $_POST['email'];
            $pass = md5($_POST['contrasena']);
            $instancia = new Functions();
            $respuesta = $instancia->loggin($user, $pass);
            if (!$respuesta[0] == 0) {
                session_start();
                $_SESSION['usuario'] = $user;
            }
            else{
                echo 'incorrecto';
            } 
            break;
    }
    
