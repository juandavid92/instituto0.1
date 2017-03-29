<?php
class Functions{
    private $conexion;

    public function __construct() {
        require_once('conexion.php');
            $this->conexion= new conexion();
            $this->conexion->conectar();
    }

    function loggin($email, $pass){
        
        $sql="SELECT * FROM usuarios WHERE email ='$email' && password='$pass'";
            $resulatdos = $this->conexion->conexion->query($sql);
            if ($resulatdos->num_rows > 0) {
                $r=$resulatdos->fetch_array();
            }
            else{
                $r[0]=0;
            }
            return $r;
            $this->conexion->cerrar();
    }   

    function ListaCursos(){
        $consulta = 'SELECT * FROM cursos';
        $cursos = $this->conexion->conexion->query($consulta);
        return $cursos;
    }

    function ListaProfesores(){
        $consulta = 'SELECT * FROM profesores';
        $profesores = $this->conexion->conexion->query($consulta);
        return $profesores;
    }

    function ListaPagos(){
        $consulta = 'SELECT p.id_pago, a.nombre , a.apellido, c.curso, p.fecha, p.descripcion FROM `pagos` p inner join alumnos_cursos ac ON p.fk_alumno = ac.fk_alumno inner join alumnos a ON ac.fk_alumno = a.id_alumno INNER JOIN cursos c ON c.id_curso = ac.fk_curso';
        $pagos = $this->conexion->conexion->query($consulta);
        return $pagos;
    }

     function HtmlEntities($string){
        return \htmlentities ($string,ENT_HTML401,"ISO-8859-1");
    }

    function ListaAlumnos(){
        $consulta = 'SELECT * FROM alumnos';
        $alumnos = $this->conexion->conexion->query($consulta);
        return $alumnos;
    }

    function registrar($nombre,$apellido,$email,$password){
            $pass=md5($password);
            $sql="INSERT INTO usuarios VALUES(0,'$nombre','$apellido','$email','$pass')";
            if($this->conexion->conexion->query($sql)){
                return true;
            }
            else{
                return false;
            }
            $this->conexion->cerrar();
    }

    function CrearCurso($curso,$descripcion,$profesor){
            $sql="INSERT INTO cursos VALUES(0,'$curso','$descripcion','$profesor')";
            if($this->conexion->conexion->query($sql)){
                return true;
            }
            else{
                return false;
            }
            $this->conexion->cerrar();
    }   

    function CrearProfesor($dni,$nombre,$apellido,$edad){
        $sql = "INSERT INTO profesores VALUES(0,'$dni','$nombre','$apellido','$edad')";
        if ($this->conexion->conexion->query($sql)) {
            return true;
        }else{
            return false;
        }
        $this->conexion->cerrar();
    }

    function CrearAlumno($dni,$nombre,$apellido,$edad){
        $sql = "INSERT INTO alumnos VALUES(0,'$dni','$nombre','$apellido','$edad')";
        if ($this->conexion->conexion->query($sql)) {
            return true;
        }else{
            return false;
        }
        $this->conexion->cerrar();
    }

    function consultarId($dni){
        $consulta = "SELECT id_alumno FROM alumnos where dni = '$dni'";
        $id_alumno = $this->conexion->conexion->query($consulta);
        return $id_alumno;
    }

    function AsociarAlumnoCurso($id_alumno,$id_curso){
        $id = mysqli_fetch_array($id_alumno, MYSQLI_ASSOC);
        $id_alumno = $id["id_alumno"];
        $consulta = "INSERT INTO alumnos_cursos VALUES(0,'$id_alumno','$id_curso')";
        if ($this->conexion->conexion->query($consulta)) {
            return true;
        }else{
            return false;
        }
        $this->conexion->cerrar();
    }

    function CrearPago(){
        //$sql = "INSERT INTO ";
    }
} 
