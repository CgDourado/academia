<?php
include 'conecta.php';
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$data_nascimento = $_POST['data_nascimento'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];
$imc = calcularIMC($peso, $altura);
function calcularIMC($peso, $altura) {
    $imc = $peso / ($altura * $altura);
    $imc = round($imc, 2);
    return $imc;
}
$sexo = $_POST['sexo'];
$pagamento = $_POST['pagamento'];
$plano = $_POST['plano'];


// Calculate age based on the date of birth
$birth_date = DateTime::createFromFormat('d/m/Y', $data_nascimento);
$current_date = new DateTime();
$age = $current_date->diff($birth_date)->y;

$query = $conn->query("SELECT * FROM usuario WHERE cpf='$cpf'");
if(mysqli_num_rows($query) > 0){
    echo "<script language='javascript' type='text/javascript'>
    alert('Usuário já Existente!');
    window.location.href='usuarios_html.php';
    </script>";
    exit();
} else {
    mysqli_begin_transaction($conn);
    $nascimento = $birth_date->format('Y-m-d');
    $sql1 = "INSERT INTO usuario(nome, email, telefone, cpf, data_nascimento, idade, peso, altura, sexo, imc, pagamento, plano) VALUES ('$nome','$email','$telefone','$cpf','$nascimento','$age','$peso','$altura','$sexo','$imc','$pagamento','$plano')";
    $sql2 = "INSERT INTO treinos(nome, peso, altura, imc) VALUES ('$nome','$peso','$altura', '$imc')";
    if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
        mysqli_commit($conn);
        echo "<script language='javascript' type='text/javascript'>
        window.location.href='usuarios_html.php';
        </script>";
    } else {
        mysqli_rollback($conn);
        echo "<script language='javascript' type='text/javascript'>
        alert('Não foi possível fazer o cadastro!');
        window.location.href='usuarios_html.php';
        </script>";
    }
}
?>
