<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo); ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="./logo-rickymorty.png">
    <style>
        body {
            background-color: #0a0e17;
            color: white;
            min-height: 100vh;
        }
        
        .character-container {
            position: relative;
        }
        
        .character-card {
            border-radius: 10px;
            background-color: rgba(20, 30, 48, 0.8);
            transition: transform 0.3s;
            overflow: hidden;
            height: 100%;
        }
        
        .character-card:hover {
            transform: scale(1.03);
        }
        
        .character-image {
            width: 100%;
        }
        
        .rm-title {
            font-weight: 700;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }
        
        .character-info {
            padding: 1.5rem;
            text-align: left;
        }
        
        .character-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #62ff00;
        }
        
        .character-detail {
            color: #adb5bd;
            margin-bottom: 0.5rem;
        }
    </style>
</head>