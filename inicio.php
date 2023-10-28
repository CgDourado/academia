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
include 'conecta.php';

if ($conn->connect_error) {
  die("Erro de conexão com o banco de dados: " . $conn->connect_error);
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
  <style>
    .header {
      float: right;
    }

    .letra {
      font-size: small;
    }

    .table-container {
      max-height: 304px;
      /* Defina a altura máxima desejada */
      overflow-y: auto;
    }

    .payment-column-home:hover {
      cursor: pointer;
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <div class="container-fluid">
    <hr>
    <br>
    <br>
    <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col" style="max-width: 1000px;">
        <div class="card mb-4 rounded-3 shadow-sm: 0" style="border: none;">
          <!-- <div style="font-size: 50px; margin-top: 12vh; font-weight: 700; margin-bottom: 24px; text-align: center; line-height: 1.1; max-width: 1200px;">
            //<?php
              //$usuario = $_SESSION["user"];
              //echo "<font color='black'>Olá, " . $usuario . ".</font>";
              //
              ?>
          </div> -->
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="card shadow-sm">
            <div class="card-header">
              <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-screwdriver" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                  </svg>&nbsp;&nbsp;Clientes</b></h4>
            </div>
            <div class="card-body clientes">
              <?php
              $sql = "SELECT sexo, COUNT(*) AS quantidade FROM usuario GROUP BY sexo";
              $result = $conn->query($sql);

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

                $sexoPluralHomem = $homens > 1 ? "Homens" : "Homem";
                $sexoPluralMulher = $mulheres > 1 ? "Mulheres" : "Mulher";
                $sexoPluralOutro = $outros > 1 ? "Outros" : "Outro";

                echo "{$sexoPluralHomem}: $homens<br>";
                echo "{$sexoPluralMulher}: $mulheres<br>";
                echo "{$sexoPluralOutro}: $outros<br>";
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

                // Consulta para obter as contagens masculinas e femininas
                $sql = "SELECT sexo, COUNT(*) AS quantidade FROM usuario GROUP BY sexo";
                $result = $conn->query($sql);
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
          <div class="card shadow-sm">
            <div class="card-header">
              <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-diagram-3" viewBox="0 0 16 16">
                    <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                  </svg>&nbsp;&nbsp;Pagamentos</b></h4>
            </div>
            <div class="card-body table-container">
              <table class="table table-striped table-pagamentos">
                <thead>
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col" class="sortable payment-column-home">Pagamento 🔽</th>
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
          <div class="card shadow-sm">
            <div class="card-header">
              <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-ticket-detailed" viewBox="0 0 16 16">
              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
  <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                  </svg>&nbsp;&nbsp;Treinadores</b></h4>
            </div>
            <div class="card-body treinadores">
              <table class="table table-striped table-treinadores">
                <thead>
                  <tr>
                    <th scope="col">Nome</th>
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
    $(document).ready(function() {
      var ordenacao = 0;
      var opcoesPagamento = ['A Pagar', 'Negociando'];

      $('.sortable.payment-column-home').click(function() {
        ordenacao = (ordenacao + 1) % (opcoesPagamento.length + 1);

        // Filtrar somente a tabela de "Pagamentos"
        filtrarPagamento(ordenacao, '.table-pagamentos');
      });

      function filtrarPagamento(ordenacao, tableSelector) {
        var rows = $(tableSelector + ' tbody tr');
        rows.show(); // Mostrar todas as linhas

        if (ordenacao > 0 && ordenacao <= opcoesPagamento.length) {
          var filtro = opcoesPagamento[ordenacao - 1];
          rows.filter(function() {
            return $(this).find('td:eq(1)').text().trim() !== filtro;
          }).hide();
        }
      }

      // function atualizarTextoCabecalho(ordenacao) {
      // if (ordenacao === 0) {
      // $('.sortable.payment-column-home').text(tituloPagamento);
      // } else {
      // $('.sortable.payment-column-home').text(tituloPagamento + ' (' + opcoesPagamento[ordenacao - 1] + ')');
      // }
      // }
    });
  </script>
</body>

</html>