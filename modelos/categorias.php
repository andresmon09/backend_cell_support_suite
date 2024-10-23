<?php
   class categorias{
    //atributo
      public $conexion;

      //metodo costructor
      public function __construct($conexion) {
        $this->conexion = $conexion;
      }

      //metodos
      public function consulta(){
        $con = "SELECT * FROM categorias ORDER BY nombre";
        $res =mysqli_query($this->conexion, $con);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
      }
      public function eliminar ($id){
        $del = "DELETE FROM categorias WHERE id_categorias = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "la categoria ha sido eliminada";
        return $vec;
      }

      public function insertar($params){
      $ins = "INSERT INTO categorias(nombre) VALUES('$params->nombre')";
      mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec[ 'resultado'] = "OK";
        $vec[ 'mensaje'] = "La categoria ha sido guardada";
        return $vec;
      }  

      public function editar($id, $params){
        $editar = "UPDATE categorias SET nombre = '$params->nombre' WHERE id_categorias = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec[ 'resultado'] = "OK";
        $vec[ 'mensaje'] = "La categoria ha sido editada";
        return $vec;
      }

      public function filtro($valor){
        $filtro = "SELECT * FROM categorias WHERE nombre LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
      }
   }
?>