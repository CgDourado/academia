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
  <form action="cadtreinos.php?id=<?php echo $id; ?>" method="POST">
    <div class="form-group">
      <label id="titulo"><?php echo $treino ? 'Atualizar Treino:' : 'Criar Treino:'; ?></label>
      <textarea type="text" class="form-control" rows="10" name="treino" id="treino" style='margin-top: 10px' required><?php echo $treino; ?></textarea>
      <br />
      <div class="d-grid gap-2 col-20 mx-auto">
        <button type="submit" class="btn btn-success"><?php echo $treino ? 'Atualizar' : 'Criar'; ?></button>
      </div>
    </div>
  </form>
</body>

</html>