<?php
declare(strict_types=1);
require_once __DIR__ . '/OperacionBase.php';

// clase para el punto 5: pasa un número entero a binario
class ConversorBinario extends OperacionBase {
    private int $numeroEntero = 0;

    public function convertir(string|int $numero): string {
        $this->limpiarError();
        $texto = trim((string)$numero);

        // revisa que sí sea un número entero y que no tenga decimales
        if ($texto === '' || filter_var($texto, FILTER_VALIDATE_INT) === false) {
            $this->registrarError('Error: Por favor, ingrese un número entero válido (sin decimales).');
            return $this->getUltimoError();
        }

        $this->numeroEntero = (int)$texto;
        $esNegativo = $this->numeroEntero < 0;

        // decbin convierte el número a base 2, y si era negativo le volvemos a poner el signo -
        $binario = decbin(abs($this->numeroEntero));

        return $esNegativo ? '-' . $binario : $binario;
    }

    public function getNumeroEntero(): int {
        return $this->numeroEntero;
    }
}
