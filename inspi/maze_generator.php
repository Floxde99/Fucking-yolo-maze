<?php
// Fonction pour générer automatiquement un labyrinthe
function generateMaze($width, $height) {
    // Initialiser le labyrinthe avec des murs partout
    $maze = [];
    for ($i = 0; $i < $height; $i++) {
        $row = [];
        for ($j = 0; $j < $width; $j++) {
            $row[] = 1; // Tout est mur initialement
        }
        $maze[] = $row;
    }
    
    // Algorithme de génération de labyrinthe (par exemple, DFS)
    $startRow = 1;
    $startCol = 1;
    
    // Marquer la cellule de départ
    $maze[$startRow][$startCol] = 0;
    
    // Appliquer l'algorithme DFS pour creuser des chemins
    carvePassagesFrom($startRow, $startCol, $maze);
    
    // S'assurer que les bordures sont des murs
    for ($i = 0; $i < $height; $i++) {
        $maze[$i][0] = 1;
        $maze[$i][$width - 1] = 1;
    }
    for ($j = 0; $j < $width; $j++) {
        $maze[0][$j] = 1;
        $maze[$height - 1][$j] = 1;
    }
    
    // Placer le chat et la souris
    $maze[$startRow][$startCol] = 2; // Chat
    
    // Trouver une position valide pour la souris (éloignée du chat)
    do {
        $mouseRow = rand(1, $height - 2);
        $mouseCol = rand(1, $width - 2);
    } while ($maze[$mouseRow][$mouseCol] != 0 || 
            (abs($mouseRow - $startRow) + abs($mouseCol - $startCol) < $width / 2));
    
    $maze[$mouseRow][$mouseCol] = 3; // Souris
    
    return $maze;
}

// Fonction récursive pour creuser des passages (DFS)
function carvePassagesFrom($row, $col, &$maze) {
    // Définir les directions : haut, droite, bas, gauche
    $directions = [
        [-2, 0], // haut
        [0, 2],  // droite
        [2, 0],  // bas
        [0, -2]  // gauche
    ];
    
    // Mélanger les directions pour avoir un labyrinthe aléatoire
    shuffle($directions);
    
    // Explorer chaque direction
    foreach ($directions as $dir) {
        $newRow = $row + $dir[0];
        $newCol = $col + $dir[1];
        
        // Vérifier si la nouvelle position est valide
        if ($newRow > 0 && $newRow < count($maze) - 1 && 
            $newCol > 0 && $newCol < count($maze[0]) - 1 && 
            $maze[$newRow][$newCol] == 1) {
            
            // Creuser un passage
            $maze[$newRow][$newCol] = 0;
            
            // Creuser aussi la cellule intermédiaire
            $maze[$row + $dir[0]/2][$col + $dir[1]/2] = 0;
            
            // Continuer à partir de la nouvelle position
            carvePassagesFrom($newRow, $newCol, $maze);
        }
    }
}

// Fonction pour générer plusieurs labyrinthes
function generateMazes($count) {
    $mazes = [];
    for ($i = 0; $i < $count; $i++) {
        $mazes[] = generateMaze(10, 10); // 10x10 est la taille de nos labyrinthes
    }
    return $mazes;
}
?>
