<?php

declare(strict_types=1);

class Personaje
{
    /**
     * Constructor de la clase Personaje
     *
     * @param string $nombre Nombre del personaje
     * @param string $estado Estado del personaje (vivo, muerto, etc.)
     * @param string $especie Especie del personaje
     * @param string $imagen URL de la imagen del personaje
     * @param string $origen Nombre del origen del personaje
     * @param string $ubicacion Ubicación actual del personaje
     */
    public function __construct(
        private string $nombre,
        private string $estado,
        private string $especie,
        private string $imagen,
        private string $origen,
        private string $ubicacion
    ) {
    }

    /**
     * Obtiene los datos del personaje como array asociativo
     *
     * @return array Datos del personaje
     */
    public function obtener_datos(): array
    {
        return get_object_vars($this);
    }

    /**
     * Obtiene personajes desde la API y crea objetos Personaje
     *
     * @param string $url_api URL de la API para obtener personajes
     * @return array Array de objetos Personaje
     */
    public static function obtener_personajes(string $url_api): array
    {
        $respuesta = @file_get_contents($url_api);
        
        if ($respuesta === false) {
            // Si no se puede acceder a la API, usar datos de ejemplo
            return [
                new self(
                    'Rick Sanchez',
                    'Alive',
                    'Human',
                    'https://rickandmortyapi.com/api/character/avatar/1.jpeg',
                    'Earth',
                    'Earth (C-137)'
                ),
                new self(
                    'Morty Smith',
                    'Alive',
                    'Human',
                    'https://rickandmortyapi.com/api/character/avatar/2.jpeg',
                    'Earth',
                    'Earth (C-137)'
                ),
                new self(
                    'Summer Smith',
                    'Alive',
                    'Human',
                    'https://rickandmortyapi.com/api/character/avatar/3.jpeg',
                    'Earth',
                    'Earth (C-137)'
                )
            ];
        }
        
        // Decodificar el JSON recibido en un array asociativo
        $datos = json_decode($respuesta, true);
        $personajes = [];
        
        // Crear objetos Personaje para cada resultado
        foreach ($datos['results'] as $personaje) {
            $personajes[] = new self(
                $personaje['name'],
                $personaje['status'],
                $personaje['species'],
                $personaje['image'],
                $personaje['origin']['name'],
                $personaje['location']['name']
            );
        }
        
        return $personajes;
    }
}