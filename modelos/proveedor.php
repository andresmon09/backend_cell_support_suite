<?php
   class proveedor{
    //atributo
      public $conexion;

      //metodo costructor
      public function __construct($conexion) {
        $this->conexion = $conexion;
      }

      //metodos
      public function consulta(){
        $con = "SELECT * FROM proveedor ORDER BY nombre";
        $res =mysqli_query($this->conexion, $con);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
      }
      public function eliminar ($id){
        $del = "DELETE FROM proveedor WHERE id_prov = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El proveedor ha sido eliminado";
        return $vec;
      }

      public function insertar($params){
      $ins = "INSERT INTO proveedor(nombre) VALUES('$params->nombre')";
      mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec[ 'resultado'] = "OK";
        $vec[ 'mensaje'] = "El proveedor ha sido guardado";
        return $vec;
      }  

      public function editar($id, $params){
        $editar = "UPDATE proveedor SET nombre = '$params->nombre' WHERE id_prov = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec[ 'resultado'] = "OK";
        $vec[ 'mensaje'] = "El proveedor ha sido editado";
        return $vec;
      }

      public function filtro($valor){
        $filtro = "SELECT * FROM proveedor WHERE nombre LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
      }
   }
?>