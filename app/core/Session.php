<?php

class Session
{
    /**
     * Guarda un mensaje flash en la sesión.
     */
    public static function flash($tipo, $mensaje)
    {
        $_SESSION['flash'] = [
            'tipo' => $tipo,
            'mensaje' => $mensaje
        ];
    }

    /**
     * Muestra el mensaje flash y lo elimina.
     */
    public static function mostrarFlash()
    {
        if (!empty($_SESSION['flash'])) {

            $flash = $_SESSION['flash'];

            echo '
            <div class="alert alert-' . htmlspecialchars($flash['tipo']) . ' alert-dismissible fade show" role="alert">
                ' . htmlspecialchars($flash['mensaje']) . '
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>';

            unset($_SESSION['flash']);
        }
    }

    /**
     * Redirecciona a una ruta.
     */
    public static function redirect($ruta)
    {
        header("Location: " . BASE_URL . $ruta);
        exit;
    }

    /**
     * Redirecciona mostrando previamente un mensaje.
     */
    public static function redirectWithMessage($ruta, $tipo, $mensaje)
    {
        self::flash($tipo, $mensaje);

        self::redirect($ruta);
    }
}