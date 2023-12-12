<?php
use Dompdf\Dompdf;
use Dompdf\Options;

require_once 'dompdf/autoload.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['treino']) && isset($_POST['cliente']) && isset($_POST['id'])) {
    $options = new Options();
    $options->set('defaultFont', 'sans');
    $dompdf = new Dompdf($options);

    // Use o ID recebido para obter o treino correto do banco de dados
    include 'conecta.php';
    $id = $_POST['id'];
    $sql = "SELECT * FROM treinos WHERE id=$id";
    $query = $conn->query($sql);
    $dados = $query->fetch_array();
    $treino = $dados['treino'];
    $nomeCliente = $dados['nome']; // Adicione esta linha para obter o nome do cliente

    // Verifica se o treino não está vazio antes de continuar
    if (!empty($treino)) {
        // Adicione um título ao HTML com o nome do cliente
        $html = '<h1>TREINO</h1>';
        $html .= '<p>Nome do Cliente: ' . $nomeCliente . '</p>'; // Adiciona o nome do cliente
        $html .= nl2br($treino); // Converte quebras de linha para <br>

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Define o nome do arquivo com base no nome do cliente
        $filename = 'treino_cliente_' . $_POST['cliente'] . '.pdf';

        // Exibe o PDF no navegador com a opção de download
        $dompdf->stream($filename, array('Attachment' => 1));
    } else {
        // Se o treino estiver vazio, exibe um alerta e fecha a aba
        echo "<script>
                alert('O treino está vazio. Não foi possível gerar o PDF.');
                window.close(); // Fecha a aba atual
              </script>";
    }
} else {
    // Se os parâmetros necessários não estiverem presentes, você pode lidar com isso conforme necessário
    echo "Parâmetros ausentes.";
}
?>
