<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $sql = "UPDATE treinadores SET nome=?,login=?,senha=? WHERE id=?";
    $stmt = $conn->prepare($sql) or die($conn->error);
    if (!$stmt) {
        echo "Error na atualização!".$conn->errno.'-'.$conn->error;
    }
    $stmt->bind_param('sssi',$nome,$login,$senha,$id);;
    $stmt->execute();
    $stmt->close();
    mysqli_commit($conn);
    header("Location: treinadores_html.php#tabs-4");
?>
