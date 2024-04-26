<?php
include_once "IConexionBD.php";

class ConexionMySQLImp implements IConexionBD{

    private $host ;
    private $port ;
    private $database ;
    private $user ;
    private $password ;
    private static $instancia ;
    private $conexion ;



    private function __construct(

        $host = "localhost",
        $port = 3306,
        $database = "taller_crud_electiva",
        $user = "root",
        $password = "root"
    )
    {
        $this-> host = $host;
        $this-> port = $port;
        $this-> database = $database;
        $this-> user = $user;
        $this-> password = $password;
    }

    public function conectar()
    {
        $this-> conexion = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->database);
    }

    public static function getInstance()
    {
        if ('¡ConexionMySQLImp::$instancia'){
            ConexionMySQLImp::$instancia = new ConexionMySQLImp();
        }
        return ConexionMySQLImp::$instancia;
    }

    public function consultar($sql_select)
    {
        return $this->conexion->query($sql_select);
    }

    public function transaccion($sql_transaccion, $tipo = "")
    {
        return $this->conexion->query($sql_transaccion);
    }

    public function desconectar()
    {
        if ($this->conexion){
            $this->conexion->close();

        }
        $this->conexion = null;
    }

}

    

