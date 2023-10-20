<?php
// felix granadillo 31675738

class EnteroMuyLargo {
    public $entero;

    public function __construct($valor = '0') {
        $this->entero = strval($valor);
    }

    public function suma($otro) {
        $resultado = strval(bcadd($this->entero, $otro->entero));
        return new EnteroMuyLargo($resultado);
    }

    public function resta($otro) {
        $resultado = strval(bcsub($this->entero, $otro->entero));
        return new EnteroMuyLargo($resultado);
    }

    public function multiplica($otro) {
        $resultado = strval(bcmul($this->entero, $otro->entero));
        return new EnteroMuyLargo($resultado);
    }

    public function divide($otro) {
        if ($otro->esCero()) {
            throw new Exception("División por cero no permitida.");
        }
        $resultado = strval(bcdiv($this->entero, $otro->entero));
        return new EnteroMuyLargo($resultado);
    }

    public function esCero() {
        return $this->entero === '0';
    }
}

$entero1 = new EnteroMuyLargo();
$entero2 = new EnteroMuyLargo();

$resultado = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor1 = $_POST["valor1"];
    $valor2 = $_POST["valor2"];
    $operacion = $_POST["operacion"];

    $entero1 = new EnteroMuyLargo($valor1);
    $entero2 = new EnteroMuyLargo($valor2);

    if ($operacion == "suma") {
        $resultado = $entero1->suma($entero2);
    } elseif ($operacion == "resta") {
        $resultado = $entero1->resta($entero2);
    } elseif ($operacion == "multiplica") {
        $resultado = $entero1->multiplica($entero2);
    } elseif ($operacion == "divide") {
        try {
            $resultado = $entero1->divide($entero2);
        } catch (Exception $e) {
            $resultado = $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Enteros Muy Largos</title>
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
    <h1>Calculadora de Enteros Muy Largos</h1>
    <form method="post">
        Valor 1: <input type="text" name="valor1" value="<?php echo $entero1->entero; ?>"><br>
        Valor 2: <input type="text" name="valor2" value="<?php echo $entero2->entero; ?>"><br>
        Operación:
        <select name="operacion">
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplica">Multiplicación</option>
            <option value="divide">División</option>
        </select><br>
        <input type="submit" value="Calcular">
    </form>

    <?php if ($resultado !== null) : ?>
        <h2>Resultado:</h2>
        <?php
        if (is_object($resultado)) {
            echo $resultado->entero;
        } else {
            echo $resultado;
        }
        ?>
    <?php endif; ?>
</body>
</html>
