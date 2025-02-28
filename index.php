<?php

// Incluir archivos necesarios
require_once 'constantes.php';
require_once 'funciones.php';
require_once 'clases/Personaje.php';

// Obtener información de los personajes de Rick y Morty
$personajes = Personaje::obtener_personajes(API_URL);

// Renderizar la cabecera de la página
render_plantilla('cabecera', ["titulo" => "Personajes de Rick y Morty"]);

// Preparar los datos para la plantilla principal
$datos_personajes = array_map(function($personaje) {
    $datos = $personaje->obtener_datos();
    return array_merge($datos, [
        'estado_formateado' => formatear_estado($datos['estado']),
        'especie_formateada' => formatear_especie($datos['especie'])
    ]);
}, $personajes);

// Renderizar el contenido principal
render_plantilla('principal', [
    'personajes' => $datos_personajes
]);