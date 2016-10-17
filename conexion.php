<meta charset = "UTF8">
<?php

  $Servidor = "localhost";
  $Usuario = "Usuario_Prueba";
  $Clave = "asaasa";
  $BaseDatos = "Prueba"

  $conn = new mysqli ($Servidor, $Usuario, $Clave, $BaseDatos);

  if ($conn->connect_error) die ("FALLO " . $conn->connect_error);
  echo "Funciono";
 ?>
