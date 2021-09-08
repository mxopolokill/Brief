let canvas = document.getElementById('canvas');
let carre= canvas.getContext('2d');
let rond = canvas.getContext('2d');

carre.fillStyle = 'rgb(255, 140, 118)';
carre.fillRect (20, 30, 50, 50);
rond.beginPath();
rond.fillStyle = 'blue';
rond.arc (120, 170, 78, 6, 14 * Math.PI );
rond.stroke();
