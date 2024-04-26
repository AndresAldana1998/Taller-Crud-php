<?php
require_once "../modelo/persistencia/CrudUsuarioImp.php";

class ControladorUsuario
{
    public static function actuar()
    {
        $accion = $_REQUEST['accion'];
        switch ($accion){
            case 'GUARDAR': 
                ControladorUsuario::guardar_usuario();
                break;
            default:
                throw new Exception('Accion incorrecta');        
        }
    }

    public static function guardar_usuario()
    {
        $cedula = @$_REQUEST['cc'];
        $clave = @$_REQUEST['pass'];
        $nombre = @$_REQUEST['nombre'];
        $apellidos = @$_REQUEST['apellidos'];
        $email = @$_REQUEST['email'];
        $telefono = @$_REQUEST['telefono'];

        $u = new Usuario($cedula, $nombre);
        $u->setApellidos($apellidos);
        $u->setEmail($email);
        $u->setTelefono($telefono);
        $u->setClave($clave);

        $crud = new CrudUsuarioImp();
        $crud->agregar($u);
        $total = $crud->contar();
        $msj = "Usuario agregado, total" . $total;
        header("Location: ../vistas/web/usuarios/agregar.php?msj=$msj");
    }
}

ControladorUsuario::actuar();