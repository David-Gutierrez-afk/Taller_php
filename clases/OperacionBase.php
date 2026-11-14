<?php
declare(strict_types=1);

// clase base para no repetir el manejo de errores en las demás clases
abstract class OperacionBase {
    protected string $ultimoError = '';

    // devuelve el texto del error si algo falló
    public function getUltimoError(): string {
        return $this->ultimoError;
    }

    // sirve para saber en la vista si hubo error y mostrar la alerta roja
    public function tieneError(): bool {
        return $this->ultimoError !== '';
    }

    // limpia errores anteriores antes de hacer un cálculo nuevo
    protected function limpiarError(): void {
        $this->ultimoError = '';
    }

    // guarda el mensaje de error cuando algún dato no es válido
    protected function registrarError(string $mensaje): void {
        $this->ultimoError = $mensaje;
    }
}
