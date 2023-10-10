<?php
include 'conecta.php';
$id = $id;
$sql = "SELECT * FROM treinadores WHERE id=$id";
$query = $conn->query($sql);
while ($dados = $query->fetch_array()) {
    $nome = $dados['nome'];
    $login = $dados['login'];
    $senha = $dados['senha'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-brasil/js-brasil.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form id="editaForm2" action="edtreinador.php?id=<?php echo $id; ?>" method="POST">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome; ?>" placeholder="Insira o nome completo" required />
            <br />
            <label>Login</label>
            <input type="text" class="form-control" name="login" value="<?php echo $login; ?>" placeholder="Insira o Login" required />
            <br />
            <label class='form-label' style="float: left; margin: 1px;">Senha</label>
            <input class='form-control' type='password' name='senha' id="senha" value="<?php echo $senha; ?>" placeholder='Digite a sua senha' required />
            <div class="mostrar-senha" style="float: left;">
                <input type="checkbox" id="chk" float: left> Mostrar Senha</input>
                <script>
                    const senha = document.getElementById("senha");
                    const chk = document.getElementById("chk");

                    chk.onchange = function(e) {
                        senha.type = chk.checked ? "text" : "password";
                    };
                </script>
            </div>
            <br /><br />
            <div class="d-grid gap-2 col-20 mx-auto">
                <button type="submit" id="submit" class="btn btn-success editar-button">Atualizar</button>
            </div>
        </div>
    </form>
</body>

</html>