//Largeur et hauteur en fonction de la taille de la fenêtre //
var width = window.innerWidth*0.8; //largeur de fenetre//
var height = window.innerHeight*0.80;//ongueur de fenetre//
//en fonction de la taille de la fenetre le jeu ce repositionnera//
var posx = window.innerWidth*0.09; //repositionnement en largeur//
var posy = window.innerHeight*0.10;//repositionnelent en longueur//


var game = new Board(posx,posy,width,height); //récupération des valeurs d'ajustement longueur largeur//

const sleep = (ms) => {
  return new Promise(resolve => setTimeout(resolve, ms))//si inactif le jeu serra mis en pause//
}

function supprSound(id){
  game.supprSound(id);//la fonction pour desactiver le son du jeu//
}


function frame(){
  game.refresh();
  requestAnimationFrame(frame);//animer les choses maintenant ou délais//
}

requestAnimationFrame(frame);