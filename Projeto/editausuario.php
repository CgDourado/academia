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
  $sexo = $dados['sexo'];
  $treinador = $dados['treinador'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/js-brasil/js-brasil.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
  <form id="editaForm" action="edusuario.php?id=<?php echo $id; ?>" method="POST">
    <div class="form-group text-start">
      <label>Nome</label>
      <input type="text" class="form-control nome-field" name="nome" value="<?php echo $nome; ?>" required />
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
      <input type="cpf" class="form-control cpf-field" id="cpf" name="cpf" value="<?php echo $cpf; ?>" required readonly />
      <br />
      <label>Ano de Nascimento</label>
      <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $data_nascimento; ?>" required />
      <br />
      <label>Peso (kg)</label>
      <input id="peso" type="text" class="form-control" name="peso" value="<?php echo $peso; ?>" required />
      <script>
        // Adiciona um ouvinte de eventos ao campo de peso
        $(document).on('input', '#peso', function() {
          // Substitui qualquer ponto por vírgula
          this.value = this.value.replace(/\./g, ',');

          // Verifica se há mais de duas casas decimais após a vírgula e ajusta conforme necessário
          var parts = this.value.split(',');
          if (parts.length > 1) {
            parts[1] = parts[1].slice(0, 2); // Limita a duas casas decimais
            this.value = parts.join(',');
          }
        });
      </script>
      <br />
      <label>Altura</label>
      <input id="altura" type="number" class="form-control" name="altura" step="0.01" value="<?php echo $altura; ?>" required />
      <br>
      <div class="row">
        <div class="col">
          <label for="sexo">Sexo:</label>
          <select id="sexo" name="sexo" class="form-select" aria-label="Default select example" required>
            <option value="" <?php echo ($sexo == '' ? 'selected' : ''); ?> selected disabled>...</option>
            <option value="Homem" <?php echo ($sexo == 'Homem' ? 'selected' : ''); ?>>Homem</option>
            <option value="Mulher" <?php echo ($sexo == 'Mulher' ? 'selected' : ''); ?>>Mulher</option>
            <option value="Outro" <?php echo ($sexo == 'Outro' ? 'selected' : ''); ?>>Outro</option>
          </select>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
          <label for="plano">Plano:</label>
          <select id="plano" name="plano" class="form-select" aria-label="Default select example">
            <option value="..." <?php echo ($plano == '' ? 'selected' : ''); ?> selected disabled>...</option>
            <option value="Anual" <?php echo ($plano == 'Anual' ? 'selected' : ''); ?>>Anual</option>
            <option value="Mensal" <?php echo ($plano == 'Mensal' ? 'selected' : ''); ?>>Mensal</option>
          </select>
        </div>
        <div class="col">
          <label for="pagamento">Pagamento:</label>
          <select id="pagamento" name="pagamento" class="form-select" aria-label="Default select example">
            <option value="..." <?php echo ($pagamento == '' ? 'selected' : ''); ?> selected disabled>...</option>
            <option value="Pago" <?php echo ($pagamento == 'Pago' ? 'selected' : ''); ?>>Pago</option>
            <option value="A Pagar" <?php echo ($pagamento == 'A Pagar' ? 'selected' : ''); ?>>A Pagar</option>
            <option value="Negociando" <?php echo ($pagamento == 'Negociando' ? 'selected' : ''); ?>>Negociando</option>
          </select>
        </div>
      </div>
      <br>
      <?php
      if (isset($_SESSION["cargo"])) {
        $cargo = $_SESSION["cargo"];
        include 'conecta.php';

        if ($conn->connect_error) {
          die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        $sql = "SELECT nome FROM treinadores";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          echo '<div class="row">
            <div class="col">
                <label for="treinador">Treinador:</label>
                <select id="treinador" name="treinador" class="form-select" aria-label="Default select example" required>
                    <option value="" selected disabled>...</option>';

          while ($row = $result->fetch_assoc()) {
            $selected = ($treinador === $row['nome']) ? 'selected' : '';
            echo '<option value="' . $row['nome'] . '" ' . $selected . '>' . $row['nome'] . '</option>';
          }

          echo '</select>
            </div>
        </div>';
        } else {
          echo '<div class="row">
            <div class="col">
                <label for="treinador">Treinador:</label>
                <select id="treinador" name="treinador" class="form-select" aria-label="Default select example" required>
                    <option value="" selected disabled>Nenhum treinador encontrado!</option>
                </select>
            </div>
        </div>';
        }

        $conn->close();
      }
      ?>
      <style>
        .disabled-select {
          pointer-events: none;
          background-color: #f2f2f2;
          /* Cor de fundo cinza */
          opacity: 0.5;
          /* Opacidade reduzida */
        }
      </style>
      <script>
        document.addEventListener("DOMContentLoaded", function() {
          var cargo = "<?php echo $cargo; ?>";
          if (cargo === 'treinador') {
            var selectElement = document.getElementById('treinador');
            selectElement.classList.add('disabled-select');
          }
        });
      </script>
      <br />
      <div class="d-grid gap-2 col-20 mx-auto">
        <button type="submit" id="submit" class="btn btn-success editar-button">Atualizar</button>
      </div>
    </div>
  </form>
  <script>
    $(document).ready(function() {
      // Inicialize o manipulador de eventos de envio de formulário
      $("#editaForm").submit(function(event) {
        // Obtenha o valor do campo de entrada CPF dentro do modal atual
        let cpf_value = $(this).find(".cpf-field").val();

        // Realiza a validação de CPF
        if (jsbrasil.validateBr.cpf(cpf_value)) {
          // CPF é válido, continue com o envio do formulário
          $(this).find(".cpf-field").css("background-color", "initial");
        } else {
          // CPF é inválido, impede o envio do formulário e destaca o campo
          event.preventDefault();
          $(this).find(".cpf-field").css("background-color", "#facdcd");
          alert("CPF inválido. Por favor, insira um CPF válido.");
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Função para formatar o nome com a primeira letra de cada palavra maiúscula
      function formatarNome() {
        var nomeInput = $(this).val();

        nomeInput = nomeInput.toLowerCase().replace(/(^|\s)\S/g, function(l) {
          return l.toUpperCase();
        });

        $(this).val(nomeInput);
      }

      // Aplica a formatação quando o campo Nome perde o foco
      $(document).on('blur', '.nome-field', formatarNome);
    });
  </script>
  <script>
    // Verifica se uma opção válida foi selecionada para 'sexo'
    document.getElementById('sexo').addEventListener('change', function() {
      if (this.value === "") {
        alert("Por favor, selecione uma opção válida para o Sexo.");
      }
    });
  </script>
</body>

</html>