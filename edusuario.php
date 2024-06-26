<?php
    include 'conecta.php';
    $id = $_GET['id'];
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
    $treinador = $_POST['treinador'];
    // Calcular a idade
    $idade = calcularIdade($data_nascimento);

    function calcularIdade($data_nascimento)
    {
        $data_nasc = new DateTime($data_nascimento);
        $hoje = new DateTime();
        $idade = $hoje->diff($data_nasc);
        return $idade->y;
    }

    mysqli_begin_transaction($conn);
    $sql1 = "UPDATE usuario SET nome=?,email=?,telefone=?,cpf=?,data_nascimento=?,idade=?,peso=?,altura=?,sexo=?,imc=?,pagamento=?,plano=?,treinador=? WHERE id=?";
    $stmt1 = $conn->prepare($sql1) or die($conn->error);
    if (!$stmt1) {
        echo "Error na atualização!".$conn->errno.'-'.$conn->error;
    }
    $stmt1->bind_param('sssssssssssssi',$nome,$email,$telefone,$cpf,$data_nascimento,$idade,$peso,$altura,$sexo,$imc,$pagamento,$plano,$treinador,$id);;
    $stmt1->execute();
    $stmt1->close();
    
    $sql2 = "UPDATE treinos SET nome=?,peso=?,altura=?,imc=? WHERE id=?";
    $stmt2 = $conn->prepare($sql2) or die($conn->error);
    if (!$stmt2) {
        echo "Error na atualização!".$conn->errno.'-'.$conn->error;
    }
    $stmt2->bind_param('ssssi',$nome,$peso,$altura,$imc,$id);
    $stmt2->execute();
    $stmt2->close();
    mysqli_commit($conn);
    header("Location: usuarios_html.php#tabs-4");
?>