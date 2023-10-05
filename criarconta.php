<?php
    session_start();
    include 'conecta.php';
    $nome= $_POST['nome'];
    $login= $_POST['usuario'];
    $senha = $_POST['senha'];
    $query = $conn->query("SELECT * FROM dono WHERE nome='$nome' AND login='$login'");
    if(mysqli_num_rows($query) > 0){
        echo "<script language='javascript' type='text/javascript'>
        alert('Dono já Existente!');
        window.location.href='cadastrodono.php';
        </script>";
        exit();
    } else {
        $criar = mysqli_query($conn, "INSERT INTO dono(nome, login, senha) VALUES ('$nome','$login','$senha')") or die("Erro ao selecionar");
        echo ("<script>alert('Cadastro Feito com Sucesso');</script>");
        echo ("<script>window.location.replace('conta.php');</script>");
        mysqli_close($conn);
    }
?>