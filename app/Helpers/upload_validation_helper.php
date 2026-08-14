<?php
if (!function_exists('validate_uploaded_file')) {
    /**
     * @return string|null null si es valido, o un codigo de error si no.
     */
    function validate_uploaded_file(\CodeIgniter\HTTP\Files\UploadedFile $file, array $allowedExt, array $allowedMime, int $maxBytes): ?string
    {
        $ext  = strtolower($file->guessExtension());
        $mime = $file->getMimeType();

        if ($ext === '' || !in_array($ext, $allowedExt, true) || !in_array($mime, $allowedMime, true)) {
            return 'error_tipo_no_permitido';
        }

        if ($file->getSize() > $maxBytes) {
            return 'error_archivo_muy_grande';
        }

        return null;
    }
}

if (!function_exists('validate_decoded_image')) {
    /**
     * Valida bytes de imagen ya decodificados (ej. desde base64), usando
     * deteccion real de contenido (finfo), no el prefijo del data-URI.
     *
     * @return string|null null si es valido, o un codigo de error si no.
     */
    function validate_decoded_image(string $decodedBytes, int $maxBytes, string $expectedMime = 'image/png'): ?string
    {
        if ($decodedBytes === '') {
            return 'error_tipo_no_permitido';
        }

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_buffer($finfo, $decodedBytes);
        finfo_close($finfo);

        if ($mime !== $expectedMime) {
            return 'error_tipo_no_permitido';
        }

        if (strlen($decodedBytes) > $maxBytes) {
            return 'error_archivo_muy_grande';
        }

        return null;
    }
}
