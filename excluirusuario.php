<?php
    include 'conecta.php';
    $id = $_GET['id'];
    mysqli_begin_transaction($conn);
    $sql1 = "DELETE FROM usuario WHERE id=$id";
    $sql2 = "DELETE FROM treinos WHERE id=$id";
    if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
        mysqli_commit($conn);
        echo "<script language='javascript' type='text/javascript'>
        window.location.href='usuarios_html.php';
        </script>";
    } else {
        mysqli_rollback($conn);
        echo "<script language='javascript' type='text/javascript'>
        alert('Não foi possivel fazer o cadastro!');
        window.location.href='usuarios_html.php';
        </script>";
    }
?>