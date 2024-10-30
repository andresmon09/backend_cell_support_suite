<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 
    require_once("../conexion.php");
    require_once("../modelos/tickets.php");

    $control = $_GET['control'];

    $tickets = new tickets($conexion);

    switch ($control) {
        case 'consulta';
           $vec = $tickets->consulta();
           $datosj = json_encode($vec);
           echo $datosj;
        break;
        case 'insertar';
           $json = file_get_contents('php://input');
      //   $json = '{"nombre":"prueba", "fo_categorias": "1", "descripcion":"ahshsh", "stock": "3", "precio":"300", "fo_proveedor":"prueba"}';
           $params = json_decode($json);
           $texto_arreglo = serialize($params->productos);
           $params->productos = $texto_arreglo;  

           $vec = $tickets->insertar($params);
           $datosj = json_encode($vec);
           echo $datosj;
           header('Content-Type: application/json');
        break;
        case 'eliminar';
           $id = $_GET['id'];
           $vec = $tickets->eliminar($id);
           $datosj = json_encode($vec);
           echo $datosj;
           header('Content-Type: application/json');
        break;
        case 'editar';
           $json = file_get_contents('php://input');
           $params = json_decode($json);
           $id = $_GET['id'];
           $vec = $tickets->editar($id, $params);
           $datosj = json_encode($vec);
           echo $datosj;
           header('Content-Type: application/json');
        break;
        case 'productos';
           $id = $_GET['id'];
           $vec = $tickets->consultap($id);
           $datosj = json_encode($vec);
           echo $datosj;
           header('Content-Type: application/json');
        break;

    }
?>