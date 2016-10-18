<?php
  include "./conexion.php";

  $Conexion = CrearConexion();
  $Nombre = $Nif = $Nacido = $Altura = "";
  $Boton = "Insertar";

  if ($Conexion) {
    $Accion = $_REQUEST["Accion"];
    $Id = $_REQUEST["Id"];
    if ($Accion == "Editar" && $Id != "") {
      $SQL = "select * from Datos_Personales where Id = $Id ";
      $Resultado = mysqli_query($Conexion, $SQL);

      if (!$Resultado) echo "MAL";

      $Tupla = mysqli_fetch_array($Resultado, MYSQLI_ASSOC);

      $Nombre = $Tupla["Nombre"];
      $Nif = $Tupla["Nif"];
      $Nacido = $Tupla["Nacido"];
      $Altura = $Tupla["Altura"];
      $BOton = "Modificar";
    }
  }
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Formulario</title>
  </head>
  <body>
    <form action="insert.php" method = "post">
      <p>Nombre: <input type="text" name="Nombre" value = "<?php echo $Nombre;?>"</input></p>
      <p>Nif: <input type="text" name="Nif" value = "<?php echo $Nif;?>"</input></p>
      <p>Fecha: <input type="text" name="Nacido" value = "<?php echo $Nacido;?>"</input></p>
      <p>Altura: <input type="text" name="Altura" value = "<?php echo $Altura;?>"</input></p>
      <p><input type="submit" name = "Accion" value = "<?php echo $Boton;?>">ENVIAR</input>
    </form>
  </body>
</html>
