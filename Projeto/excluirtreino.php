<?php
    include 'conecta.php';
    $id = $_GET['id'];

    // Preparando a consulta
    $stmt = $conn->prepare("UPDATE treinos SET treino = NULL WHERE id = ?");

    // Ligando os parâmetros
    $stmt->bind_param("i", $id);

    // Executando a consulta
    if ($stmt->execute()){
        echo "<script language='javascript' type='text/javascript'>
        window.location.href='treinos.php';
        </script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Não foi possivel fazer o cadastro do treino!');
        window.location.href='treinos.php';
        </script>";
    }
?> 
