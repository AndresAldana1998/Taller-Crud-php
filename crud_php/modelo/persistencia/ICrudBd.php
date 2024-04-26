<?php

interface ICrudBd {
    public function consultarPorId($id);
    public function consultarTodo();
    public function agregar($objeto);
    public function eliminarPorId($id);
    public function editar($objeto);
    public function contar();
}