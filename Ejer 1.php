<?php

//felix granadillo 31675738

class Rectangulo {
    public $largo = 1.0;
    public $ancho = 1.0;

    public function calcularPerimetro() {
        return 2 * ($this->largo + $this->ancho);
    }

    public function calcularArea() {
        return $this->largo * $this->ancho;
    }
}

$rectangulo = new Rectangulo();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rectangulo->largo = floatval($_POST["largo"]);
    $rectangulo->ancho = floatval($_POST["ancho"]);
}
?>

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
    <h1>Calculadora de Rectángulo</h1>
    <form method="post">
        Largo: <input type="text" name="largo" value="<?php echo $rectangulo->largo; ?>"><br>
        Ancho: <input type="text" name="ancho" value="<?php echo $rectangulo->ancho; ?>"><br>
        <input type="submit" value="Calcular">
    </form>
    
    <h2>Resultados:</h2>
    <p>Largo: <?php echo $rectangulo->largo; ?></p>
    <p>Ancho: <?php echo $rectangulo->ancho; ?></p>
    <p>Perímetro: <?php echo $rectangulo->calcularPerimetro(); ?></p>
    <p>Área: <?php echo $rectangulo->calcularArea(); ?></p>
</body>
</html>
