<?php
session_start();

// Définition des labyrinthes (sans marqueur joueur – uniquement murs, chemins et trésor)
  $labyrinthes = [
    [
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1],
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
  ],
  [
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1],
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
  ],[
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1],
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
],[
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1],
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
],[
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1],
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
  ]
];

// Initialisation de la session ou réinitialisation en cas de redémarrage
if (isset($_POST['restart'])) {
    session_unset();
    $_SESSION['currentLevel'] = rand(0, count($labyrinthes) - 1);
    $_SESSION['position'] = [1, 1]; // Toujours [1,1] au départ
    $_SESSION['gameOver'] = false;
    $_SESSION['message'] = '';
    $_SESSION['visibleCells'] = [];
    $_SESSION['initialized'] = true;
} elseif (!isset($_SESSION['initialized'])) {
    $_SESSION['currentLevel'] = rand(0, count($labyrinthes) - 1);
    $_SESSION['position'] = [1, 1];
    $_SESSION['gameOver'] = false;
    $_SESSION['message'] = '';
    $_SESSION['visibleCells'] = [];
    $_SESSION['initialized'] = true;
}

// Gestion des déplacements
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$_SESSION['gameOver'] && isset($_POST['direction'])) {
    $newPos = $_SESSION['position'];
    switch($_POST['direction']) {
        case 'up':    $newPos[0]--; break;
        case 'down':  $newPos[0]++; break;
        case 'left':  $newPos[1]--; break;
        case 'right': $newPos[1]++; break;
    }
    // Validation du mouvement
    if ($newPos[0] >= 0 && $newPos[0] < 12 && $newPos[1] >= 0 && $newPos[1] < 11) {
        $targetCell = $labyrinthes[$_SESSION['currentLevel']][$newPos[0]][$newPos[1]];
        // Autoriser le déplacement sur un chemin (0) ou sur le trésor (2)
        if ($targetCell === 0 || $targetCell === 2) {
            $_SESSION['position'] = $newPos;
            $_SESSION['visibleCells'] = [];
            if ($targetCell === 2) { // Trésor trouvé
                $_SESSION['gameOver'] = true;
                $_SESSION['message'] = "Félicitations ! Vous avez trouvé le trésor !";
            }
        }
    }
}

// Calcul du brouillard de guerre : seule la case du joueur et les 4 cases adjacentes sont visibles
$playerRow = $_SESSION['position'][0];
$playerCol = $_SESSION['position'][1];
$_SESSION['visibleCells'] = [];
$adjacentPositions = [
    [$playerRow, $playerCol],        // Position du joueur
    [$playerRow - 1, $playerCol],      // Haut
    [$playerRow + 1, $playerCol],      // Bas
    [$playerRow, $playerCol - 1],      // Gauche
    [$playerRow, $playerCol + 1]       // Droite
];
foreach ($adjacentPositions as $pos) {
    if ($pos[0] >= 0 && $pos[0] < 12 && $pos[1] >= 0 && $pos[1] < 11) {
        $_SESSION['visibleCells'][] = $pos[0] . '-' . $pos[1];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <title>Labyrinthe Minier</title>
</head>
<body>
<video autoplay muted loop id="background-video">
    <source src="./img/fondmove.mp4" type="video/mp4">
    Votre navigateur ne supporte pas les vidéos HTML5.
</video>

  <?php if ($_SESSION['gameOver']): ?>
      <div class="message"><?= $_SESSION['message'] ?></div>
  <?php endif; ?>

  <h1>Labyrinthe Minier</h1>
  <!-- Affichage du numéro de niveau (en ajoutant 1 pour avoir une numérotation humaine) -->
  <div class="level">Niveau : <?= $_SESSION['currentLevel'] + 1 ?></div>
  
  <div class="game-container">
    <div class="labyrinthe">
      <?php
      $currentMaze = $labyrinthes[$_SESSION['currentLevel']];
      for ($i = 0; $i < count($currentMaze); $i++) {
          for ($j = 0; $j < count($currentMaze[$i]); $j++) {
              $isVisible = in_array("$i-$j", $_SESSION['visibleCells']);
              echo '<svg viewBox="0 0 200 200">';
              if ($isVisible) {
                  // Si c'est la case du joueur, afficher le mineur
                  if ($i === $_SESSION['position'][0] && $j === $_SESSION['position'][1]) {
                      echo '
                        <g stroke="black" stroke-width="2">
                          <circle cx="100" cy="50" r="20" fill="#FFDAB9"/>
                          <path d="M80,40 Q100,20 120,40" fill="#ccc"/>
                          <line x1="100" y1="70" x2="100" y2="120"/>
                          <line x1="100" y1="80" x2="70" y2="100"/>
                          <line x1="100" y1="80" x2="130" y2="100"/>
                          <line x1="100" y1="120" x2="80" y2="160"/>
                          <line x1="100" y1="120" x2="120" y2="160"/>
                          <line x1="130" y1="100" x2="160" y2="60" stroke="#555"/>
                          <path d="M160,60 L170,50 L150,50 Z" fill="#555"/>
                        </g>';
                  } else {
                      // Affichage du décor en fonction de la case
                      switch ($currentMaze[$i][$j]) {
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
                                    <feTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="4" stitchTiles="stitch" result="noise"/>
                                    <feDiffuseLighting in="noise" lighting-color="white" surfaceScale="2" result="light">
                                      <feDistantLight azimuth="45" elevation="60"/>
                                    </feDiffuseLighting>
                                  </filter>
                                </defs>
                                <rect width="100%" height="100%" fill="#8B8C7A" filter="url(#stoneTexture)" />';
                              break;
                          case 2: // Trésor
                              echo '
                                <g fill="#FFD700" stroke="#DAA520" stroke-width="2">
                                  <circle cx="100" cy="80" r="15"/>
                                  <circle cx="120" cy="100" r="15"/>
                                  <circle cx="80" cy="100" r="15"/>
                                  <circle cx="100" cy="120" r="15"/>
                                  <ellipse cx="100" cy="100" rx="25" ry="15"/>
                                </g>';
                              break;
                      }
                  }
              } else {
                  // Case non visible (brouillard)
                  echo '<svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <radialGradient id="cloudGrad" cx="50%" cy="50%" r="50%">
      <stop offset="0%" stop-color="#fff" stop-opacity="1"/>
      <stop offset="100%" stop-color="#ccc" stop-opacity="0.8"/>
    </radialGradient>
  </defs>
  <g fill="url(#cloudGrad)">
    <ellipse cx="40" cy="60" rx="20" ry="15"/>
    <ellipse cx="60" cy="50" rx="25" ry="20"/>
    <ellipse cx="80" cy="60" rx="20" ry="15"/>
  </g>
</svg>
';
              }
              echo '</svg>';
          }
      }
      ?>
    </div>

    <!-- Contrôles de déplacement -->
    <div class="controls">
      <form method="POST">
        <button name="direction" value="up">
          <svg viewBox="0 0 100 100">
            <polygon points="50,10 70,40 60,40 60,80 40,80 40,40 30,40" fill="#8B4513" stroke="#000" stroke-width="2"/>
            <path d="M35,15 Q50,0 65,15 L65,25 Q50,10 35,25 Z" fill="#444" stroke="#000" stroke-width="2"/>
          </svg>
        </button>
        <button name="direction" value="left">
          <svg viewBox="0 0 100 100">
            <polygon points="10,50 40,30 40,40 80,40 80,60 40,60 40,70" fill="#8B4513" stroke="#000" stroke-width="2"/>
            <path d="M15,35 Q0,50 15,65 L25,65 Q10,50 25,35 Z" fill="#444" stroke="#000" stroke-width="2"/>
          </svg>
        </button>
        <button name="direction" value="down">
          <svg viewBox="0 0 100 100">
            <polygon points="50,90 70,60 60,60 60,20 40,20 40,60 30,60" fill="#8B4513" stroke="#000" stroke-width="2"/>
            <path d="M35,85 Q50,100 65,85 L65,75 Q50,90 35,75 Z" fill="#444" stroke="#000" stroke-width="2"/>
          </svg>
        </button>
        <button name="direction" value="right">
          <svg viewBox="0 0 100 100">
            <polygon points="90,50 60,30 60,40 20,40 20,60 60,60 60,70" fill="#8B4513" stroke="#000" stroke-width="2"/>
            <path d="M85,35 Q100,50 85,65 L75,65 Q90,50 75,35 Z" fill="#444" stroke="#000" stroke-width="2"/>
          </svg>
        </button>
        <button type="submit" name="restart" class="restart">Recommencer</button>
      </form>
    </div>
  </div>
</body>
</html>
