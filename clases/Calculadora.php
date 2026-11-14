<?php
declare(strict_types=1);
require_once __DIR__ . '/OperacionBase.php';

// clase para el punto 7: hace los cálculos básicos y el porcentaje
class CalculadoraAritmetica extends OperacionBase {
    private float $num1 = 0.0;
    private float $num2 = 0.0;
    private string $operacion = 'suma';

    public function calcular(string|float|int $num1, string|float|int $num2, string $operacion): float|int|string {
        $this->limpiarError();
        // convertimos a float para que acepte tanto enteros como decimales
        $this->num1 = (float)$num1;
        $this->num2 = (float)$num2;
        $this->operacion = $operacion;

        switch ($this->operacion) {
            case 'suma':
                return $this->num1 + $this->num2;
            case 'resta':
                return $this->num1 - $this->num2;
            case 'multiplicacion':
                return $this->num1 * $this->num2;
            case 'division':
                // evitamos que se divida por cero porque daría error matemático
                if ($this->num2 == 0.0) {
                    $this->registrarError('Error: No se puede dividir por cero');
                    return $this->getUltimoError();
                }
                return round($this->num1 / $this->num2, 6);
            case 'porcentaje':
                // saca el porcentaje multiplicando y dividiendo entre 100
                return ($this->num1 * $this->num2) / 100;
            default:
                $this->registrarError('Error: Operación no válida');
                return $this->getUltimoError();
        }
    }
}
