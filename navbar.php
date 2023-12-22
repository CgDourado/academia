<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Apple-like Navbar</title>
    <style>
        /* Reset de margens e definição da fonte padrão */
        body {
            margin: 0;
            font-family: 'Helvetica', sans-serif;
        }

        /* Estilos para o cabeçalho (barra de navegação) */
        header {
            background-color: #141414;
            /* Cor de fundo da barra de navegação */
            padding: 1px 20px;
            /* Espaçamento interno da barra de navegação */
            height: 80px;
            /* Altura da barra de navegação */
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.5);
            /* Sombra na barra de navegação */
        }

        /* Estilos para a barra de navegação */
        .navbar {
            display: flex;
            /* Layout flexível para os elementos da barra de navegação */
            justify-content: space-between;
            /* Espaço entre os itens da barra de navegação */
            align-items: center;
            /* Centraliza os itens verticalmente */
        }

        /* Estilos para a lista de links na barra de navegação */
        .nav-links {
            list-style: none;
            /* Remoção do marcador de lista */
            display: flex;
            /* Layout flexível para os itens da lista */
        }

        /* Estilos para cada item da lista de links */
        .nav-links li {
            margin-right: 20px;
            /* Espaçamento à direita entre os itens da lista */
        }

        /* Estilos para os links na barra de navegação */
        .nav-links a {
            text-decoration: none;
            /* Remoção do sublinhado padrão dos links */
            color: #b3b3b3;
            /* Cor padrão dos links não visitados */
            transition: color 0.3s ease;
            /* Transição suave da cor ao longo do tempo */
        }

        /* Estilos para os links quando estão em hover, active ou focus */
        .nav-links a:hover,
        .nav-links a:active,
        .nav-links a:focus {
            color: #e78834;
            /* Cor dos links quando estão em hover, active ou focus */
        }

        /* Estilos para a logo na barra de navegação */
        .logo img {
            max-width: 35%;
            /* Largura máxima da imagem em relação ao contêiner pai */
            height: auto;
            /* Altura ajustada automaticamente para manter a proporção */
            margin-top: -10px;
            /* Deslocamento para cima para ajustar a posição vertical */
        }

        /* Estilos específicos para o botão de sair na barra de navegação */
        .nav-links a.logout-btn:hover {
            color: white;
            /* Cor do texto quando o mouse está sobre o botão "Sair" */
            background-color: #c0392b;
            /* Cor de fundo quando o mouse está sobre o botão "Sair" */
        }

        /* Estilos para o botão de sair na barra de navegação */
        .logout-btn {
            color: #c0392b;
            /* Cor padrão do texto do botão "Sair" */
            padding: 10px 15px;
            /* Espaçamento interno do botão "Sair" */
            border-radius: 5px;
            /* Borda arredondada do botão "Sair" */
            transition: background-color 0.3s ease;
            /* Transição suave da cor de fundo ao longo do tempo */
            font-weight: bold;
            /* Peso da fonte em negrito */
        }

        /* Estilos para o botão de sair quando o mouse está sobre ele */
        .logout-btn:hover {
            background-color: red;
            /* Cor de fundo quando o mouse está sobre o botão "Sair" */
            color: white;
            /* Cor do texto quando o mouse está sobre o botão "Sair" */
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
</body>

</html>