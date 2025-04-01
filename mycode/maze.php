<?php
session_start(); // Démarrer la session pour stocker les variables de jeu
// Vérifier si la session est déjà initialisée  
if (!isset($_SESSION["initialisation"])) {
  $_SESSION["currentLevel"] = rand(0, 4); // Niveau actuel
  $_SESSION["position"] = [1, 1]; // Position du joueur
  $_SESSION["gameOver"] = false; // État du jeu
  $_SESSION["message"] = ''; // Message d'état du jeu
}

$_SESSION["initialisation"] = true;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Assurez-vous que style.css est bien dans le même dossier -->
  <link rel="stylesheet" href="./style.css">
  <title>Labyrinthe Minier</title>
</head>

<body>
  <?php
  require_once './function.php'; // Inclure le fichier de fonctions si nécessaire
  // Définition des labyrinthes dans des variables séparées
  $labyrinthe1 = [
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 1],
    [1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1],
    [1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1],
    [1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1],
    [1, 0, 1, 1, 1, 0, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1],
    [1, 1, 1, 0, 1, 1, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1],
    [1, 0, 1, 1, 1, 1, 1, 1, 1, 2, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
  ];

  $labyrinthe2 = [
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 3, 0, 1, 0, 0, 0, 1, 0, 0, 1],
    [1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 1],
    [1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1],
    [1, 0, 0, 1, 0, 1, 1, 1, 1, 0, 1],
    [1, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 1, 1, 0, 1, 0, 1],
    [1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 1],
    [1, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1],
    [1, 0, 1, 0, 0, 0, 0, 1, 1, 0, 1],
    [1, 0, 0, 0, 1, 1, 0, 0, 0, 2, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
  ];

  $labyrinthe3 = [
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 1],
    [1, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1],
    [1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1],
    [1, 0, 1, 1, 1, 1, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1],
    [1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1],
    [1, 0, 1, 0, 1, 1, 1, 0, 1, 0, 1],
    [1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1],
    [1, 0, 1, 1, 1, 1, 1, 1, 1, 2, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
  ];

  $labyrinthe4 = [
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 3, 0, 1, 0, 0, 0, 1, 0, 0, 1],
    [1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 1],
    [1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 1],
    [1, 0, 1, 1, 0, 1, 1, 1, 1, 0, 1],
    [1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1],
    [1, 0, 1, 1, 1, 1, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1],
    [1, 1, 0, 1, 1, 0, 1, 1, 1, 0, 1],
    [1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1],
    [1, 0, 1, 0, 1, 1, 1, 0, 2, 0, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
  ];

  $labyrinthe5 = [
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 1],
    [1, 0, 1, 1, 1, 0, 1, 1, 1, 0, 1],
    [1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1],
    [1, 0, 1, 0, 1, 1, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1],
    [1, 0, 1, 1, 1, 0, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1],
    [1, 1, 1, 0, 1, 1, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1],
    [1, 0, 1, 1, 1, 1, 1, 1, 1, 2, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
  ];

  // Tableau regroupant tous les labyrinthes
  $labyrinthes = [$labyrinthe1, $labyrinthe2, $labyrinthe3, $labyrinthe4, $labyrinthe5];

  // Logique de jeu (par exemple, gestion des déplacements)
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération de la direction envoyée par le formulaire
    $direction = $_POST['direction'];

    // Récupération du niveau actuel et du labyrinthe depuis la session
    $current = $_SESSION['currentLevel'];
    // On récupère une copie locale du labyrinthe actuel
    $labyrinth = $_SESSION['labyrinthes'][$current];

    // Récupération de la position actuelle du joueur (format [x, y])
    $oldPosition = $_SESSION['position'];
    $newPosition = $oldPosition; // Initialisation de la nouvelle position avec l'ancienne

    // Calcul de la nouvelle position en fonction de la direction
    switch ($direction) {
        case 'up':
            $newPosition[1]--; // déplacement vers le haut
            break;
        case 'down':
            $newPosition[1]++; // déplacement vers le bas
            break;
        case 'left':
            $newPosition[0]--; // déplacement vers la gauche
            break;
        case 'right':
            $newPosition[0]++; // déplacement vers la droite
            break;
    }

    // Vérifier que la nouvelle case n'est pas un mur
    if ($labyrinth[$newPosition[1]][$newPosition[0]] !== 1) {
        // Mettre l'ancienne case à 0 (terre)
        $labyrinth[$oldPosition[1]][$oldPosition[0]] = 0;
        // Mettre la nouvelle case à 3 (joueur)
        $labyrinth[$newPosition[1]][$newPosition[0]] = 3;
        
        // Mettre à jour la position du joueur et le labyrinthe dans la session
        $_SESSION['position'] = $newPosition;
        $_SESSION['labyrinthes'][$current] = $labyrinth;
    }
}

  // Affichage du jeu
  echo '<h1>Labyrinthe Minier</h1>';
  echo '<div class="game-container">';
  echo '<div class="labyrinthe">';
  $current = $_SESSION["currentLevel"]; // Niveau actuel
  foreach ($labyrinthes[$current] as $ligne) { //modifier par currentLevel pour changer de labyrinthe
    foreach ($ligne as $case) {
      echo '<svg viewBox="0 0 200 200">';
      switch ($case) {
        case 0: // Chemin
          echo '
            <defs>
              <filter id="noiseFilter">
                <feTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3"/>
              </filter>
              <radialGradient id="grad">
                <stop offset="0%" stop-color="#5d3a1a"/>
                <stop offset="100%" stop-color="#3b240b"/>
              </radialGradient>
            </defs>
            <rect width="100%" height="100%" fill="url(#grad)"/>
            <rect width="100%" height="100%" filter="url(#noiseFilter)" opacity="0.5"/>';
          break;
        case 1: // Mur
          echo '
  <defs>
    <filter id="stoneTexture" x="0" y="0" width="1" height="1">
      <!-- Génère un bruit fractal pour imiter les irrégularités de la pierre -->
      <feTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="4" stitchTiles="stitch" result="noise"/>
      <!-- Applique un éclairage diffus pour donner du relief -->
      <feDiffuseLighting in="noise" lighting-color="white" surfaceScale="2" result="light">
        <feDistantLight azimuth="45" elevation="60"/>
      </feDiffuseLighting>
    </filter>
  </defs>
  <!-- Fond de pierre avec une couleur de base et le filtre appliqué -->
  <rect width="200" height="200" fill="#8B8C7A" filter="url(#stoneTexture)" />
';
          break;
        case 2: // Trésor
          echo '
            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200">
  <g fill="#FFD700" stroke="#DAA520" stroke-width="2">
    <!-- Pièces de monnaie -->
    <circle cx="100" cy="80" r="15"/>
    <circle cx="120" cy="100" r="15"/>
    <circle cx="80" cy="100" r="15"/>
    <circle cx="100" cy="120" r="15"/>
    <!-- Effet de superposition pour le tas -->
    <ellipse cx="100" cy="100" rx="25" ry="15"/>
  </g>
</svg>
';
          break;
        case 3: // Joueur
          echo '<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200">
  <g stroke="black" stroke-width="2" fill="center">
    <!-- Tête -->
    <circle cx="100" cy="50" r="20" fill="#FFDAB9"/>
    <!-- Casque -->
    <path d="M80,40 Q100,20 120,40" fill="#ccc"/>
    <!-- Corps -->
    <line x1="100" y1="70" x2="100" y2="120"/>
    <!-- Bras -->
    <line x1="100" y1="80" x2="70" y2="100"/>
    <line x1="100" y1="80" x2="130" y2="100"/>
    <!-- Jambes -->
    <line x1="100" y1="120" x2="80" y2="160"/>
    <line x1="100" y1="120" x2="120" y2="160"/>
    <!-- Pioche -->
    <line x1="130" y1="100" x2="160" y2="60" stroke="#555"/>
    <path d="M160,60 L170,50 L150,50 Z" fill="#555"/>
  </g>
</svg>
';
          break;
      }
      echo '</svg>';
    }
  }
  echo '</div>';

  // Affichage des contrôles directionnels
  echo '<div class="controls">';
  echo '<form method="POST">';
  echo '<button name="direction" value="up">';
  echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
  <!-- Corps de la flèche -->
  <polygon points="50,10 70,40 60,40 60,80 40,80 40,40 30,40" fill="#8B4513" stroke="#000" stroke-width="2"/>
  <!-- Détail style casque de mineur en haut -->
  <path d="M35,15 Q50,0 65,15 L65,25 Q50,10 35,25 Z" fill="#444" stroke="#000" stroke-width="2"/>
</svg>
';
  echo '</button>';
  echo '<button name="direction" value="left">';
  echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
  <!-- Corps de la flèche -->
  <polygon points="10,50 40,30 40,40 80,40 80,60 40,60 40,70" fill="#8B4513" stroke="#000" stroke-width="2"/>
  <!-- Détail style casque de mineur sur le côté gauche -->
  <path d="M15,35 Q0,50 15,65 L25,65 Q10,50 25,35 Z" fill="#444" stroke="#000" stroke-width="2"/>
</svg>
';
  echo '</button>';
  echo '<button name="direction" value="down">';
  echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
  <!-- Corps de la flèche -->
  <polygon points="50,90 70,60 60,60 60,20 40,20 40,60 30,60" fill="#8B4513" stroke="#000" stroke-width="2"/>
  <!-- Détail style casque de mineur en bas -->
  <path d="M35,85 Q50,100 65,85 L65,75 Q50,90 35,75 Z" fill="#444" stroke="#000" stroke-width="2"/>
</svg>
';
  echo '</button>';
  echo '<button name="direction" value="right">';
  echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
  <!-- Corps de la flèche -->
  <polygon points="90,50 60,30 60,40 20,40 20,60 60,60 60,70" fill="#8B4513" stroke="#000" stroke-width="2"/>
  <!-- Détail style casque de mineur sur le côté droit -->
  <path d="M85,35 Q100,50 85,65 L75,65 Q90,50 75,35 Z" fill="#444" stroke="#000" stroke-width="2"/>
</svg>
';
  echo '</button>';
  echo '</form>';
  echo '</div>';
  echo '</div>'; // Fin de .game-container
  ?>
</body>

</html>