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
            padding: 10px 20px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            /* Cor do texto do logo */
            font-size: 24px;
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

        .logo{
            max-width: 100%;
            /* Ajusta a largura máxima da imagem */
            height: auto;
            /* Garante que a altura seja ajustada automaticamente */
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo" href="inicio.php"><img src="css/logo.png" alt="logo"></div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Support</a></li>
            </ul>
        </nav>
    </header>
    <!-- Restante do conteúdo da página -->
</body>

</html>