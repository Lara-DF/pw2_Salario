<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cálculo de Salário</title>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Corpo da página */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container central */
        form, body > div {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            margin: 20px;
        }

        /* Título */
        h1 {
            text-align: center;
            color: #000000;
            margin-bottom: 20px;
        }

        /* Labels */
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
        }

        /* Inputs */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: 0.3s;
        }

        input[type="text"]:focus {
            border-color: #000000;
            outline: none;
        }

        input[type="text"]::placeholder {
            color: #888;
        }

        /* Botões */
        input[type="submit"],
        input[type="reset"] {
            width: 48%;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
            font-size: 16px;
        }

        input[type="submit"] {
            background: #000000;
            color: white;
        }

        input[type="submit"]:hover {
            background: #000000;
        }

        input[type="reset"] {
            background: #ccc;
        }

        input[type="reset"]:hover {
            background: #999;
        }

        /* Mensagem de erro */
        .erro {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        /* Resultado */
        .resultado {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            color: green;
        }
    </style>
</head>
<body>

    <form action="" method="post">
        <h1>Cálculo de Salário</h1>

        <label for="texthoras">Digite as horas trabalhadas:
            <input type="text" name="txthoras" id="texthoras" placeholder="Ex: 160 horas" required>
        </label>

        <label for="textvalor">Digite o valor da hora trabalhada:
            <input type="text" name="txtvalor" id="textvalor" placeholder="Ex: R$ 25,00" required>
        </label>

        <div style="display: flex; justify-content: space-between; gap: 10px;">
            <input type="submit" value="Calcular">
            <input type="reset" value="Limpar">
        </div>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitização e validação dos inputs
            $horas = filter_input(INPUT_POST, 'txthoras', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $valor = filter_input(INPUT_POST, 'txtvalor', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            // Verifica se os valores são numéricos
            if (is_numeric($horas) && is_numeric($valor) && $horas > 0 && $valor > 0) {
                $salario = $horas * $valor;
                echo "<div class='resultado'>O salário é: R$ " . number_format($salario, 2, ",", ".") . "</div>";
            } else {
                echo "<div class='erro'>Por favor, insira valores válidos para as horas e o valor da hora trabalhada.</div>";
            }
        }
        ?>
    </form>

</body>
</html>