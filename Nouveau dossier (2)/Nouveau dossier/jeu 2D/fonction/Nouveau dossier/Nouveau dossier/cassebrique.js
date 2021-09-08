/* Largeur et hauteur en fonction de la taille de la fenêtre */
var width = window.innerWidth*0.8; 
var height = window.innerHeight*0.80;

var posx = window.innerWidth*0.09;
var posy = window.innerHeight*0.10;


var game = new Board(posx,posy,width,height);

const sleep = (ms) => {
  return new Promise(resolve => setTimeout(resolve, ms))
}

function supprSound(id){
  game.supprSound(id);
}


function frame(){
  game.refresh();
  requestAnimationFrame(frame);
}

requestAnimationFrame(frame);


