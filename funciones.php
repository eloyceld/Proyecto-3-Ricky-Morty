<?php

declare(strict_types=1);

/**
 * Renderiza una plantilla PHP con los datos proporcionados
 * 
 * @param string $plantilla Nombre de la plantilla (sin extensión .php)
 * @param array $data Datos a pasar a la plantilla
 * @return void
 */
function render_plantilla(string $plantilla, array $data = []): void
{
    extract($data); // Extrae las variables del array asociativo
    require "plantilla/$plantilla.php";
}

/**
 * Formatea el estado de un personaje con una etiqueta de color
 * 
 * @param string $estado Estado del personaje (Alive, Dead, etc.)
 * @return string Estado formateado con clases CSS
 */
function formatear_estado(string $estado): string
{
    return match($estado) {
        'Alive' => '<span class="badge bg-success">Vivo</span>',
        'Dead' => '<span class="badge bg-danger">Muerto</span>',
        default => '<span class="badge bg-secondary">Desconocido</span>'
    };
}

/**
 * Formatea la especie de un personaje
 * 
 * @param string $especie Especie del personaje
 * @return string Especie formateada en español
 */
function formatear_especie(string $especie): string
{
    return match($especie) {
        'Human' => 'Humano',
        'Alien' => 'Alienígena',
        'Robot' => 'Robot',
        default => $especie
    };
}