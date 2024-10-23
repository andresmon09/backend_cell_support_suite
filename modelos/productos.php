<?php
   class productos{
    //atributo
      public $conexion;

      //metodo costructor
      public function __construct($conexion) {
        $this->conexion = $conexion;
      }

      //metodos
      public function consulta(){
        $con = "SELECT p.*, c.nombre AS categorias, pr.nombre AS proveedor FROM productos p
                INNER JOIN categorias c ON p.fo_categorias = c.id_categorias
                INNER JOIN proveedor pr ON p.fo_proveedor = pr.id_proveedor
                ORDER BY p.nombre";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
      }
      public function eliminar ($id){
        $del = "DELETE FROM productos WHERE id_productos = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El producto ha sido eliminado";
        return $vec;
      }

      public function insertar($params){
      $ins = "INSERT INTO productos(nombre, descripcion, precio, stock, fo_categorias, fo_proveedor) 
              VALUES('$params->nombre', '$params->descripcion', '$params->precio', '$params->stock', '$params->fo_categorias', '$params->fo_proveedor')";
      mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec[ 'resultado'] = "OK";
        $vec[ 'mensaje'] = "El productos ha sido guardada";
        return $vec;
      }  

      public function editar($id, $params){
        $editar = "UPDATE productos SET nombre = '$params->nombre', descripcion = '$params->descripcion', precio = '$params->precio', stock = '$params->stock', fo_categorias = '$params->fo_categorias', fo_proveedor = '$params->fp_proveedor' WHERE id_productos = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec[ 'resultado'] = "OK";
        $vec[ 'mensaje'] = "El productos ha sido editada";
        return $vec;
      }

      public function filtro($valor){
        $filtro = "SELECT p.*, c.nombre AS categorias, pr.nombre AS proveedor FROM productos p
                   INNER JOIN categorias c ON p.fo_categorias = c.id_categorias
                   INNER JOIN proveedor pr ON p.fo_proveedor = pr.id_proveedor
                   WHERE nombre LIKE '%$valor%' OR .p.nombre LIKE '%$valor%' OR categorias LIKE '%$valor%' OR proveedor LIKE '%$valor%' ";
        
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }

        return $vec;
      }


   }



?>