<?php
   class clientes {
      // Atributo
      public $conexion;

      // Método constructor
      public function __construct($conexion) {
         $this->conexion = $conexion;
      }

      // Método para consultar todos los clientes
      public function consulta() {
         $con = "SELECT * FROM clientes ORDER BY nombre";
         $res = mysqli_query($this->conexion, $con);
         $vec = [];

         while ($row = mysqli_fetch_assoc($res)) {
            $vec[] = $row;
         }
         return $vec;
      }

      // Método para eliminar un cliente por ID
      public function eliminar($id) {
         $del = "DELETE FROM clientes WHERE id_cliente = $id";
         mysqli_query($this->conexion, $del);
         $vec = [];
         $vec['resultado'] = "OK";
         $vec['mensaje'] = "El cliente ha sido eliminado";
         return $vec;
      }

      // Método para insertar un nuevo cliente
      public function insertar($params) {
         $ins = "INSERT INTO clientes(nombre, direccion, celular, identificacion, correo) 
                 VALUES('$params->nombre', '$params->direccion', '$params->celular', '$params->identificacion', '$params->correo')";
         mysqli_query($this->conexion, $ins);
         $vec = [];
         $vec['resultado'] = "OK";
         $vec['mensaje'] = "El cliente ha sido guardado";
         return $vec;
      }

      // Método para editar un cliente existente
      public function editar($id, $params) {
         $editar = "UPDATE clientes SET nombre = '$params->nombre', direccion = '$params->direccion', celular = '$params->celular', identificacion = '$params->identificacion', correo = '$params->correo' WHERE id_cliente = $id";
         mysqli_query($this->conexion, $editar);
         $vec = [];
         $vec['resultado'] = "OK";
         $vec['mensaje'] = "El cliente ha sido editado";
         return $vec;
      }

      // Método para filtrar clientes por un valor de búsqueda
      public function filtro($valor) {
         $filtro = "SELECT * FROM clientes 
                    WHERE nombre LIKE '%$valor%' 
                    OR direccion LIKE '%$valor%' 
                    OR celular LIKE '%$valor%' 
                    OR identificacion LIKE '%$valor%' 
                    OR correo LIKE '%$valor%'";
         
         $res = mysqli_query($this->conexion, $filtro);
         $vec = [];

         while ($row = mysqli_fetch_assoc($res)) {
            $vec[] = $row;
         }
         return $vec;
      }

      public function consultar_cliente($valor) {
         $filtro = "SELECT * FROM clientes 
                    WHERE identificacion = '$valor' 
                    ORDER BY nombre";
         
         $res = mysqli_query($this->conexion, $filtro);
         $vec = [];

         while ($row = mysqli_fetch_assoc($res)) {
            $vec[] = $row;
         }
         return $vec;
      }
   }
?>
