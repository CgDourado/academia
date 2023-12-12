<?php
include 'conecta.php';
$id = $id;
$sql = "SELECT * FROM treinos WHERE id=$id";
$query = $conn->query($sql);
while ($dados = $query->fetch_array()) {
  $treino = $dados['treino'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
  <form id="treinoForm" action="cadtreinos.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Adiciona este campo oculto para enviar o ID -->
    <div class="form-group">
      <label id="titulo"><?php echo $treino ? 'Atualizar Treino:' : 'Criar Treino:'; ?></label>
      <textarea type="text" class="form-control" rows="10" name="treino" id="treino" style='margin-top: 10px' maxlength="8000" required><?php echo $treino; ?></textarea>
      <span id="caracteresRestantes">8000 caracteres restantes</span>
      <span id="avisoLimite" style="color: red;"></span>
      <br />
      <div class="d-grid gap-2 col-20 mx-auto">
        <button type="submit" class="btn btn-success" id="submitButton"><?php echo $treino ? 'Atualizar' : 'Criar'; ?></button>
      </div>
    </div>
  </form>


  <script>
    $(document).ready(function() {
      var limiteCaracteres = 8000;

      // Adiciona um evento de entrada ao textarea
      $("#treino").on("input", function() {
        // Obtém o comprimento do texto
        var comprimentoTexto = $(this).val().length;

        // Verifica se o comprimento excede o limite
        if (comprimentoTexto > limiteCaracteres) {
          // Trunca o texto para o limite
          $(this).val($(this).val().substring(0, limiteCaracteres));
          $("#avisoLimite").text("Limite de caracteres excedido!");
          $("#submitButton").prop("disabled", true); // Desabilita o botão de envio
        } else {
          $("#avisoLimite").text("");
          $("#submitButton").prop("disabled", false); // Habilita o botão de envio
        }

        // Atualiza a contagem de caracteres restantes
        var caracteresRestantes = limiteCaracteres - comprimentoTexto;
        $("#caracteresRestantes").text(caracteresRestantes + ' caracteres restantes');
      });
    });
  </script>
</body>

</html>