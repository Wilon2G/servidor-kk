<?php
function getAllOccurrences($haystack, $needle) {
    $positions = [];
    $offset = 0;

    // Mientras 'strpos' siga encontrando ocurrencias
    while (($pos = strpos($haystack, $needle, $offset)) !== false) {
        $positions[] = $pos;
        // Mover el offset para buscar después de la última ocurrencia encontrada
        $offset = $pos + strlen($needle);
    }

    return $positions;
}


?>