<?php 
class TresEnLinea {
    private $tablero;
    private $jugadorActual;

    public function __construct() {
        $this->tablero = array(
            array('-', '-', '-'),
            array('-', '-', '-'),
            array('-', '-', '-')
        );
        $this->jugadorActual = 'X';
    }

    public function mostrarTablero() {
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                echo $this->tablero[$i][$j] . " ";
            }
            echo "\n";
        }
    }

    public function realizarMovimiento($fila, $columna) {
        if ($this->tablero[$fila][$columna] === '-') {
            $this->tablero[$fila][$columna] = $this->jugadorActual;
            return true;
        }
        return false;
    }

    public function cambiarJugador() {
        $this->jugadorActual = ($this->jugadorActual === 'X') ? 'O' : 'X';
    }

    public function hayGanador() {
        // Verificar filas
        for ($i = 0; $i < 3; $i++) {
            if ($this->tablero[$i][0] !== '-' && $this->tablero[$i][0] === $this->tablero[$i][1] && $this->tablero[$i][1] === $this->tablero[$i][2]) {
                return true;
            }
        }

        // Verificar columnas
        for ($j = 0; $j < 3; $j++) {
            if ($this->tablero[0][$j] !== '-' && $this->tablero[0][$j] === $this->tablero[1][$j] && $this->tablero[1][$j] === $this->tablero[2][$j]) {
                return true;
            }
        }

        // Verificar diagonales
        if ($this->tablero[0][0] !== '-' && $this->tablero[0][0] === $this->tablero[1][1] && $this->tablero[1][1] === $this->tablero[2][2]) {
            return true;
        }
        if ($this->tablero[0][2] !== '-' && $this->tablero[0][2] === $this->tablero[1][1] && $this->tablero[1][1] === $this->tablero[2][0]) {
            return true;
        }

        return false;
    }

    public function hayEmpate() {
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($this->tablero[$i][$j] === '-') {
                    return false;
                }
            }
        }
        return true;
    }
}

// Juego
$juego = new TresEnLinea();

echo "¡Bienvenido al juego de Tres en Línea!\n";
echo "Instrucciones: Ingresa la fila y columna en la que deseas colocar tu ficha (0-2).\n";

while (true) {
    $juego->mostrarTablero();
    echo "Es el turno del Jugador " . $juego->jugadorActual . "\n";

    do {
        echo "Ingresa la fila: ";
        $fila = intval(readline());
        echo "Ingresa la columna: ";
        $columna = intval(readline());
    } while (!$juego->realizarMovimiento($fila, $columna));

    if ($juego->hayGanador()) {
        $juego->mostrarTablero();
        echo "¡El Jugador " . $juego->jugadorActual . " ha ganado!\n";
        break;
    } elseif ($juego->hayEmpate()) {
        $juego->mostrarTablero();
        echo "¡Empate!\n";
        break;
    }

    $juego->cambiarJugador();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Tres en Línea</title>
    <style>
        .tablero {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-gap: 5px;
        }

        .casilla {
            width: 100px;
            height: 100px;
            font-size: 2em;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #333;
            cursor: pointer;
        }

        .casilla:hover {
            background-color: #e3e3e3;
        }
    </style>
</head>
<body>
    <h1>Tres en Línea</h1>
    <div class="tablero">
        <?php
        $tablero = [
            ['-', '-', '-'],
            ['-', '-', '-'],
            ['-', '-', '-']
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fila = $_POST['fila'];
            $columna = $_POST['columna'];
            if ($tablero[$fila][$columna] === '-') {
                $tablero[$fila][$columna] = 'X';
                // Realiza aquí la lógica para verificar el ganador o empate
                // Puedes usar las funciones proporcionadas anteriormente

                // Cambio al turno del jugador O (computadora o segundo jugador)
                // Puedes implementar lógica más avanzada aquí si deseas jugar contra la computadora
                // o permitir que dos jugadores humanos se turnen
            }
        }

        for ($i = 0; $i < 3; $i++) {
            echo "<div class='fila'>";
            for ($j = 0; $j < 3; $j++) {
                echo "<form method='post'>";
                echo "<input type='hidden' name='fila' value='$i'>";
                echo "<input type='hidden' name='columna' value='$j'>";
                echo "<button class='casilla'>" . $tablero[$i][$j] . "</button>";
                echo "</form>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
