/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import './styles/app.scss';

// start the Stimulus application
const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');


    document.getElementById('soundBtn').style.visibility='hidden';

    function performSound(){
    var soundButton = document.getElementById("soundBtn");
    soundButton.click();
}

    function playSound() {
    const audio = new Audio("/assets/sounds/exploration-wind.wav");
    audio.play();
}
