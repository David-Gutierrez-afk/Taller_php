<?php
// Clase encargada de manejar la lógica de las aplicaciones
class Operaciones {
    
    // Método para App 1: Convertir texto en acrónimo
    public function generarAcronimo($frase) {
        // Reemplaza guiones por espacios vacíos
        $fraseLimpia = str_replace('-', ' ', $frase);
        // Elimina cualquier signo de puntuación dejando solo letras, números y espacios
        $fraseLimpia = preg_replace('/[^a-zA-Z0-9\s]/', '', $fraseLimpia);
        
        $palabras = explode(' ', $fraseLimpia);
        $acronimo = '';
        
        foreach ($palabras as $palabra) {
            if (!empty($palabra)) {
                // Toma la primera letra y la convierte en mayúscula
                $acronimo .= strtoupper($palabra[0]);
            }
        }
        return $acronimo;
    }
}
?>