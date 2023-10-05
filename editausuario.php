<?php
include 'conecta.php';
$id = $id;
$sql = "SELECT * FROM usuario WHERE id=$id";
$query = $conn->query($sql);
while ($dados = $query->fetch_array()) {
  $nome = $dados['nome'];
  $email = $dados['email'];
  $telefone = $dados['telefone'];
  $cpf = $dados['cpf'];
  $data_nascimento = $dados['data_nascimento'];
  $peso = $dados['peso'];
  $altura = $dados['altura'];
  $convert_data_nascimento = strtotime($data_nascimento);
  $nascimento = date('d/m/Y', $convert_data_nascimento);
  $pagamento = $dados['pagamento'];
  $plano = $dados['plano'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/js-brasil/js-brasil.js"></script>
</head>

<body>
  <form id="editaForm" action="edusuario.php?id=<?php echo $id; ?>" method="POST">
    <div class="form-group">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>" required />
      <br />
      <label>Email</label>
      <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required />
      <br />
      <label>Telefone</label>
      <input type="tel" class="form-control" id='telefone' name="telefone" value="<?php echo $telefone; ?>" required />
      <script>
        $(document).on('focus', '#telefone', function() {
          $(this).mask('(00) 00000-0000');
        });
      </script>
      <br />
      <label>CPF</label>
      <input type="cpf" class="form-control cpf-field" id="cpf" name="cpf" value="<?php echo $cpf; ?>" required />
      <script>
        $(document).on('focus', '#cpf', function() {
          $(this).mask('000.000.000-00');
        });
      </script>
      <br />
      <label>Ano de Nascimento</label>
      <input type="text" class="form-control" id='data_nascimento' name="data_nascimento" placeholder="Insira a Data de Nascimento" value="<?php echo $nascimento; ?>" required />
      <script>
        $(document).on('focus', '#data_nascimento', function() {
          $(this).mask('00/00/0000');
        });
      </script>
      <br />
      <label>Peso (kg)</label>
      <input id="peso" type="number" class="form-control" name="peso" step="0.01" value="<?php echo $peso; ?>" required />
      <br />
      <label>Altura</label>
      <input id="altura" type="number" class="form-control" name="altura" step="0.01" value="<?php echo $altura; ?>" required />
      <br>
      <div class="row">
        <div class="col">
          <label for="plano">Plano:</label>
          <select id="plano" name="plano" class="form-select" aria-label="Default select example">
            <option value="" <?php echo ($plano == '' ? 'selected' : ''); ?>>...</option>
            <option value="Anual" <?php echo ($plano == 'Anual' ? 'selected' : ''); ?>>Anual</option>
            <option value="Mensal" <?php echo ($plano == 'Mensal' ? 'selected' : ''); ?>>Mensal</option>
          </select>
        </div>
        <div class="col">
          <label for="pagamento">Pagamento:</label>
          <select id="pagamento" name="pagamento" class="form-select" aria-label="Default select example">
            <option value="" <?php echo ($pagamento == '' ? 'selected' : ''); ?>>...</option>
            <option value="Pago" <?php echo ($pagamento == 'Pago' ? 'selected' : ''); ?>>Pago</option>
            <option value="A Pagar" <?php echo ($pagamento == 'A Pagar' ? 'selected' : ''); ?>>A Pagar</option>
            <option value="Negociando" <?php echo ($pagamento == 'Negociando' ? 'selected' : ''); ?>>Negociando</option>
          </select>
        </div>
      </div>
      <br>
      <div class="d-grid gap-2 col-20 mx-auto">
        <button type="submit" id="submit" class="btn btn-success editar-button">Atualizar</button>
      </div>
    </div>
  </form>
  <script>
    $(document).ready(function() {
      // Initialize the form submission event handler
      $("#editaForm").submit(function(event) {
        // Get the value of the CPF input field within the current modal
        let cpf_value = $(this).find(".cpf-field").val();

        // Perform CPF validation
        if (jsbrasil.validateBr.cpf(cpf_value)) {
          // CPF is valid, continue with form submission
          $(this).find(".cpf-field").css("background-color", "initial");
        } else {
          // CPF is invalid, prevent form submission and highlight the field
          event.preventDefault();
          $(this).find(".cpf-field").css("background-color", "#facdcd");
          alert("CPF inválido. Por favor, insira um CPF válido.");
        }
      });
    });
  </script>
</body>

</html>