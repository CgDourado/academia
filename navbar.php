<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <title>Bootstrap Example</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">
  <nav class="navbar navbar-expand-lg bg-body-tertiary rounded">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Alternar de navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <li class="navbar-expand me-auto mb-2 mb-lg-0">
          <?php
          include 'menu.php';
          ?>
        </li>
        <ul class="navbar-nav ml-auto align-items-center">
          <?php
          echo "<div class='header'>";
          if (empty($_SESSION["user"])) {
            echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='black' class='bi bi-person-square' viewBox='0 0 16 16'>
            <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
            <path d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z'/>
          </svg> <a href='log.php' style='color: black; text-decoration: none; font-weight: bold;'>Login | </a>";
            echo "<a href='sair.php' style='color: black; text-decoration: none; font-weight: bold;'> Sair</a>";
          } else {
            $usuario = $_SESSION["user"];
            echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='black' class='bi bi-person-square' viewBox='0 0 16 16'>
            <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
            <path d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z'/>
          </svg><b><font color='black'> " . $usuario . " | </font></b>";
            // echo "<a href='cadastrodono.php' style='color: black; text-decoration: none; font-weight: bold;'> Criar Conta |</a>";
            // echo "<a href='sair.php' style='color: black; text-decoration: none; font-weight: bold;'> Sair </a>";
          }
          echo "</div>";
          ?>
        </ul>
        <ul class="navbar-nav me-end mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
              Conta
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <!-- <li><a class="dropdown-item" href="cadastrodono.php">Criar Conta</a></li> -->
              <li><a class="dropdown-item" href="sair.php">Sair</a></li>
              <?php
              // $usuario = $_SESSION["user"];
              // $nome = "Cariani Junior";
              //$usuariol = $usuario;
              // Verifique se o nome de usuário é diferente de "Cariani Junior" para mostrar a opção "Deletar Conta"
              //if ($usuariol != $nome) {
              //   echo '<li><hr class="dropdown-divider"></li>';
              //  echo '<li><a class="dropdown-item" href="excluirconta.php">Deletar Conta</a></li>';
              //}
              //
              ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>
</body>

</html>