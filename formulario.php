<?php
  error_reporting(0);
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
      $Boton = "Editar";
      $Id = $Tupla["Id"];
    }
  }
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Formulario</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="./js/check_input.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="login-panel panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Formulario</h3>
            </div>
            <div class="panel-body">
              <form action="insert.php" name="formulario" onsubmit="return eval_data();" method="post">
                <div class="form-group">
                  <input class="form-control" id="Nombre" placeholder="Nombre" name="Nombre" type="text" autofocus value = "<?php echo $Nombre;?>">
                </div>
                <div class="form-group">
                  <input class="form-control" id="Nif" placeholder="NIF" name="Nif" type="text" autofocus value = "<?php echo $Nif;?>"</input>
                </div>
                <div class="form-group">
                  <input class="form-control" id="Fecha" placeholder="Fecha" name="Nacido" type="date" autofocus value = "<?php echo $Nacido;?>"</input>
                </div>
                <div class="form-group">
                  <input class="form-control" id="Altura" placeholder="Altura" name="Altura" type="number" autofocus value = "<?php echo $Altura;?>"</input>
                </div>
                <input class="form-control" id="Id" placeholder="Id" name="Id" type="hidden" autofocus value = "<?php echo $Id;?>"</input>
                <br>
                <input type="submit" class="btn btn-lg btn-success btn-block" name="Accion" value = "<?php echo $Boton;?>"</input>
              </form>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>
