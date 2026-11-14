<?php
declare(strict_types=1);
require_once __DIR__ . '/OperacionBase.php';

// clase encargada solo del punto 2 (fibonacci y factorial)
class CalculadoraSucesiones extends OperacionBase {
    private int $numero;

    public function __construct(int $numero = 0) {
        $this->numero = $numero;
    }

    public function setNumero(int $numero): void {
        $this->numero = $numero;
    }

    public function getNumero(): int {
        return $this->numero;
    }

    // genera la cantidad de números de fibonacci que pida el usuario
    public function calcularFibonacci(?int $n = null): array {
        $this->limpiarError();
        $cantidad = $n ?? $this->numero;
        $this->numero = $cantidad;

        if ($cantidad <= 0) {
            $this->registrarError('La cantidad de términos para Fibonacci debe ser un entero mayor a 0.');
            return [];
        }
        if ($cantidad === 1) {
            return [0];
        }

        // empieza con 0 y 1, y luego cada número es la suma de los dos anteriores
        $fib = [0, 1];
        for ($i = 2; $i < $cantidad; $i++) {
            $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
        }

        return $fib;
    }

    // arma la serie de multiplicación del factorial (1 x 2 x 3...) y muestra el resultado
    public function calcularFactorial(?int $n = null): string {
        $this->limpiarError();
        $valorN = $n ?? $this->numero;
        $this->numero = $valorN;

        if ($valorN < 0) {
            $this->registrarError('El factorial no está definido para números negativos.');
            return $this->getUltimoError();
        }
        // se limita a 170 porque en php más de 170! desborda el tamaño máximo y da infinito
        if ($valorN > 170) {
            $this->registrarError('El número es demasiado grande (máximo permitido: 170).');
            return $this->getUltimoError();
        }
        if ($valorN === 0 || $valorN === 1) {
            return "{$valorN}! = 1";
        }

        $serie = range(1, $valorN);
        $valor = $this->factorialRecursivo($valorN);
        return implode(' × ', $serie) . ' = ' . $valor;
    }

    // función recursiva que se llama a sí misma restando 1 hasta llegar a 1
    private function factorialRecursivo(int $n): int|float {
        if ($n <= 1) {
            return 1;
        }
        return $n * $this->factorialRecursivo($n - 1);
    }
}
