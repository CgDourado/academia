<?php
session_start();
if (!isset($_SESSION["user"])) {
  echo "<script language='javascript' type='text/javascript'>
    window.location.href='index.php';
    </script>";
  exit;
}
include 'cabecalho.php';
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

    .mostrar-senha {
      margin-top: 4px;
      /* Ajuste esta margem conforme necessário */
      margin-left: 1px;
    }

    .icon-lg {
      width: 48px;
      /* Ajuste o tamanho conforme necessário */
      height: 48px;
      /* Ajuste o tamanho conforme necessário */
    }
  </style>
</head>

<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <div class="container-fluid" style="border: none;">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="48" fill="currentColor" class="bi bi-arrow-left-square" onclick="goBack()" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
    </svg>

    <script>
      function goBack() {
        window.history.back();
      }
    </script>
    <br>
    <br>
    <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col" style="max-width: 400px;">
        <div class="card mb-4 rounded-3 shadow-sm: 0" style="border: none;">
          <div style="font-size: 50px; margin-top: 12vh; font-weight: 700; margin-bottom: 24px; text-align: center; line-height: 1.1; max-width: 1200px;       ">Inscreva-se
          </div>
          <div class="card-body">
            <form name="criar_conta" action="criarconta.php" method="POST">
              <label class='form-label' style="float: left; margin: 1px;">Nome</label>
              <input class='form-control' type='text' name='nome' required placeholder="Digite seu nome" />
              <br />
              <label class='form-label' style="float: left; margin: 1px;">Usuário</label>
              <input class='form-control' type='text' name='usuario' required placeholder="Digite seu login" />
              <br />
              <label class='form-label' style="float: left; margin: 1px;">Senha</label>
              <input class='form-control' type='password' name='senha' id="senha" placeholder='Digite a sua senha' required />
              <div class="mostrar-senha" style="float: left;">
                <input type="checkbox" id="chk" float: left> Mostrar Senha</input>
                <script>
                  const senha = document.getElementById("senha");
                  const chk = document.getElementById("chk");

                  chk.onchange = function(e) {
                    senha.type = chk.checked ? "text" : "password";
                  };
                </script>
              </div>
              <br /><br />
              <button type="submit" aria-disabled="false" role="button" tabindex="0" style="user-select: none; border: none; transition: background 20ms ease-in 0s; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; white-space: nowrap; height: 36px; border-radius: 4px; color: rgb(111, 191, 132); font-size: 14px; line-height: 1; padding-left: 12px; padding-right: 12px; font-weight: 500; background: rgb(217, 255, 227); box-shadow: rgba(15, 15, 15, 0.1) 0px 1px 2px, rgba(111, 191, 132, 0.3) 0px 0px 0px 1px inset; margin-top: 6px; margin-bottom: 12px; width: 100%;">Criar Conta</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>