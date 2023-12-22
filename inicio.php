<?php
session_start();
if (!isset($_SESSION["user"])) {
  echo "<script language='javascript' type='text/javascript'>
    window.location.href='index.php';
    </script>";
  exit;
}
include 'cabecalho.php';
include 'conecta.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="content-language" content="pt-br">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Power Gym</title>
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

    .table-container {
      max-height: 304px;
      height: 304px;
      /* Defina a altura máxima desejada */
      overflow-y: auto;
    }

    .payment-column-home:hover {
      cursor: pointer;
      text-decoration: underline;
    }

    .treinadores {
      max-height: 304px;
      height: 304px;
      /* Defina a altura máxima desejada */
      overflow-y: auto;
    }

    .clientes {
      max-height: 304px;
      height: 304px;
      /* Defina a altura máxima desejada */
      overflow-y: auto;
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
  <div class="container-fluid">
    <br>
    <br>
    <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col" style="max-width: 1000px;">
        <div class="card mb-4 rounded-3 shadow-sm: 0" style="border: none;">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="card text-bg-dark mb-3">
            <div class="card-header">
              <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#e78834" class="bi bi-person-rolodex" viewBox="0 0 16 16">
                    <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                    <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z" />
                  </svg>&nbsp;&nbsp;Clientes</b></h4>
            </div>
            <div class="card-body clientes">
              <?php
              include 'conecta.php';

              if ($conn->connect_error) {
                die("Erro de conexão com o banco de dados: " . $conn->connect_error);
              }

              if (isset($_SESSION["cargo"])) {
                $cargo = $_SESSION["cargo"];

                if ($cargo === 'dono') {
                  $sql = "SELECT sexo, COUNT(*) AS quantidade FROM usuario GROUP BY sexo";
                } elseif ($cargo === 'treinador') {
                  $nome_treinador = $_SESSION['user'];
                  $sql = "SELECT sexo, COUNT(*) AS quantidade FROM usuario WHERE treinador = '$nome_treinador' GROUP BY sexo;";
                }
                $result = $conn->query($sql);
              }

              if ($result->num_rows > 0) {
                $homens = 0;
                $mulheres = 0;
                $outros = 0;

                while ($row = $result->fetch_assoc()) {
                  $sexo = $row["sexo"];
                  $quantidade = $row["quantidade"];

                  if ($sexo === "Homem") {
                    $homens += $quantidade;
                  } elseif ($sexo === "Mulher") {
                    $mulheres += $quantidade;
                  } elseif ($sexo === "Outro") {
                    $outros += $quantidade;
                  }
                }

                // Função para exibir o número com a cor desejada
                function exibirNumeroComCor($numero, $cor)
                {
                  echo "<span style=\"color: $cor;\">$numero</span>";
                }

                $sexoPluralHomem = $homens > 1 ? "Homens" : "Homem";
                $sexoPluralMulher = $mulheres > 1 ? "Mulheres" : "Mulher";
                $sexoPluralOutro = $outros > 1 ? "Outros" : "Outro";

                // Exibe os números com a cor desejada
                echo "{$sexoPluralHomem}: ";
                exibirNumeroComCor($homens, '#e78834');
                echo "<br>";

                echo "{$sexoPluralMulher}: ";
                exibirNumeroComCor($mulheres, '#e78834');
                echo "<br>";

                echo "{$sexoPluralOutro}: ";
                exibirNumeroComCor($outros, '#e78834');
                echo "<br>";
              } else {
                echo "Nenhum cliente encontrado.";
              }

              $conn->close();
              ?>

              <center>
                <?php
                include 'conecta.php';

                if ($conn->connect_error) {
                  die("Erro de conexão com o banco de dados: " . $conn->connect_error);
                }

                if (isset($_SESSION["cargo"])) {
                  $cargo = $_SESSION["cargo"];

                  if ($cargo === 'dono') {
                    $sql = "SELECT sexo, COUNT(*) AS quantidade FROM usuario GROUP BY sexo";
                  } elseif ($cargo === 'treinador') {
                    $nome_treinador = $_SESSION['user'];
                    $sql = "SELECT sexo, COUNT(*) AS quantidade FROM usuario WHERE treinador = '$nome_treinador' GROUP BY sexo;";
                  }
                  $result = $conn->query($sql);
                }
                ?>

                <div id="chart_div" style="width: 100%; height: 100%;"></div>

                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                  google.charts.load('current', {
                    'packages': ['corechart']
                  });
                  google.charts.setOnLoadCallback(drawChart);

                  function drawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Sexo');
                    data.addColumn('number', 'Quantidade');
                    data.addRows([
                      <?php
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          $sexo = $row["sexo"];
                          $quantidade = $row["quantidade"];
                          echo "['{$sexo}', {$quantidade}],";
                        }
                      }
                      ?>
                    ]);

                    var options = {
                      title: 'Clientes por Sexo',
                      sliceVisibilityThreshold: 0.2,
                      is3D: true,
                      backgroundColor: '#212529',
                      titleTextStyle: {
                        color: 'white' // Altere 'white' para a cor desejada
                      },
                      legend: {
                        textStyle: {
                          color: 'white' // Altere 'white' para a cor desejada
                        }
                      }
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                  }
                </script>
              </center>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card text-bg-dark mb-3">
            <div class="card-header">
              <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#e78834" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                    <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z" />
                  </svg>&nbsp;&nbsp;Pagamentos Status</b></h4>
            </div>
            <div class="card-body table-container">
              <table class="table table-dark table-striped table-pagamentos">
                <thead>
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">
                      <div class="row">
                        <div class="col">
                          <select id="status" name="status" class="form-select" aria-label="Filtro" style="width: 140px;">
                            <option value="Todos" selected>Status</option>
                            <option value="A Pagar">A Pagar</option>
                            <option value="Negociando">Negociando</option>
                          </select>
                        </div>
                      </div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include 'conecta.php';
                  if (isset($_SESSION["cargo"])) {
                    $cargo = $_SESSION["cargo"];
                    if ($cargo === 'dono') {
                      $nome_treinador = $_SESSION["user"];
                      $pesquisa = mysqli_query($conn, "SELECT * FROM usuario");
                    } elseif ($cargo === 'treinador') {
                      $nome_treinador = $_SESSION["user"];
                      $pesquisa = mysqli_query($conn, "SELECT * FROM usuario WHERE treinador='$nome_treinador'");
                    }
                  }
                  $row = mysqli_num_rows($pesquisa);
                  if ($row > 0) {
                    while ($registro = $pesquisa->fetch_array()) {
                      $id = $registro['id'];
                      $pagamento = $registro['pagamento'];

                      // Verifique se o pagamento é "A pagar" ou "Negociando" para exibir a linha
                      if ($pagamento === "A Pagar" || $pagamento === "Negociando") {
                        echo '<tr>';
                        echo '<td>' . $registro['nome'] . '</td>';
                        echo '<td>' . $pagamento . '</td>';
                        echo '</tr>';
                      }
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card text-bg-dark mb-3">
            <div class="card-header">
              <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#e78834" class="bi bi-ticket-detailed" viewBox="0 0 16 16">
                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                  </svg>&nbsp;&nbsp;Treinadores</b></h4>
            </div>
            <div class="card-body treinadores">
              <table class="table table-dark table-striped table-treinadores">
                <tbody>
                  <?php
                  include 'conecta.php';
                  $pesquisa = mysqli_query($conn, "SELECT * FROM treinadores");
                  $row = mysqli_num_rows($pesquisa);
                  if ($row > 0) {
                    while ($registro = $pesquisa->fetch_array()) {
                      $id = $registro['id'];
                      echo '<tr>';
                      echo '<td>' . $registro['nome'] . '</td>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                  } else {
                    echo 'Sem Treinadores no momento.';
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
  </div>
  <script>
    // Filtra a tabela de pagamento de acordo com o que for selecionado
    $(document).ready(function() {
      var ordenacaoStatus = 'Todos'; // Inicialmente, mostrar todos

      $('#status').change(function() {
        ordenacaoStatus = $('#status').val();
        filtrarStatus(ordenacaoStatus, '.table-pagamentos');
      });

      function filtrarStatus(status, tableSelector) {
        var rows = $(tableSelector + ' tbody tr');
        rows.show(); // Mostrar todas as linhas

        if (status !== 'Todos') {
          rows.filter(function() {
            return $(this).find('td:eq(1)').text().trim() !== status;
          }).hide();
        }
      }
    });
  </script>
</body>

</html>