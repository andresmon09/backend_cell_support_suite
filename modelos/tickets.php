<?php
   class tickets {
      // Atributo
      public $conexion;

      // Método constructor
      public function __construct($conexion) {
         $this->conexion = $conexion;
      }

      // Método para consultar todos los tickets
      public function consulta() {
         $con = "SELECT tickets.*, clientes.nombre AS nombre_cliente FROM tickets 
           JOIN clientes ON tickets.fo_cliente = clientes.id_cliente 
           ORDER BY tickets.fecha";
         $res = mysqli_query($this->conexion, $con);
         $vec = [];

         while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
         }
         return $vec;
      }

      // Método para eliminar un ticket por su id_ticket
      public function eliminar($id) {
         $del = "DELETE FROM tickets WHERE id_ticket = $id";
         mysqli_query($this->conexion, $del);
         $vec = [];
         $vec['resultado'] = "OK";
         $vec['mensaje'] = "El ticket ha sido eliminado";
         return $vec;
      }

      // Método para insertar un nuevo ticket
      public function insertar($params) {
         $ins = "INSERT INTO tickets (fo_cliente, fecha, producto, subtotal, total) 
                 VALUES ('$params->fo_cliente', '$params->fecha', '$params->productos', '$params->subtotal', '$params->total')";
         mysqli_query($this->conexion, $ins);
         $vec = [];
         $vec['resultado'] = "OK";
         $vec['mensaje'] = "El ticket ha sido guardado";
         return $vec;
      }

      // Método para editar un ticket existente por su id_ticket
      public function editar($id, $params) {
         $editar = "UPDATE tickets 
                    SET fo_cliente = '$params->fo_cliente', 
                        fecha = '$params->fecha', 
                        producto = '$params->producto', 
                        subtotal = '$params->subtotal', 
                        total = '$params->total' 
                    WHERE id_ticket = $id";
         mysqli_query($this->conexion, $editar);
         $vec = [];
         $vec['resultado'] = "OK";
         $vec['mensaje'] = "El ticket ha sido editado";
         return $vec;
      }

      // Método para filtrar tickets por un valor específico (por ejemplo, por producto)
      public function consultap($id) {
         $con = "SELECT producto from tickets WHERE id_ticket = $id";
         $res = mysqli_query($this->conexion, $con);
         $row = mysqli_fetch_array($res);
         $vec = unserialize($row[0]);

         return $vec;
      }
   }
?>
