<?php
session_start();
if (!isset($_SESSION["user"])) {
  echo "<script language='javascript' type='text/javascript'>
    window.location.href='index.php';
    </script>";
  exit;
}
include 'cabecalho.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="content-language" content="pt-br">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Músculos de Aço</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .header {
      float: right;
    }

    .letra {
      font-size: small;
    }
  </style>
</head>

<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <div style="height: 100vh;">
    <div class="container-fluid">
      <hr>
      <br>
      <br>
      <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col" style="max-width: 1000px;">
          <div class="card mb-4 rounded-3 shadow-sm: 0" style="border: none;">
            <div style="font-size: 50px; margin-top: 12vh; font-weight: 700; margin-bottom: 24px; text-align: center; line-height: 1.1; max-width: 1200px;">
              <?php
              echo "Bem Vindo aos Planos";
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="card shadow-sm" style="height: 100%;">
              <div class="card-header">
                <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-diagram-3" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                    </svg>&nbsp;&nbsp;Mensal</b></h4>
              </div>
              <div class="card-body">
                <p>Plano Básico Mensal</p>
                <p>Descrição: Acesso ilimitado à academia por um mês.</p>
                <p>Preço: R$ 100,00 por mês</p>
                Benefícios:</br>
                - Acesso a todas as áreas de treinamento.</br>
                - Aulas de grupo gratuitas.</br>
                - Acesso a instrutores de fitness.</br>
                - Avaliação física inicial.</br>
                - Disponível para cancelamento a qualquer momento.</br>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card shadow-sm" style="height: 100%;">
              <div class="card-header">
                <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-ticket-detailed" viewBox="0 0 16 16">
                      <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5ZM5 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z" />
                      <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z" />
                    </svg>&nbsp;&nbsp;Anual</b></h4>
              </div>
              <div class="card-body">
                <p>Plano Básico Anual</p>
                <p>Descrição: Acesso ilimitado à academia por um ano inteiro.</p>
                <p>Preço: R$ 999,00 por ano (equivalente a R$ 83,25 por mês)</p>
                Benefícios:</br>
                - Acesso a todas as áreas de treinamento.<br>
                - Aulas de grupo gratuitas.<br>
                - Acesso a instrutores de fitness.<br>
                - Avaliação física inicial.<br>
                - Desconto especial para pagamento anual.<br>
                - Cancelamento disponível a qualquer momento, com reembolso proporcional.<br>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card shadow-sm" style="height: 100%;">
              <div class="card-header">
                <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-screwdriver" viewBox="0 0 16 16">
                      <path d="m0 1 1-1 3.081 2.2a1 1 0 0 1 .419.815v.07a1 1 0 0 0 .293.708L10.5 9.5l.914-.305a1 1 0 0 1 1.023.242l3.356 3.356a1 1 0 0 1 0 1.414l-1.586 1.586a1 1 0 0 1-1.414 0l-3.356-3.356a1 1 0 0 1-.242-1.023L9.5 10.5 3.793 4.793a1 1 0 0 0-.707-.293h-.071a1 1 0 0 1-.814-.419L0 1zm11.354 9.646a.5.5 0 0 0-.708.708l3 3a.5.5 0 0 0 .708-.708l-3-3z" />
                    </svg>&nbsp;&nbsp;Premium</b></h4>
              </div>
              <div class="card-body">
                <p>Plano Premium</p>
                <p>Descrição: O plano definitivo para resultados excepcionais.</p>
                <p>Preço: R$ 149,00 por mês</p>
                Benefícios:</br>
                - Acesso ilimitado a todas as áreas de treinamento.</br>
                - Treinamento personalizado com um instrutor dedicado.</br>
                - Avaliações físicas regulares e planos de treinamento personalizados.</br>
                - Aulas de grupo exclusivas.</br>
                - Acesso a sessões de treinamento em grupo reduzido.</br>
                - Descontos em serviços adicionais (nutrição, massagem, etc.).</br>
                - Prioridade nas reservas e eventos especiais da academia.</br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>