import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
// Importation du fichier SCSS principal
import '../scss/azia.scss';

// Si tu as d'autres fichiers CSS à importer, fais-le ici
import '../styles/azia.css'; // Si nécessaire
import '../styles/azia.min.css'; // Autres fichiers CSS si nécessaire
import './styles/app.css';


// Tu peux également ajouter ici d'autres imports JavaScript, si besoin
// import './autre-fichier.js'; // Exemple




// Importation des fichiers JavaScript nécessaires
import './app-calendar-events.js';
import './app-calendar.js';
import './azia.js';
import './chart.chartjs.js';
import './chart.flot.js';
import './chart.flot.sampledata.js';
import './chart.morris.js';
import './chart.peity.js';
import './chart.sparkline.js';
import './cookie.js';
import './dashboard.sampledata.js';
import './jquery.vmap.sampledata.js';
import './map.apple.js';
import './map.bluewater.js';
import './map.mapbox.js';
import './map.shiftworker.js';


console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
