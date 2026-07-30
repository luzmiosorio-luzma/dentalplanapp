<?php
if (!function_exists('validate_uploaded_image')) {
    /**
     * @return string|null null si es valido, o un codigo de error si no.
     */
    function validate_uploaded_image(\CodeIgniter\HTTP\Files\UploadedFile $file, array $allowedExt, array $allowedMime, int $maxBytes): ?string
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
