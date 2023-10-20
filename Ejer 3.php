<?php

//felix granadillo 31675738

class Rectangulo {
    public $x, $y, $ancho, $alto, $caracterRelleno, $caracterPerimetro;

    public function __construct($x, $y, $ancho, $alto) {
        $this->x = $x;
        $this->y = $y;
        $this->ancho = $ancho;
        $this->alto = $alto;
        $this->caracterRelleno = '#';
        $this->caracterPerimetro = '*';
    }

    public function establecerCaracterRelleno($caracter) {
        $this->caracterRelleno = $caracter;
    }

    public function establecerCaracterPerimetro($caracter) {
        $this->caracterPerimetro = $caracter;
    }

    public function dibujar() {
        for ($i = 0; $i < 25; $i++) {
            for ($j = 0; $j < 25; $j++) {
                if ($i >= $this->y && $i < $this->y + $this->alto && $j >= $this->x && $j < $this->x + $this->ancho) {
                    if ($i == $this->y || $i == $this->y + $this->alto - 1 || $j == $this->x || $j == $this->x + $this->ancho - 1) {
                        echo $this->caracterPerimetro;
                    } else {
                        echo $this->caracterRelleno;
                    }
                } else {
                    echo ' ';
                }
            }
            echo "<br>";
        }
    }
}

$rectangulo = new Rectangulo(5, 5, 15, 10);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = intval($_POST["x"]);
    $y = intval($_POST["y"]);
    $ancho = intval($_POST["ancho"]);
    $alto = intval($_POST["alto"]);
    $caracterRelleno = $_POST["caracter_relleno"];
    $caracterPerimetro = $_POST["caracter_perimetro"];

    $rectangulo = new Rectangulo($x, $y, $ancho, $alto);
    $rectangulo->establecerCaracterRelleno($caracterRelleno);
    $rectangulo->establecerCaracterPerimetro($caracterPerimetro);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dibujo de Rectángulo</title>
    <style>
        pre {
            font-family: monospace;
            white-space: pre-wrap;
            background-color: #f5f5f5;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Generador de Rectángulo</h1>
    <form method="post">
        Coordenada X: <input type="number" name="x" value="<?php echo $rectangulo->x; ?>"><br>
        Coordenada Y: <input type="number" name="y" value="<?php echo $rectangulo->y; ?>"><br>
        Ancho: <input type="number" name="ancho" value="<?php echo $rectangulo->ancho; ?>"><br>
        Alto: <input type="number" name="alto" value="<?php echo $rectangulo->alto; ?>"><br>
        Carácter de Relleno: <input type="text" name="caracter_relleno" value="<?php echo $rectangulo->caracterRelleno; ?>"><br>
        Carácter de Perímetro: <input type="text" name="caracter_perimetro" value="<?php echo $rectangulo->caracterPerimetro; ?>"><br>
        <input type="submit" value="Calcular">
    </form>

    <h2>Rectángulo Generado:</h2>
    <pre>
    <?php
    $rectangulo->dibujar();
    ?>
    </pre>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Rectángulo</title>
      <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    background-color: #333;
    color: #fff;
    padding: 20px;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

form input[type="text"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form input[type="submit"] {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

h2 {
    margin-top: 20px;
}

p {
    margin: 10px 0;
}

/* Estilo para los resultados */
p:nth-of-type(3), p:nth-of-type(4) {
    font-weight: bold;
    color: #0073e6;
}

/* Hover en el botón */
form input[type="submit"]:hover {
    background-color: #555;
}

</style>
</head>
<body>