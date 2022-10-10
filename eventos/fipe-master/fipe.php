<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Documento sem título</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>
$(document).ready(function() {
      var urlBase = "//fipe.parallelum.com.br/api/v1/carros/marcas";

      /** Marcas**/

      $.getJSON(urlBase, function(data) {
        var items = ["<option value=\"\">ESCOLHA UMA MARCA</option>"];
        $.each(data, function(key, val) {
          items += ("<option value='" + val.codigo + "'>" + val.nome + "</option>");
        });
        $("#marcas").html(items);
      });

      /** Veiculo**/

      $("#marcas").change(function() {
        $.getJSON(urlBase + "/" + jQuery("#marcas").val() + "/" + "modelos", function(data) {
          var items = ["<option value=\"\">ESCOLHA UM VEICULO</option>"];
          $.each(data.modelos, function(key, val) {
            items += ("<option value='" + val.codigo + "'>" + val.nome + "</option>");
          });
          $("#modelos").html(items);
        });
      });

      /** Ano**/

      $("#modelos").change(function() {
        $.getJSON(urlBase + "/" + jQuery("#marcas").val() + "/" + "modelos" + "/" + jQuery("#modelos").val() + "/" + "anos", function(data) {
          var items = ["<option value=\"\">ESCOLHA O ANO</option>"];
          $.each(data, function(key, val) {
            console.log(data)
            items += ("<option value='" + val.codigo + "'>" + val.nome + "</option>");
          });
          $("#ano").html(items);
        });
      });
    });
</script>
</head>

<body>
  <select id="marcas">
  </select>
  <select id="modelos">
  </select>
  <select id="ano">
  </select>
</body>

</html>