<?php
session_start();
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Quicksand:wght@300;500&display=swap" rel="stylesheet">
  <style>
    body {
      background-image: url("css/academia2.jpg");
      background-size: cover;
      /* Isso faz com que a imagem de fundo cubra toda a área da tela */
      background-position: center;
      /* Isso centraliza a imagem de fundo */
      background-repeat: no-repeat;
      /* Isso evita a repetição da imagem de fundo */
    }

    .header {
      float: right;
    }

    .btn {
      width: 100%;
    }

    .btn-secondary {
      background-color: #ff0000;
      /* Cor padrão do botão */
      color: #ffffff;
      transition: background-color 0.3s;
      /* Transição suave da cor de fundo */
    }

    .btn-secondary:hover {
      background-color: #cc0000;
      /* Cor quando o mouse passa sobre o botão */
      color: #ffffff;
    }

    .mostrar-senha {
      /* Ajuste esta margem conforme necessário */
      margin-left: 5px;
    }

    #mask-custom {
      backdrop-filter: blur(10px);
      background-color: rgba(255, 255, 255, 0);
      color: white;
    }

    .password-container {
      position: relative;
    }

    .toggle-password {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
    }

    .login-title {
      font-size: 100px;
      margin-top: 5vh;
      font-weight: 700;
      margin-bottom: 24px;
      text-align: center;
      line-height: 1.1;
      max-width: 1200px;
      font-family: 'Bebas Neue', 'Quicksand', sans-serif;
      letter-spacing: 5px;
    }
  </style>
</head>

<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <div class="container-fluid">
    <div class="login-container" style="margin-top: -40px;">
      <img class="logo" src="css/logo.png" alt="logo" style="margin-top: 40px;">
      <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col" style="max-width: 400px;">
          <div class="card mb-4 rounded-3 shadow-sm: 0" id="mask-custom">
            <div class="login-title">Login</div>
            <div class="card-body">
              <form name="login" action="login.php" method="POST" class="formLogin">
                <input class='form-control' type='text' name='usuario' required placeholder="Usuário" autofocus="true" />
                <input class='form-control' type='password' name='senha' id="senha" placeholder='Senha' required />
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
                <button type="submit" class="btn btn-secondary">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>