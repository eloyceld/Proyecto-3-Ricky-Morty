<?php
class API {
    const API_URL = "https://whenisthenextmcufilm.com/api";

    public function obtenerPelicula() {
        $data = @file_get_contents(self::API_URL);
        
        if ($data === false) {
            // Datos de ejemplo si no se puede acceder a la API
            return [
                'title' => 'Daredevil: Born Again',
                'days_until' => 30,
                'release_date' => '2025-03-04',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BNGZlMjIyNGUtMjNkMS00ZDIyLThkZWMtMDliNzMyMDhmYTVjXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_.jpg',
                'overview' => 'Marvel Studios\' Daredevil: Born Again, an Original series, streaming March 2025 on Disney+.',
                'following_production' => [
                    'title' => 'Desconocido',
                    'poster_url' => null,
                    'release_date' => null,
                    'days_until' => null
                ]
            ];
        }
        
        return json_decode($data, true);
    }
}

class Peliculas {
    private $pelicula;

    public function __construct($pelicula) {
        $this->pelicula = $pelicula;
    }

    public function obtenerMensajeEstreno($dias) {
        return match (true) {
            $dias === 0     => "¡Hoy se estrena!",
            $dias === 1     => "Mañana se estrena",
            $dias < 7       => "Esta semana se estrena",
            $dias < 30      => "Este mes se estrena",
            default         => "$dias días hasta el estreno",
        };
    }

    public function formatearFecha($fecha) {
        return date('d/m/Y', strtotime($fecha));
    }

    public function mostrarPeliculas() {
        $pelicula = $this->pelicula;
        $siguientePelicula = $pelicula['following_production'] ?? null;
        
        echo '<div class="container mt-5">';
        echo '<h1 class="text-center text-general">¿Cuándo es la próxima película de Marvel?</h1><br>';
        
        // Primera película
        echo '<div class="row justify-content-center">';
        echo '<div class="col-md-6 mb-4 text-center">';
        echo '<div class="card bg-dark text-white">';
        echo '<img src="' . $pelicula['poster_url'] . '" class="card-img-top" alt="' . $pelicula['title'] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $pelicula['title'] . ' - ' . $this->obtenerMensajeEstreno($pelicula['days_until']) . '</h5>';
        echo '<p class="card-text">Fecha de estreno: ' . $this->formatearFecha($pelicula['release_date']) . '</p>';
        echo '<p class="card-text">La siguiente es: ' . $siguientePelicula['title'] . '</p>';
        echo '</div>';
        echo '</div></div>';
        
        // Segunda película (si existe)
        if (!empty($siguientePelicula['poster_url'])) {
            echo '<div class="col-md-6 mb-4 text-center">';
            echo '<h2 class="text-general mb-3">¿Y la siguiente?</h2>';
            echo '<div class="card bg-dark text-white">';
            echo '<img src="' . $siguientePelicula['poster_url'] . '" class="card-img-top" alt="' . $siguientePelicula['title'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $siguientePelicula['title'] . ' - ' . $this->obtenerMensajeEstreno($siguientePelicula['days_until']) . '</h5>';
            echo '<p class="card-text">Fecha de estreno: ' . $this->formatearFecha($siguientePelicula['release_date']) . '</p>';
            echo '</div>';
            echo '</div></div>';
        }
        
        echo '</div>';
        echo '</div>';
    }
}
?>