<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 
    require_once("../conexion.php");
    require_once("../modelos/clientes.php");

    $control = $_GET['control'];

    $clientes = new clientes($conexion);

    switch ($control) {
        case 'consulta';
           $vec = $clientes->consulta();
        break;
        case 'insertar';
           $json = file_get_contents('php://input');
      //   $json = '{"nombre":"prueba", "fo_categorias": "1", "descripcion":"ahshsh", "stock": "3", "precio":"300", "fo_proveedor":"prueba"}';
           $params = json_decode($json);
           $vec = $clientes->insertar($params);  
        break;
        case 'eliminar';
           $id = $_GET['id'];
           $vec = $clientes->eliminar($id);
        break;
        case 'editar';
           $json = file_get_contents('php://input');
           $params = json_decode($json);
           $id = $_GET['id'];
           $vec = $clientes->editar($id, $params);
        break;
        case 'filtro';
           $valor = $_GET['valor'];
           $vec = $clientes->filtro($valor);
        break;
        case 'ccliente';
        $valor = $_GET['valor'];
        $vec = $clientes->consultar_cliente($valor);
        break;



    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');
?>