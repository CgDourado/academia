<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Apple-like Navbar</title>
    <style>
        body {
            margin: 0;
            font-family: 'Helvetica', sans-serif;
            /* ou outra fonte semelhante à da Apple */
        }

        header {
            background-color: #141414;
            /* Cor de fundo da barra de navegação */
            padding: 1px 20px;
            height: 80px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.5);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links {
            list-style: none;
            display: flex;
        }

        .nav-links li {
            margin-right: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #b3b3b3;
            /* Cor dos links não visitados */
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: white;
            /* Cor dos links ao passar o mouse sobre eles */
        }

        .logo img {
            max-width: 35%;
            /* Define a largura máxima da imagem como 100% do contêiner pai */
            height: auto;
            /* Garante que a altura seja ajustada automaticamente para manter a proporção */
            margin-top: -10px;
        }

        /* Adicionando estilos para o botão de sair */
        .logout-btn {
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-weight: bold;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo"><img src="css/logo.png" alt="logo"></div>
            <ul class="nav-links">
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="usuarios_html.php">Clientes</a></li>
                <li><a href="treinos.php">Treinos</a></li>
                <li><a href="treinadores_html.php">Treinadores</a></li>
                <li><a href="planos.php">Planos</a></li>
                <li><a href="sair.php" class="logout-btn">Sair</a></li>
            </ul>
        </nav>
    </header>
    <!-- Restante do conteúdo da página -->
</body>

</html>