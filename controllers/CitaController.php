<?php

namespace Controllers;

use MVC\Router;

class CitaController
{
    public static function index(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        isAuth();

        // Verificar si las claves existen en $_SESSION
        $nombre = isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : null;
        $id = isset($_SESSION["id"]) ? $_SESSION["id"] : null;

        // Puedes manejar casos donde los valores no estén definidos
        if (!$nombre || !$id) {
            // Ejemplo: redirigir al usuario al login
            header("Location: /login");
            exit;
        }

        $router->render("cita/index", [
            "nombre" => $nombre,
            "id" => $id
        ]);
    }
}
