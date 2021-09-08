const STICKY_TIME = 500;//délais sticky bonus
const ENLARGE_TIME = 500;//délais doublement bonus
const MISSILE_TIME = 500;//délais missile bonus

class Bonus {
  constructor(type, posx, posy) {
    this.type = type;
    this.posy = posy;

    this.gameboard = gameboard;
    this.sizey = size; //Le diamètre du bonus est égal à
    //La taille verticale d'une brique

    this.speed = 3; //Constante de vitesse
    this.display();

    // Temps de chaque bonus //
    //fonction temps bonnus Collant//
    if (this.type == "sticky") {
      this.sizex = size;
      this.time = STICKY_TIME;
    }
    //fonction temps bonnus doublement//
    if (this.type == "enlarge") {
      this.sizex = size * 2;
      this.time = ENLARGE_TIME;
    }
    //fonction temps bonnus missile//
    if (this.type == "missile") {
      this.sizex = size;
      this.time = MISSILE_TIME;
    }
    //fonction  effet pallette//
    if (this.type == "Pellet") {
      this.sizex = size;
    }
    this.posx = posx - this.sizex / 2;
  }
}
