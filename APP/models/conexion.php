<?php
class conexion{
    //variables de conexion
    private $host;
    private $user;
    private $password;
    private $database;
    public $conexion;

    public function __construct(){
        $this->host   = "127.0.0.1";
        $this->user   = "root"; 
        $this->password ="";
        $this->database = "instituto";
    }

    function conectar(){
       $this->conexion = new mysqli($this->host,$this->user,$this->password,$this->database);
        
    }

    function cerrar(){
            $this->conexion->close();
        }
 
}
