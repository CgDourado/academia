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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/js-brasil/js-brasil.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
                </svg>&nbsp;&nbsp;Clientes</b></h4><br />
            <div class="d-grid gap-2 col-2 mx-auto">
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Novo Cliente</button>
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
                  <th scope="col" class="sortable1 name-column">Nome 🔽</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">CPF</th>
                  <th scope="col">Data de Nascimento</th>
                  <th scope="col">Idade</th>
                  <th scope="col">Peso</th>
                  <th scope="col">Altura</th>
                  <th scope="col">IMC</th>
                  <th scope="col" class="sortable payment-column">Pagamento 🔽</th>
                  <th scope="col">Plano</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'conecta.php';
                $pesquisa = mysqli_query($conn, "SELECT * FROM usuario");
                $row = mysqli_num_rows($pesquisa);
                if ($row > 0) {
                  while ($registro = $pesquisa->fetch_array()) {
                    $id = $registro['id'];
                    echo '<tr>';
                    echo '<td>' . $registro['id'] . '</td>';
                    echo '<td>' . $registro['nome'] . '</td>';
                    echo '<td>' . $registro['email'] . '</td>';
                    echo '<td>' . $registro['telefone'] . '</td>';
                    echo '<td>' . $registro['cpf'] . '</td>';
                    $convert_data_nascimento = strtotime($registro['data_nascimento']);
                    $nascimento = date('d/m/Y', $convert_data_nascimento);
                    echo '<td>' . $nascimento . '</td>';
                    echo '<td>' . $registro['idade'] . '</td>';          
                    echo '<td>' . $registro['peso'] . '</td>';
                    echo '<td>' . $registro['altura'] . '</td>';
                    echo '<td>' . $registro['imc'] . '</td>';
                    echo '<td>' . $registro['pagamento'] . '</td>';
                    echo '<td>' . $registro['plano'] . '</td>';

                    echo '<td><a href="editausuario.php?id=' . $id . '" data-bs-toggle="modal" data-id="' . $id . '" data-bs-target="#exampleModal1' . $id . '" style="text-decoration: none;" data-bs-toggle="tooltip" title="Editar">✏️</a> | <a href="excluirusuario.php?id=' . $id . '" style="text-decoration: none;" data-bs-toggle="tooltip" title="Excluir">🗑️</a></td>';
                    echo '</tr>';
                    echo '<div class="modal fade" id="exampleModal1' . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">';
                    echo '<div class="modal-dialog modal-dialog-centered">';
                    echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                    echo '<h5 class="modal-title" id="exampleModalLabel1">Editar Usuáro</h5>';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    echo '</div>';
                    echo '<div class="modal-body">';
                    include 'editausuario.php';
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
                  echo 'Sem Clientes no momento.';
                  echo '</tbody>';
                  echo '</table>';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="registrationForm" action="cadusuario.php" method="POST">
            <div class="form-group">
              <label>Nome</label>
              <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o nome completo" required />
              <br />
              <label>Email</label>
              <input type="email" id='email' class="form-control" name="email" placeholder="Insira o Email" required />
              <br />
              <label>Telefone</label>
              <input type="tel" class="form-control" id='telefone' name="telefone" placeholder="Ex: (XX) XXXXX-XXXX" required />
              <script>
                $(document).on('focus', '#telefone', function() {
                  $(this).mask('(00) 00000-0000');
                });
              </script>
              <br />
              <label>CPF</label>
              <input type="cpf" class="form-control cpf-field" id="cpf" name="cpf" placeholder="Insira seu CPF" required />
              <script>
                $(document).on('focus', '#cpf', function() {
                  $(this).mask('000.000.000-00');
                });
              </script>
              <br />
              <label>Ano de Nascimento</label>
              <input type="text" class="form-control" id='data_nascimento' name="data_nascimento" placeholder="Insira a Data de Nascimento" required />
              <script>
                $(document).on('focus', '#data_nascimento', function() {
                  $(this).mask('00/00/0000');
                });
              </script>
              <br />
              <label>Peso (kg)</label>
              <input id="peso" type="number" class="form-control" name="peso" placeholder="Insira seu Peso" required />
              <br />
              <label>Altura (m)</label>
              <input id="altura" type="number" class="form-control" name="altura" step="0.01" placeholder="Insira a Altura" required />
              <script>
                $(document).on('focus', '#altura', function() {
                  $(this).mask('0.00');
                });
              </script>
              <br>
              <div class="row">
                <div class="col">
                  <label for="plano">Plano:</label>
                  <select id="plano" name="plano" class="form-select" aria-label="Default select example" required>
                    <option value="" selected disabled>...</option>
                    <option value="Anual">Anual</option>
                    <option value="Mensal">Mensal</option>
                  </select>
                </div>
                <div class="col">
                  <label for="pagamento">Pagamento:</label>
                  <select id="pagamento" name="pagamento" class="form-select" aria-label="Default select example" required>
                    <option value="" selected disabled>...</option>
                    <option value="Pago">Pago</option>
                    <option value="A Pagar">A Pagar</option>
                    <option value="Negociando">Negociando</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="d-grid gap-2 col-20 mx-auto">
                <button type="submit" id="submit" class="btn btn-success cadastrar-button">Cadastrar</button>
              </div>
            </div>
          </form>
          <script>
            // Verifica se uma opção válida foi selecionada para 'plano' e 'pagamento'
            document.getElementById('plano').addEventListener('change', function() {
              if (this.value === "") {
                alert("Por favor, selecione uma opção válida para Plano.");
              }
            });

            document.getElementById('pagamento').addEventListener('change', function() {
              if (this.value === "") {
                alert("Por favor, selecione uma opção válida para Pagamento.");
              }
            });
          </script>
          <script>
            $(document).ready(function() {
              // Initialize the form submission event handler
              $("#registrationForm").submit(function(event) {
                // Get the value of the CPF input field within the current modal
                let cpf_value = $(this).find(".cpf-field").val();

                // Perform CPF validation
                if (jsbrasil.validateBr.cpf(cpf_value)) {
                  // CPF is valid, continue with form submission
                  $(this).find(".cpf-field").css("background-color", "initial");
                } else {
                  // CPF is invalid, prevent form submission and highlight the field
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
      var ordenacao = 0;

      $('.sortable').click(function() {
        ordenacao = (ordenacao + 1) % 5;
        filtrarPagamento(ordenacao);
      });

      function filtrarPagamento(ordenacao) {
        var rows = $('tbody tr');
        var rowsPagamento = $('tbody tr td:eq(9)');
        rows.hide();

        if (ordenacao === 0) {
          rows.show();
        } else {
          rows.each(function() {
            var pagamento = $(this).find('td:eq(9)').text();
            if (ordenacao === 1 && pagamento === 'Pago') {
              $(this).show();
            } else if (ordenacao === 2 && pagamento === 'A Pagar') {
              $(this).show();
            } else if (ordenacao === 3 && pagamento === 'Negociando') {
              $(this).show();
            }
          });
        }
      }
    });
  </script>
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
      var ordenacao = 0; // 0: Ordenação original, 1: A-Z, 2: Z-A

      $('.sortable1').click(function() {
        ordenacao = (ordenacao + 1) % 4;
        ordenarTabela(ordenacao);
      });

      function ordenarTabela(ordenacao) {
        var rows = $('#clienteTable tbody tr').get();

        if (ordenacao === 1) {
          // Ordenar por Nome A-Z
          rows.sort(function(a, b) {
            var nomeA = $(a).find('td:eq(1)').text().toUpperCase();
            var nomeB = $(b).find('td:eq(1)').text().toUpperCase();
            return nomeA.localeCompare(nomeB);
          });
        } else if (ordenacao === 2) {
          // Ordenar por Nome Z-A
          rows.sort(function(a, b) {
            var nomeA = $(a).find('td:eq(1)').text().toUpperCase();
            var nomeB = $(b).find('td:eq(1)').text().toUpperCase();
            return nomeB.localeCompare(nomeA);
          });
        } else if (ordenacao === 3) {
          // Ordenar por ID
          rows.sort(function(a, b) {
            var idA = parseInt($(a).find('td:eq(0)').text());
            var idB = parseInt($(b).find('td:eq(0)').text());
            return idA - idB;
          });
        }

        $.each(rows, function(index, row) {
          $('#clienteTable tbody').append(row);
        });
      }
    });
  </script>
</body>

</html>