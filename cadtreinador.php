<?php
    include 'conecta.php';
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $query = $conn->query("SELECT * FROM treinadores WHERE nome='$nome' AND login='$login' AND senha='$senha'");
    if(mysqli_num_rows($query) > 0){
        echo "<script language='javascript' type='text/javascript'>
        alert('Usuario já Existente!');
        window.location.href='treinadores_html.php';
        </script>";
        exit();
    } else {
        $sql = "INSERT INTO treinadores(nome, login, senha) VALUES ('$nome','$login','$senha')";
        if (mysqli_query($conn, $sql)) {
            mysqli_commit($conn);
            echo "<script language='javascript' type='text/javascript'>
            window.location.href='treinadores_html.php';
            </script>";
        } else {
            mysqli_rollback($conn);
            echo "<script language='javascript' type='text/javascript'>
            alert('Não foi possivel fazer o cadastro!');
            window.location.href='treinadores_html.php';
            </script>";
        }
    }
?>
