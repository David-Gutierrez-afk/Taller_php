<?php
declare(strict_types=1);
require_once __DIR__ . '/OperacionBase.php';

// hereda de OperacionBase para reutilizar el manejo de errores
class GeneradorAcronimo extends OperacionBase {
    private string $frase;
    private string $acronimo;

    public function __construct(string $frase = '') {
        $this->frase = $frase;
        $this->acronimo = '';
    }

    public function setFrase(string $frase): void {
        $this->frase = $frase;
    }

    public function getFrase(): string {
        return $this->frase;
    }

    public function getAcronimo(): string {
        return $this->acronimo;
    }

    // limpia el texto y saca la primera letra de cada palabra
    public function generar(?string $frase = null): string {
        $this->limpiarError();
        if ($frase !== null) {
            $this->frase = $frase;
        }

        // se cambian los guiones por espacios porque el punto pide contarlos como separadores
        $fraseSinGuiones = str_replace(['-', '–', '—'], ' ', $this->frase);

        // quitamos signos como ! o ' para que palabras como "It's" no se partan en dos
        $fraseLimpia = preg_replace('/[^\p{L}\p{N}\s]/u', '', $fraseSinGuiones) ?? '';

        // separamos las palabras por espacio
        $palabras = preg_split('/\s+/u', trim($fraseLimpia)) ?: [];

        // recorremos cada palabra y guardamos su inicial en mayúscula
        $resultado = '';
        foreach ($palabras as $palabra) {
            if ($palabra !== '') {
                $resultado .= mb_strtoupper(mb_substr($palabra, 0, 1, 'UTF-8'), 'UTF-8');
            }
        }

        if ($resultado === '') {
            $this->registrarError('Ingrese al menos una palabra válida con letras o números.');
        }

        $this->acronimo = $resultado;
        return $this->acronimo;
    }
}
