//   $position = [0, 0];
//   $direction = '';
//   $gameOver = false;
//   $message = '';
//   echo '<h1>maze</h1>';
//   echo '<p>Bienvenue dans le jeu !</p>';
//   echo '<p>Voici la grille :</p>';
//   echo '<div class="labyrinthe">';
//   $grille = $labyrinthe2;
//   foreach ($grille as $ligne) {
//     foreach ($ligne as $case) {
//       switch ($case) {
//         case 0:
//           echo '<svg width="200" height="200" xmlns="http://www.w3.org/2000/svg">
//   <defs>
//     <filter id="noiseFilter">
//       <feTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" result="noise"/>
//       <feColorMatrix type="matrix" values="
//         0.6 0 0 0 0
//         0 0.4 0 0 0
//         0 0 0.2 0 0
//         0 0 0 1 0"/>
//     </filter>
//     <radialGradient id="grad" cx="50%" cy="50%" r="50%">
//       <stop offset="0%" stop-color="#5d3a1a"/>
//       <stop offset="100%" stop-color="#3b240b"/>
//     </radialGradient>
//   </defs>
//   <rect width="100%" height="100%" fill="url(#grad)"/>
//   <rect width="100%" height="100%" filter="url(#noiseFilter)" opacity="0.5"/>
// </svg>';
//           break;
//         case 1:
//           echo '<svg width="200" height="200" xmlns="http://www.w3.org/2000/svg">
//   <defs>
//     <pattern id="stonePattern" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse">
//       <rect width="100" height="100" fill="#b0a99f" />
//       <path d="M 20 10 L 50 30 L 70 10 L 90 40 L 60 70 L 30 50 Z" fill="#9b9287" stroke="#706b64" stroke-width="2" />
//       <path d="M 10 80 L 40 90 L 70 85 L 95 95 L 80 70 L 50 60 Z" fill="#8c8379" stroke="#706b64" stroke-width="2" />
//       <path d="M 10 10 L 30 20 L 25 40 L 5 35 Z" fill="#a79e93" stroke="#706b64" stroke-width="2" />
//     </pattern>
//   </defs>
//   <rect width="100%" height="100%" fill="url(#stonePattern)" />
// </svg>
// ';
//           break;
//         case 2:
//           echo '<svg
//     viewBox="0 0 200 200"
//     width="200" height="200"
//     xmlns="http://www.w3.org/2000/svg"
//     xmlns:xlink="http://www.w3.org/1999/xlink"
// >
//     <!-- Coffre -->
//     <rect x="30" y="70" width="140" height="80" fill="#8B4513" stroke="#663300" stroke-width="4"/>
//     <rect x="40" y="80" width="120" height="60" fill="#A0522D" stroke="#663300" stroke-width="3"/>
//     <rect x="80" y="80" width="40" height="60" fill="#8B4513" stroke="#663300" stroke-width="3"/>
    
//     <!-- Couvercle -->
//     <path d="M30,70 Q100,10 170,70" fill="#A0522D" stroke="#663300" stroke-width="4"/>
    
//     <!-- Or -->
//     <circle cx="50" cy="90" r="8" fill="gold" stroke="orange" stroke-width="2"/>
//     <circle cx="60" cy="95" r="7" fill="gold" stroke="orange" stroke-width="2"/>
//     <circle cx="70" cy="90" r="9" fill="gold" stroke="orange" stroke-width="2"/>
//     <circle cx="90" cy="95" r="6" fill="gold" stroke="orange" stroke-width="2"/>
//     <circle cx="110" cy="90" r="8" fill="gold" stroke="orange" stroke-width="2"/>
//     <circle cx="130" cy="95" r="7" fill="gold" stroke="orange" stroke-width="2"/>
//     <circle cx="140" cy="90" r="9" fill="gold" stroke="orange" stroke-width="2"/>
// </svg>';
//           break;
//         case 3:
//           echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"
//     width="200" height="200">
//   <!-- Fond de terre -->
//   <rect width="300" height="300" fill="#8B4513" />
  
//   <!-- Groupe pour le mineur -->
//   <g id="miner" transform="translate(150,180)">
//     <!-- Tête -->
//     <circle cx="0" cy="-40" r="30" fill="#FFDAB9" />
    
//     <!-- Casque (avec une touche stylée) -->
//     <path d="M -40 -50 Q 0 -80 40 -50 L 40 -30 Q 0 -60 -40 -30 Z" fill="#444" />
    
//     <!-- Lunettes stylées -->
//     <rect x="-20" y="-50" width="15" height="10" fill="#000" rx="2" />
//     <rect x="5" y="-50" width="15" height="10" fill="#000" rx="2" />
//     <line x1="-5" y1="-45" x2="5" y2="-45" stroke="#000" stroke-width="2" />
    
//     <!-- Corps -->
//     <rect x="-15" y="-10" width="30" height="40" fill="#4682B4" rx="5" />
    
//     <!-- Bras droit (tenant une pioche) -->
//     <g id="bras-droite">
//       <!-- Bras -->
//       <rect x="15" y="-5" width="10" height="30" fill="#FFDAB9" rx="3" />
//       <!-- Pioche -->
//       <line x1="25" y1="25" x2="65" y2="65" stroke="#696969" stroke-width="4" stroke-linecap="round" />
//       <rect x="60" y="60" width="10" height="10" fill="#A9A9A9" />
//     </g>
    
//     <!-- Bras gauche -->
//     <rect x="-25" y="-5" width="10" height="30" fill="#FFDAB9" rx="3" />
//   </g>
// </svg>
// ';
//           break;
//       }
//     }
//     echo "\n";
//   }
//   echo '</div>';
//   echo '<p>Utilisez les flèches pour vous déplacer.</p>';
//   echo '<form method="POST">';
//   echo '<input type="hidden" name="up""><label for="up"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
//   <!-- Corps de la flèche -->
//   <polygon points="50,10 70,40 60,40 60,80 40,80 40,40 30,40" fill="#8B4513" stroke="#000" stroke-width="2"/>
//   <!-- Détail style casque de mineur en haut -->
//   <path d="M35,15 Q50,0 65,15 L65,25 Q50,10 35,25 Z" fill="#444" stroke="#000" stroke-width="2"/>
// </svg>
// </label>';
//   echo '<input type="hidden" name="down"><label for="down"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
//   <!-- Corps de la flèche -->
//   <polygon points="50,90 70,60 60,60 60,20 40,20 40,60 30,60" fill="#8B4513" stroke="#000" stroke-width="2"/>
//   <!-- Détail style casque de mineur en bas -->
//   <path d="M35,85 Q50,100 65,85 L65,75 Q50,90 35,75 Z" fill="#444" stroke="#000" stroke-width="2"/>
// </svg>
// </label>';
//   echo '<input type="hidden" name="left" "><label for="left"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
//   <!-- Corps de la flèche -->
//   <polygon points="10,50 40,30 40,40 80,40 80,60 40,60 40,70" fill="#8B4513" stroke="#000" stroke-width="2"/>
//   <!-- Détail style casque de mineur sur le côté gauche -->
//   <path d="M15,35 Q0,50 15,65 L25,65 Q10,50 25,35 Z" fill="#444" stroke="#000" stroke-width="2"/>
// </svg>
// </label>';
//   echo '<input type="hidden" name="right" "><label for="right"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
//   <!-- Corps de la flèche -->
//   <polygon points="90,50 60,30 60,40 20,40 20,60 60,60 60,70" fill="#8B4513" stroke="#000" stroke-width="2"/>
//   <!-- Détail style casque de mineur sur le côté droit -->
//   <path d="M85,35 Q100,50 85,65 L75,65 Q90,50 75,35 Z" fill="#444" stroke="#000" stroke-width="2"/>
// </svg></label>';
//   echo '</form>';

//   ?>
// </body>

// </html>