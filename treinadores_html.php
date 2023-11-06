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
  <title>Biblioteca</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/js-brasil/js-brasil.js"></script>
  <style>
    .header {
      float: right;
    }

    .payment-column:hover {
      cursor: pointer;
      text-decoration: underline;
    }

    .name-column:hover {
      cursor: pointer;
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <br><br>
    <div class="row row-cols-2 row-cols-md-1 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-2">
            <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                </svg>&nbsp;&nbsp;Treinadores</b></h4><br />
            <div class="d-grid gap-2 col-2 mx-auto">
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Novo Treinador</button>
            </div>
            <form class="d-flex justify-content-start align-items-center" role="search">
              <img src="css/lupa.png" alt="Ícone de Pesquisa" style="width: 20px; height: 20px; margin-right: 10px; " />
              <input class="form-control me-2" type="search" id="search" placeholder="Digite sua pesquisa..." style="width: 250px;" aria-label="Search">
            </form>
          </div>
          <div class="card-body">
            <table id="clienteTable" class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <!-- <th scope="col" class="sortable1 name-column">Nome 🔽</th> -->
                  <th scope="col">
                    <div class="row">
                      <div class="col text-center">
                        <select id="snomes2" name="snomes2" class="form-select mx-auto" aria-label="Filtro" style="width: 100px;">
                          <option value="id" selected>Nomes</option>
                          <option value="az">A-Z</option>
                          <option value="za">Z-A</option>
                        </select>
                      </div>
                    </div>
                  </th>
                  <th scope="col">Login</th>
                  <th scope="col">Senha</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'conecta.php';
                $pesquisa = mysqli_query($conn, "SELECT * FROM treinadores");
                $row = mysqli_num_rows($pesquisa);
                if ($row > 0) {
                  while ($registro = $pesquisa->fetch_array()) {
                    $id = $registro['id'];
                    echo '<tr>';
                    echo '<td>' . $registro['id'] . '</td>';
                    echo '<td>' . $registro['nome'] . '</td>';
                    echo '<td>' . $registro['login'] . '</td>';
                    echo '<td>' . $registro['senha'] . '</td>';
                    echo '<td><a href="editatreinador.php?id=' . $id . '" data-bs-toggle="modal" data-id="' . $id . '" data-bs-target="#exampleModal1' . $id . '" style="text-decoration: none;" data-bs-toggle="tooltip" title="Editar">✏️</a> | <a href="excluirtreinador.php?id=' . $id . '" style="text-decoration: none;" data-bs-toggle="tooltip" title="Excluir">🗑️</a></td>';
                    echo '</tr>';
                    echo '<div class="modal fade" id="exampleModal1' . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">';
                    echo '<div class="modal-dialog modal-dialog-centered">';
                    echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                    echo '<h5 class="modal-title" id="exampleModalLabel">Editar Treinadores</h5>';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    echo '</div>';
                    echo '<div class="modal-body">';
                    include 'editatreinador.php';
                    echo '</div>';
                    echo '<div class="modal-footer">';
                    echo '<button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                  }
                  echo '</tbody>';
                  echo '</table>';
                } else {
                  echo 'Sem Treinadores no momento.';
                  echo '</tbody>';
                  echo '</table>';
                }
                ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Treinador</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="registrationForm" action="cadtreinador.php" method="POST">
            <div class="form-group">
              <label>Nome</label>
              <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o nome completo" required />
              <br />
              <label>Login</label>
              <input type="text" class="form-control" name="login" placeholder="Insira o Login" required />
              <br />
              <label class='form-label' style="float: left; margin: 1px;">Senha</label>
              <input class='form-control' type='text' name="senha" id="senha" placeholder='Digite a sua senha' required />
              <br /><br />
              <div class="d-grid gap-2 col-20 mx-auto">
                <button type="submit" id="submit" class="btn btn-success cadastrar-button">Cadastrar</button>
              </div>
            </div>
          </form>
          <script>
            $(document).ready(function() {
              // Função para formatar o nome com a primeira letra de cada palavra maiúscula
              function formatarNome() {
                var nome = $("#nome").val();

                nome = nome.toLowerCase().replace(/(^|\s)\S/g, function(l) {
                  return l.toUpperCase();
                });

                $("#nome").val(nome);
              }

              // Aplica a formatação quando o campo Nome perde o foco
              $("#nome").blur(function() {
                formatarNome();
              });
            });
          </script>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $("#search").on("keyup", function() {
        var searchTerm = $(this).val().toLowerCase();
        $("#clienteTable tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -1);
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Função para formatar o nome com a primeira letra de cada palavra maiúscula
      function formatarNome() {
        var nome = $("#nome").val();
        nome = nome.toLowerCase().replace(/(^|\s)\S/g, function(l) {
          return l.toUpperCase();
        });
        $("#nome").val(nome);
      }

      // Aplica a formatação quando o campo Nome perde o foco
      $("#nome").blur(function() {
        formatarNome();
      });

      // Adicione esta parte para aplicar a ordenação
      $("#snomes2").change(function() {
        var ordenacao = $("#snomes2").val();
        ordenarTabela(ordenacao);
      });

      function ordenarTabela(ordenacao) {
        var rows = $("tbody tr").get();
        rows.sort(function(a, b) {
          if (ordenacao === "id") {
            var keyA = parseInt($(a).find("td:eq(0)").text());
            var keyB = parseInt($(b).find("td:eq(0)").text());
            return keyA - keyB;
          } else if (ordenacao === "az") {
            var keyA = $(a).find("td:eq(1)").text();
            var keyB = $(b).find("td:eq(1)").text();
            return keyA.localeCompare(keyB);
          } else if (ordenacao === "za") {
            var keyA = $(a).find("td:eq(1)").text();
            var keyB = $(b).find("td:eq(1)").text();
            return keyB.localeCompare(keyA);
          }
        });

        $.each(rows, function(index, row) {
          $("tbody").append(row);
        });
      }
    });
  </script>
</body>

</html>