<?php

include_once 'db.php';

class Sucursales extends DB{
    
    function obtenerSucursales(){

        $query = $this->connect()->query('SELECT * FROM sucursal');

        return $query;
    }

    function obtenerSucursal($id){

        $query = $this->connect()->prepare('SELECT * FROM sucursal WHERE SucursalID = :id');

        $query->execute(['id' => $id]);

        return $query;
    }    
}
?>