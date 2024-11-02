// import './bootstrap.js';
// /*
//  * Welcome to your app's main JavaScript file!
//  *
//  * This file will be included onto the page via the importmap() Twig function,
//  * which should already be in your base.html.twig.
//  */
// // Importation du fichier SCSS principal
// import '../scss/azia.scss';

// // Si tu as d'autres fichiers CSS à importer, fais-le ici
// import '../styles/azia.css'; // Si nécessaire
 import './styles/dashboard.css'; // Autres fichiers CSS si nécessaire
// import './styles/app.css';


// Tu peux également ajouter ici d'autres imports JavaScript, si besoin
// import './autre-fichier.js'; // Exemple




// Importation des fichiers JavaScript nécessaires
// import './app-calendar-events.js';
// import './app-calendar.js';
// import './azia.js';
// import './chart.chartjs.js';
// import './chart.flot.js';
// import './chart.flot.sampledata.js';
// import './chart.morris.js';
// import './chart.peity.js';
// import './chart.sparkline.js';
// import './cookie.js';
// import './dashboard.sampledata.js';
// import './jquery.vmap.sampledata.js';
// import './map.apple.js';
// import './map.bluewater.js';
// import './map.mapbox.js';
// import './map.shiftworker.js';
// Importation des images
import aiAssistant from './img/ai-assistant.png';
import five from './img/five.jpg';
import nine from './img/nine.jpg';
import six from './img/six.jpg';
import two from './img/two.jpg';
import eight from './img/eight.jpg';
import four from './img/four.jpg';
import one from './img/one.jpg';
import ten from './img/ten.jpg';
import visa from './img/visa.png';
import mastercard from './img/mastercard.png';
import seven from './img/seven.jpg';
import three from './img/three.jpg';


// Vérification des imports
console.log('Imported images:', {
  aiAssistant,
  five,
  nine,
  six,
  two,
  eight,
  four,
  one,
  ten,
  visa,
  mastercard,
  seven,
  three
});

// Exemple d'utilisation des images (ajoutez ce code selon vos besoins)
// Pour afficher une image dans le DOM
const imgElement = document.createElement('img');
imgElement.src = aiAssistant; // Changez ceci pour afficher une autre image si besoin
document.body.appendChild(imgElement);
