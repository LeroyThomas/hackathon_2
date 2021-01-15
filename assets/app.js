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

// Timer start
const startingMinutes = 0.3;
let time = startingMinutes * 60;

const countdownEl = document.getElementById('timer');

    let x = setInterval(updateCountdown, 1000);

    function updateCountdown() {
        const minutes = Math.floor(time / 60);
        let seconds = time % 60;

        seconds = seconds < 10 ? '0' + seconds : seconds;
        countdownEl.innerHTML = `${minutes}: ${seconds}`;
        time--;

        if (minutes <= 0 && seconds <= 0) {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "<span style='color: red'>Too late !</span>";
            document.location.href="http://127.0.0.1:8000/result"
        }
    }
//Timer End