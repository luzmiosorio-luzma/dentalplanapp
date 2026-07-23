<?php
if (!function_exists('removeEscapeSequences')) {
    function removeEscapeSequences($string)
    {
        // Expresión regular para encontrar secuencias de escape y espacios en blanco
        return preg_replace('/\\\\[nrt"\'\\\\]|\s/', '', $string);
    }

    function obtenerPrimerosDias() {
        // Obtener el primer día del mes actual
        $primerDiaMesActual = date('Y-m-01');

        // Obtener el primer día del mes siguiente
        $primerDiaMesSiguiente = date('Y-m-01', strtotime('first day of next month'));

        return [
            'primerDiaMesActual' => $primerDiaMesActual,
            'primerDiaMesSiguiente' => $primerDiaMesSiguiente
        ];
    }

    function convertirFecha($fecha)
    {
        // Crear un objeto DateTime a partir de la fecha original
        $fechaObj = DateTime::createFromFormat('Y-m-d', $fecha);

        // Verificar si la fecha fue creada correctamente
        if ($fechaObj === false) {
            return "Fecha inválida";
        }

        // Formatear la fecha en el nuevo formato
        return $fechaObj->format('d-m-Y');
    }

    function eliminarPlusCaracter($cadena)
    {
        // Verificar si la cadena es nula o no es una cadena
        if (is_null($cadena) || !is_string($cadena)) {
            return $cadena;
        }

        // Verificar si la cadena no está vacía y el primer carácter es "+"
        if (strlen($cadena) > 0 && $cadena[0] === "+") {
            // Eliminar el primer carácter de la cadena
            return substr($cadena, 1);
        }

        // Retornar la cadena original si no es necesario eliminar el "+"
        return $cadena;
    }

    function escapeSpecialCharacters($text)
    {
        // Caracteres a buscar
        $search = ["\n", "\r", "\t", "\\", "'", "\"", "\0"];
        // Reemplazos correspondientes
        $replace = ["\\n", "\\r", "\\t", "\\\\", "\\'", "\\\"", "\\0"];
        // Reemplazar caracteres especiales
        return str_replace($search, $replace, $text);
    }

    function unescapeSpecialCharacters($text)
    {
        // Caracteres escapados a buscar
        $search = ["\\n", "\\r", "\\t", "\\\\", "\\'", "\\\"", "\\0"];
        // Reemplazos correspondientes
        $replace = ["\n", "\r", "\t", "\\", "'", "\"", "\0"];
        // Reemplazar caracteres escapados con los originales
        return str_replace($search, $replace, $text);
    }

    function unescapeSlashes($text){
        $result = preg_replace('/(?<!\\\\)\\\\/', '', $text);

        return $result;
    }

    function concatenateInserts($obj)
    {
        $result = '';

        // Verificar si el objeto tiene la propiedad 'ops' y es un array
        if (isset($obj->ops) && is_array($obj->ops)) {
            foreach ($obj->ops as $op) {
                // Verificar si cada elemento tiene la propiedad 'insert'
                if (isset($op->insert)) {

                    if (is_string($op->insert)) {
                        $result .= $op->insert;

                        // Si la longitud del resultado supera los 20 caracteres, cortar el string
                        if (strlen($result) >= 30) {
                            $result = substr($result, 0, 30);
                            break;
                        }
                    }



                }
            }
        }

        return $result;
    }

    function removeSpecialCharacters($input)
    {
        $specialCharacters = array("\n", "\r", "\t", "\\", "'", "\"", "\0");

        // Reemplazar cada caracter especial con una cadena vacía
        $output = str_replace($specialCharacters, ' ', $input);

        return $output."...";
    }

    function generateUUIDv4() {
        // Genera 16 bytes aleatorios (128 bits)
        $data = random_bytes(16);

        // Ajusta ciertos bits según la especificación de UUID v4
        $data[6] = chr((ord($data[6]) & 0x0f) | 0x40); // Versión 4
        $data[8] = chr((ord($data[8]) & 0x3f) | 0x80); // Variante

        // Convierte los bytes en un formato UUID estándar
        return sprintf(
            '%08x-%04x-%04x-%04x-%012x',
            // Particiones de bytes
            (ord($data[0]) << 24) | (ord($data[1]) << 16) | (ord($data[2]) << 8) | ord($data[3]),
            (ord($data[4]) << 8) | ord($data[5]),
            (ord($data[6]) << 8) | ord($data[7]),
            (ord($data[8]) << 8) | ord($data[9]),
            (ord($data[10]) << 40) | (ord($data[11]) << 32) | (ord($data[12]) << 24) |
            (ord($data[13]) << 16) | (ord($data[14]) << 8) | ord($data[15])
        );
    }

    function convertirMonedaANumero(string $value): ?float
    {
        // Eliminar espacios en blanco alrededor del valor
        $value = trim($value);

        // Eliminar el símbolo de moneda y caracteres no numéricos excepto ".", ","
        $value = preg_replace('/[^\d,.-]/', '', $value);

        // Reemplazar comas por puntos para manejar decimales (formato internacional)
        if (strpos($value, ',') !== false && strpos($value, '.') === false) {
            $value = str_replace(',', '.', $value);
        } elseif (strpos($value, '.') > strpos($value, ',')) {
            $value = str_replace(['.', ','], ['', '.'], $value);
        } else {
            $value = str_replace(',', '', $value);
        }

        // Convertir el valor a float
        return is_numeric($value) ? (float)$value : null;
    }

}