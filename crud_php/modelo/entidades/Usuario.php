<?php

class Usuario{
    private $cedula;
    private $clave;
    private $email;
    private $telefono;
    private $nombre;
    private $apellidos;


function __construct($cedula, $nombre)
{
    $this->cedula = $cedula;
    $this->nombre = $nombre;
}
///
function setCedula($cedula)
{
    return $this->cedula = $cedula;
}
function getCedula()
{
    return $this->cedula;
}
///
function setNombre($nombre)
{
    return $this->nombre = $nombre;
}
function getNombre()
{
    return $this->nombre;
}
///
function setClave($clave)
{
    return $this->clave = $clave;
}
function getClave()
{
    return $this->clave;
}
///
function setEmail($email)
{
    return $this->email = $email;
}
function getEmail()
{
    return $this->email;
}
///
function setApellidos($apellidos)
{
    return $this->apellidos = $apellidos;
}
function getApellidos()
{
    return $this->apellidos;
}
///
function setTelefono($telefono)
{
    return $this->telefono = $telefono;
}
function getTelefono()
{
    return $this->telefono;
}

}