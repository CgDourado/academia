<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <label>Peso (kg)</label>
    <input id="peso" type="number" placeholder="Insira seu Peso" required />
    <br />
    <label>Altura</label>
    <input id="altura" type="number" placeholder="Insira a Altura" required />
    <button onclick="calcularIMC()">calcular IMC</button>
    <p></p>

    <script>
        function calcularIMC() {
            const peso = parseFloat(document.getElementById("peso").value);
            const altura = parseFloat(document.getElementById("altura").value);
            const imc = (peso / (altura * altura)).toFixed(1);
            document.querySelector("p").innerHTML = imc;
        }
    </script>
</body>

</html>