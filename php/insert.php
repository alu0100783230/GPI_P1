<meta charset = "UTF8">
<?php

  $Servidor = "localhost";
  $Usuario = "Usuario_Prueba";
  $Clave = "asaasa";
  $BaseDatos = "Prueba";

  $Conexion = new mysqli ($Servidor, $Usuario, $Clave, $BaseDatos);

  if (!$Conexion->connect_error) {


    $Accion = $_REQUEST["Accion"];


    if ($Accion!="Eliminar") {
      $Nombre = $_REQUEST["Nombre"];
      $Nif = $_REQUEST["Nif"];
      $Nacido = $_REQUEST["Nacido"];
      $Altura =$_REQUEST["Altura"];
    }


    $Id = $_REQUEST["Id"];

    // Para evitar error
    if ($Accion == "Eliminar" && $Id != "") {
      $SQL = "delete from Datos_Personales where id = $Id";
    } else {
      $SQL = "insert into Datos_Personales ";
      $SQL .= " (Nombre, NIF, Nacido, Altura) values ";
      $SQL .= " ('$Nombre', '$Nif', '$Nacido', '$Altura')";
    }

    if (!mysqli_query($Conexion, $SQL))
      echo "Error 2 " . mysqli_error ($Conexion);
    else
      echo "SI";

  } else {
    die ("POS NO");
  }

  $SQL = "select * from Datos_Personales order by id desc";
  $Resultado = mysqli_query ($Conexion, $SQL);

  while ($Tupla = mysqli_fetch_array($Resultado, MYSQLI_ASSOC)){
    echo "<p>"  . $Tupla["Id"] . " "  . $Tupla["Nombre"] . " " . $Tupla["Nif"] .
         " " . $Tupla["Nacido"] . " " . $Tupla["Altura"];
    echo "<a href = 'formulario.php?Accion=Editar&Id=".$Tupla["Id"]."'>Editar</a>";
    echo "<a href = 'insert.php?Accion=Eliminar&Id=".$Tupla["Id"]."'>Eliminar</a>";
    Id: <input type="text" name="Id"</input><br>
  }

  mysqli_close ($Conexion);
 ?>
