<?php
include 'conecta.php';
$id = $id;
$sql = "SELECT * FROM treinos WHERE id=$id";
$query = $conn->query($sql);
while ($dados = $query->fetch_array()) {
  $treino = $dados['treino'];
  $nomeCliente = $dados['nome']; // Adicione esta linha para obter o nome do cliente
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
  <form action="cadtreinos.php?id=<?php echo $id; ?>" method="POST" id="formTreino">
    <div class="form-group">
      <br />
      <label>Visualizar o Treino:</label>
      <textarea type="text" class="form-control" rows="10" name="treino" id="treino" style='margin-top: 10px' readonly><?php echo $treino; ?></textarea>
      <br />
      <div class="modal-footer">
        <div class="d-flex justify-content-end align-items-center">
          <a href="#" data-bs-toggle="tooltip" title="Baixar PDF" style="margin-right: 10px; text-decoration: none;" onclick="baixarTreino(<?php echo $id; ?>, '<?php echo $nomeCliente; ?>')">
            <span style="font-size: 24px; cursor: pointer;">⬇️</span>
          </a>
          <a href="excluirtreino.php?id=<?php echo $id; ?>" data-bs-toggle="tooltip" title="Excluir" style="text-decoration: none;">
            <span style="font-size: 24px; cursor: pointer;">🗑️</span>
          </a>
        </div>
      </div>
    </div>
  </form>

  <?php
  // Conecta ao banco de dados (substitua pelas suas credenciais)
  include 'conecta.php';

  // Verifica a conexão
  if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
  }

  // Obtém o id do cliente (substitua '1' pelo método real que você usa para obter o id do cliente)
  $idCliente = $id;

  // Consulta o banco de dados para obter o nome do cliente
  $id = $id;
  $sql = "SELECT nome FROM treinos WHERE id=$id";
  $query = $conn->query($sql);

  // Verifica se a consulta foi bem-sucedida
  if ($query->num_rows > 0) {
    $row = $query->fetch_assoc();
    $nomeCliente = $row['nome'];
  } else {
    // Se não houver resultados, você pode lidar com isso conforme necessário
    $nomeCliente = "Nome não encontrado";
  }

  // Fecha a conexão
  $conn->close();
  ?>

  <script>
    function baixarTreino(id, nomeCliente) {
      // Obtém o treino do textarea
      var treino = document.getElementById('treino').value;

      // Substitui quebras de linha por <br>
      treino = treino.replace(/\n/g, "<br>");

      // Cria um link direto para o script pdf.php com os parâmetros necessários
      var link = document.createElement('a');
      link.href = 'pdf.php?treino=' + encodeURIComponent(treino) + '&cliente=' + encodeURIComponent(nomeCliente) + '&id=' + id;
      link.target = '_blank';

      // Adiciona o link à página e simula o clique
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
  </script>
</body>

</html>
-