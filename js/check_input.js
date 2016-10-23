function eval_data() {
  var form = document.forms["formulario"];

  var nombre = form["Nombre"].value;
  var nif    = form["Nif"].value;
  var fecha  = form["Fecha"].value;
  var altura = form["Altura"].value;

  var pre_text = "Los campos ";
  var obligatory = "";

  if (nombre == null || nombre == "")
    obligatory = obligatory + "'Nombre' ";
  if (nif == null || nif == "")
    obligatory = obligatory + "'Nif' ";
  if (fecha == null || fecha == "" )
    obligatory = obligatory + "'Fecha' ";
  if (altura == null || altura == "" )
    obligatory = obligatory + "'Altura' ";

  if (obligatory != "") {
    alert (pre_text.concat(obligatory).concat("son obligatorios"));
    return false;
  }
  
  return true;
}
