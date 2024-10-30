<?php
class usuarios {
   // Atributo
   public $conexion;

   // Método constructor
   public function __construct($conexion) {
      $this->conexion = $conexion;
   }

   // Método para consultar todos los usuarios
   public function consulta() {
      $con = "SELECT * FROM usuarios ORDER BY nombreus";
      $res = mysqli_query($this->conexion, $con);
      $vec = [];

      while ($row = mysqli_fetch_assoc($res)) {
         $vec[] = $row;
      }
      return $vec;
   }

   // Método para eliminar un usuario por ID
   public function eliminar($id) {
      $del = "DELETE FROM usuarios WHERE id_usuario = $id";
      mysqli_query($this->conexion, $del);
      $vec = [];
      $vec['resultado'] = "OK";
      $vec['mensaje'] = "El usuario ha sido eliminado";
      return $vec;
   }

   // Método para insertar un nuevo usuario
   public function insertar($params) {
      // Encriptar la clave usando SHA1
      $claveEncriptada = sha1($params->clave);

      $ins = "INSERT INTO usuarios (Identificacion, nombreus, celular, email, rol, clave) 
              VALUES ('$params->Identificacion', '$params->nombreus', '$params->celular', '$params->email', '$params->rol', '$claveEncriptada')";
      
      if (mysqli_query($this->conexion, $ins)) {
         return [
            'resultado' => "OK",
            'mensaje' => "El usuario ha sido guardado"
         ];
      } else {
         return [
            'resultado' => "ERROR",
            'mensaje' => "Error al guardar el usuario: " . mysqli_error($this->conexion)
         ];
      }
   }

   // Método para editar un usuario existente
   public function editar($id, $params) {
      // Encriptar la clave usando SHA1
      $claveEncriptada = sha1($params->clave);

      $editar = "UPDATE usuarios SET 
                  Identificacion = '$params->Identificacion', 
                  nombreus = '$params->nombreus', 
                  celular = '$params->celular', 
                  email = '$params->email', 
                  rol = '$params->rol', 
                  clave = '$claveEncriptada' 
                  WHERE id_usuario = $id";
      
      if (mysqli_query($this->conexion, $editar)) {
         return [
            'resultado' => "OK",
            'mensaje' => "El usuario ha sido editado"
         ];
      } else {
         return [
            'resultado' => "ERROR",
            'mensaje' => "Error al editar el usuario: " . mysqli_error($this->conexion)
         ];
      }
   }

   // Método para filtrar usuarios por un valor de búsqueda
   public function filtro($valor) {
      $filtro = "SELECT * FROM usuarios 
                 WHERE nombreus LIKE '%$valor%' 
                 OR Identificacion LIKE '%$valor%' 
                 OR celular LIKE '%$valor%' 
                 OR email LIKE '%$valor%' 
                 OR rol LIKE '%$valor%'";
      
      $res = mysqli_query($this->conexion, $filtro);
      $vec = [];

      while ($row = mysqli_fetch_assoc($res)) {
         $vec[] = $row;
      }
      return $vec;
   }
}
?>
