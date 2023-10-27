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
            <div class="card-body">
              <?php
              $sql = "SELECT genero, COUNT(*) AS quantidade FROM usuario GROUP BY genero";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $genero = $row["genero"];
                  $quantidade = $row["quantidade"];
                  $generoPlural = $quantidade > 1 ? $genero . 's' : $genero;

                  echo "{$generoPlural}: $quantidade<br>";
                }
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
                $sql = "SELECT genero, COUNT(*) AS quantidade FROM usuario GROUP BY genero";
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
                    data.addColumn('string', 'Gênero');
                    data.addColumn('number', 'Quantidade');
                    data.addRows([
                      <?php
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          $genero = $row["genero"];
                          $quantidade = $row["quantidade"];
                          echo "['{$genero}', {$quantidade}],";
                        }
                      }
                      ?>
                    ]);

                    var options = {
                      title: 'Clientes por Gênero',
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
                    <path d="M5.5 13v1.25c0 .138.112.25.25.25h1a.25.25 0 0 0 .25-.25V13h.5v1.25c0 .138.112.25.25.25h1a.25.25 0 0 0 .25-.25V13h.084c1.992 0 3.416-1.033 3.416-2.82 0-1.502-1.007-2.323-2.186-2.44v-.088c.97-.242 1.683-.974 1.683-2.19C11.997 3.93 10.847 3 9.092 3H9V1.75a.25.25 0 0 0-.25-.25h-1a.25.25 0 0 0-.25.25V3h-.573V1.75a.25.25 0 0 0-.25-.25H5.75a.25.25 0 0 0-.25.25V3l-1.998.011a.25.25 0 0 0-.25.25v.989c0 .137.11.25.248.25l.755-.005a.75.75 0 0 1 .745.75v5.505a.75.75 0 0 1-.75.75l-.748.011a.25.25 0 0 0-.25.25v1c0 .138.112.25.25.25L5.5 13zm1.427-8.513h1.719c.906 0 1.438.498 1.438 1.312 0 .871-.575 1.362-1.877 1.362h-1.28V4.487zm0 4.051h1.84c1.137 0 1.756.58 1.756 1.524 0 .953-.626 1.45-2.158 1.45H6.927V8.539z" />
                  </svg>&nbsp;&nbsp;Pagamentos</b></h4>
            </div>
            <div class="card-body table-container">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Status do Pagamento</th>
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
                      echo '<td>' . $registro['nome'] . '</td>';
                      echo '<td>' . $registro['pagamento'] . '</td>';
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
                    <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5ZM5 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z" />
                    <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z" />
                  </svg>&nbsp;&nbsp;Quadro 3</b></h4>
            </div>
            <div class="card-body">
              <center>
                <img src="css/home3.jpeg" width="200">
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>