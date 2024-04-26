<?php

$ruta = $_SERVER["DOCUMENT_ROOT"] . "crudphp/";

require_once "ICrudBd.php";
require_once $ruta . "modelo/entidades/Usuario.php";
require_once $ruta . "utilidades/bd/ConexionBdMySQLImp.php";


class CrudUsuarioImp implements ICrudBd
{
    public function consultarPorId($id)
    {
        $sql = "SELECT * from Usuario where cedula = '$id'";
        $conBd = ConexionMySQLImp::getInstance();
        $conBd->conectar();
        $resultado = $conBd->consultar($sql);
        $filas = $resultado->fetch_all(MYSQLI_BOTH);
        if (count($filas) > 0){
            return $this->cargarUsuario($filas[0]);
        } else {
            throw new Exception("El usuario con CC: $id no existe");
        }
    }
    public function consultarTodo()
    {
        $sql = "SELECT * from Usuario";
        $conBd = ConexionMySQLImp::getInstance();
        $conBd->conectar();
        $resultado = $conBd->consultar($sql);
        $filas = $resultado->fetch_all(MYSQLI_BOTH);
        $lista_usuarios = array();

        if ($resultado->num_rows > 0){
            foreach ($filas as $i => $fila){
                $u = $this->cargarUsuario($fila);
                $lista_usuarios[] = $u;
            }

        }
        if (count($lista_usuarios)> 0){
            return $lista_usuarios;
        } else {
            throw new Exception("No existen usuraios registrados en el sistema");
        }
    }

    public function agregar($usuario)
    {
        $sql = "Insert into Usuarios
                Value ('" . $usuario-> getCedula() . "'
                , '" . $usuario->getClave() . "'
                , '" . $usuario->getNombre() . "'
                , '" . $usuario->getApellidos() . "'
                , '" . $usuario->getEmail() . "'
                , '" . $usuario->getEmail() . "')";
        $conBd = ConexionMySQLImp :: getInstance();
        $conBd->conectar(); 
        $conBd->transaccion($sql);
    }

    public function eliminarPorId($id)
    {
        $sql = "DELETE FROM Usuarios WHERE cedula = '$id'";
        $conBd = ConexionMySQLImp :: getInstance();
        $conBd->conectar(); 
        $conBd->transaccion($sql);
    }

    public function editar($objeto)
    {
        $sql = "UPDATE Usuarios
        SET clave ='" . $objeto->getClave() . "',
            nombre ='" . $objeto->getNombre() . "',
            apellidos ='" . $objeto->getApellidos() . "',
            email ='" . $objeto->getEmail() . "',
            telefono ='" . $objeto->getTelefono() . "',
        WHERE cedula ='" . $objeto->getCedula() . "',";

        $conBd = ConexionMySQLImp :: getInstance();
        $conBd->conectar(); 
        $conBd->transaccion($sql);
    }

    public function contar()
    {
        $sql = "SELECT count(cedula) as total FROM Usuarios";

        $conBd = ConexionMySQLImp :: getInstance();
        $conBd->conectar();
        $resultado = $conBd->consultar($sql);
        $filas = $resultado->fetch_all(MYSQLI_BOTH);

        if (count($filas) > 0){
            return $filas[0]["total"];
        } else {
            throw new Exception("Consulta vacia");
        }
    }

    public function cargarUsuario($fila)
    {
        $u = new Usuario($fila[0], $fila[2]);
        $u->setClave($fila["clave"]);
        $u->setApellidos($fila["apellidos"]);
        $u->setEmail($fila["email"]);
        $u->setTelefono($fila["telefono"]);

        return $u;
    }

}