<?php
session_start();
include 'cabecalho.php';
if (isset($_SESSION['login_error']) && $_SESSION['login_error'] === true) {
  echo '<div class="alert alert-danger alert-dismissible fade show fixed-top mx-auto" role="alert" style="margin-bottom: 0; width: 21%; margin-top: 10px; padding: 10px 15px;">
          <strong>Login ou senha inválidos, tente novamente!</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="width: 6px; height: 6px"></button>
        </div>';
  // Limpe a variável de sessão para evitar que o alerta seja exibido novamente
  unset($_SESSION['login_error']);
}
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

    .btn {
      /* BOTÃO LOGIN */
      width: 100%;
    }

    .btn-secondary {
      /* BOTÃO LOGIN */
      background-color: #e78834;
      /* Cor padrão do botão */
      color: #ffffff;
      transition: background-color 0.3s;
      /* Transição suave da cor de fundo */
      border-color: #e78834;
      border-radius: 13px;
      height: 50px;
      font-weight: bold;
      font-size: 21px;
    }

    .btn-secondary:hover {
      /* BOTÃO LOGIN QUANDO MOUSE PASSA POR CIMA */
      background-color: #a35f23;
      /* Cor quando o mouse passa sobre o botão */
      color: #ffffff;
      border-color: #a35f23;
    }

    #mask-custom {
      /* DEIXA O CONTAINER QUE ESTÁ O LOGIN, TRANSLUCIDO */
      backdrop-filter: blur(10px);
      background-color: rgba(255, 255, 255, 0);
      color: white;
    }

    .mostrar-senha {
      /* DISTANCIA DO BOTÃO DE MOSTRAR SENHA DA BORDA*/
      margin-left: 5px;
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
      /* TÍTULO DO LOGIN */
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

    .logo-container {
      /* DEIXA A LOGO CENTRALIZADA */
      text-align: center;
    }

    .logo {
      /* DEFINE A ALTURA DA LOGO*/
      margin-top: 80px;
      display: inline-block;
    }

    /* Adicione a seguinte regra CSS para dar espaçamento entre os inputs */
    .form-control {
      margin-bottom: 10px;
      border-radius: 13px;
      /* ou qualquer valor que desejar */
    }
  </style>
</head>

<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <div class="container-fluid">
    <div class="login-container" style="margin-top: -40px;">
      <div class="logo-container">
        <img class="logo" src="css/logo.png" alt="logo">
      </div>
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
                <button type="submit" class="btn btn-secondary text-center">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>