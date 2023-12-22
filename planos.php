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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet.css">

  <style>
    .header {
      float: right;
    }

    .letra {
      font-size: small;
    }

    .card {
      border-radius: 5%;
      /* Você pode ajustar o valor conforme necessário */
    }
  </style>
</head>

<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <div style="height: 100vh;" class="mx-auto">
    <div class="container-fluid">
      <br>
      <br>
      <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col" style="max-width: 1000px;">
          <div class="card mb-4 rounded-3 shadow-sm: 0 mx-auto" style="border: none; background-color: #ececec;">
            <div style="font-size: 50px; margin-top: 12vh; font-weight: 700; margin-bottom: 24px; text-align: center; line-height: 1.1; max-width: 1200px; background-color: #ececec;">
              <?php
              echo "Bem Vindo aos Planos";
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-4 mx-auto">
            <div class="card text-bg-dark mb-3" style="height: 100%;">
              <div class="card-header">
                <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#e78834" class="bi bi-calendar2-date" viewBox="0 0 16 16">
                      <path d="M6.445 12.688V7.354h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23" />
                      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                      <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z" />
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
          <div class="col-sm-4 mx-auto">
            <div class="card text-bg-dark mb-3" style="height: 100%;">
              <div class="card-header">
                <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#e78834" class="bi bi-calendar2-minus" viewBox="0 0 16 16">
                      <path d="M5.5 10.5A.5.5 0 0 1 6 10h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5" />
                      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                      <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z" />
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
        </div>
      </div>
    </div>
  </div>
</body>

</html>