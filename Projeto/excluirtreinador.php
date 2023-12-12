<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM treinadores WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        mysqli_commit($conn);
        echo "<script language='javascript' type='text/javascript'>
        window.location.href='treinadores_html.php';
        </script>";
    } else {
        mysqli_rollback($conn);
        echo "<script language='javascript' type='text/javascript'>
        alert('Não foi possivel fazer Excluir!');
        window.location.href='treinadores_html.php';
        </script>";
    }
?>