<body class="d-flex align-items-center py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-5 rm-title">Personajes de Rick y Morty</h1>
            <p class="lead">Explora los personajes del multiverso de Rick y Morty</p>
        </div>
        
        <div class="row g-4">
            <?php foreach ($personajes as $personaje): ?>
                <div class="col-lg-4 col-md-6 character-container">
                    <div class="character-card shadow">
                        <img 
                            src="<?= htmlspecialchars($personaje['imagen']) ?>" 
                            alt="<?= htmlspecialchars($personaje['nombre']) ?>" 
                            class="character-image"
                        >
                        <div class="character-info">
                            <h2 class="character-name"><?= htmlspecialchars($personaje['nombre']) ?></h2>
                            
                            <div class="character-detail">
                                Estado: <?= $personaje['estado_formateado'] ?>
                            </div>
                            
                            <div class="character-detail">
                                Especie: <?= htmlspecialchars($personaje['especie_formateada']) ?>
                            </div>
                            
                            <div class="character-detail">
                                Origen: <?= htmlspecialchars($personaje['origen']) ?>
                            </div>
                            
                            <div class="character-detail">
                                Ubicación: <?= htmlspecialchars($personaje['ubicacion']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>