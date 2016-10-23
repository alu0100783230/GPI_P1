<meta charset = "UTF8">
<?php

  $Servidor = "localhost";
  $Usuario = "Usuario_Prueba";
  $Clave = "asaasa";
  $BaseDatos = "Prueba";

  $Conexion = new mysqli ($Servidor, $Usuario, $Clave, $BaseDatos);

  if (!$Conexion->connect_error) {

    $Accion = $_REQUEST["Accion"];


    // Para evitar error
    if ($Accion == "Eliminar") {
      $Id =  $_REQUEST["Id"];
      $SQL = "delete from Datos_Personales where Id = $Id";
    } else {

      $Nombre = $_REQUEST["Nombre"];
      $Nif = $_REQUEST["Nif"];
      $Nacido = $_REQUEST["Nacido"];
      $Altura =$_REQUEST["Altura"];

      if ($Accion == "Editar") {
        $Id =  $_REQUEST["Id"];
        $SQL = "update Datos_Personales set ";
        $SQL .= "Nombre='$Nombre', ";
        $SQL .= "Altura='$Altura', ";
        $SQL .= "Nif='$Nif', ";
        $SQL .= "Nacido='$Nacido' ";
        $SQL .= " where Id = '$Id'";

      } else if ($Accion == "Insertar") {
        $SQL = "insert into Datos_Personales ";
        $SQL .= " (Nombre, NIF, Nacido, Altura) values ";
        $SQL .= " ('$Nombre', '$Nif', '$Nacido', '$Altura')";
      }
    }


    if (!mysqli_query($Conexion, $SQL))
      echo "Error 2 " . mysqli_error ($Conexion);

  } else {
    die ("Ocurrió un error al conectar con al base de datos " . $Conexion->connect_error);
  }

  $SQL = "select * from Datos_Personales order by id desc";
  $Resultado = mysqli_query ($Conexion, $SQL);

  ?>
   <head>
     <meta charset="utf-8">
     <title>Datos</title>
     <link href="css/style.css" rel="stylesheet">
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <script src="js/check_input.js"></script>
   </head>
   <body>
     <div class="container-fluid">
       <h1> Panel de control </h1>
       <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>NIF</th>
            <th>Fecha nacimiento</th>
            <th>Altura</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
   <?

  while ($Tupla = mysqli_fetch_array($Resultado, MYSQLI_ASSOC)){
    echo "<tr>";

    echo "<td>"  . $Tupla["Id"] . "</td><td>"  . $Tupla["Nombre"] . "</td><td>" . $Tupla["Nif"] .
         "</td><td>" . $Tupla["Nacido"] . "</td><td>" . $Tupla["Altura"] . "</td>";

    echo "<td><a href = 'formulario.php?Accion=Editar&Id=".$Tupla["Id"]."'>Editar</a></td>";
    echo "<td><a href = 'insert.php?Accion=Eliminar&Id=".$Tupla["Id"]."'>Eliminar</a></td>";

    echo "</tr>";
  }

  ?>
        </tbody>
      </table>
    </div>
  </body>
  <?

  mysqli_close ($Conexion);
 ?>
