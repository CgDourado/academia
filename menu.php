<?php
    if(empty($_SESSION["user"])){
        echo "";
    }
    else 
    {
        $usuario = $_SESSION["user"];
        echo "<a href='inicio.php' style='color: black; text-decoration: none; font-weight: bold;'>Home</a>";
        echo "<b><font color='black'> | </font></b>";
        echo "<a href='usuarios_html.php' style='color: black; text-decoration: none; font-weight: bold;'>Clientes</a>";
        echo "<b><font color='black'> | </font></b>";
        echo "<a href='treinos.php' style='color: black; text-decoration: none; font-weight: bold;'>Treinos</a>";
        echo "<b><font color='black'> | </font></b>";
        echo "<a href='.php' style='color: black; text-decoration: none; font-weight: bold;'>Planos</a>";
    }
?>