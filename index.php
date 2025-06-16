<?php
// Cargar el archivo JSON
$jsonData = file_get_contents("data.json");
$data = json_decode($jsonData, true);

// Validación básica
if (!isset($data) || !is_array($data)) {
    die("Error: El archivo data.json debe contener un array de objetos.");
}

// Buscar todos los archivos .txt en el directorio actual
foreach (glob("*.txt") as $filename) {
    $originalContent = file_get_contents($filename);

    foreach ($data as $index => $row) {
        if (!is_array($row)) continue; // Saltar si no es un objeto

        // Reemplazar variables ${clave} con los valores del objeto actual
        $content = preg_replace_callback('/\$\{([a-zA-Z0-9_]+)\}/', function ($matches) use ($row) {
            $key = $matches[1];
            return isset($row[$key]) ? $row[$key] : $matches[0];
        }, $originalContent);
        $nombre_persona = $row['nombre_persona'];
        // Guardar una versión del archivo con el índice
        $newFilename = 'result/' . pathinfo($filename, PATHINFO_FILENAME) . "_$nombre_persona.txt";
        file_put_contents($newFilename, $content);

        echo "Generado: $newFilename\n";
    }
}
