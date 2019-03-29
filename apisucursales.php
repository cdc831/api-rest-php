
<?php

include_once 'sucursales.php';

class ApiSucursales{

    function getAll(){

        $sucursal = new Sucursales();

        $arraySucursal = array();
        $arraySucursal["items"] = array();

        $res = $sucursal->obtenerSucursales();

        if($res->rowCount()){

            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "id" => $row['SucursalID'],
                    "nombre" => $row['Nombre'],
                    "imagen" => $row['Direccion'],
                );
                array_push($arraySucursal["items"], $item);
            }
        
            //echo json_encode($arraySucursal);
            $this->printJSON($arraySucursal);
        }else{
            //echo json_encode(array('mensaje' => 'No hay elementos'));
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }


    function getById($id){

        $sucursal = new Sucursales();

        $arraySucursal = array();
        $arraySucursal["items"] = array();

        $res = $sucursal->obtenerSucursal($id);

        if($res->rowCount()){

            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "id" => $row['SucursalID'],
                    "nombre" => $row['Nombre'],
                    "imagen" => $row['Direccion'],
                );
                array_push($arraySucursal["items"], $item);
            }
        
            //echo json_encode($arraySucursal);
            $this->printJSON($arraySucursal);
        }else{
            //echo json_encode(array('mensaje' => 'No hay elementos'));
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }
    

    function error($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }
    

    function printJSON($array){
        echo '<code>'.json_encode($array).'</code>';
    }

}



?>