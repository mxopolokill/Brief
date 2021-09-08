// TODO : code js
var accordion = document.getElementsByClassName("course-accordion");
var i;
//boucle For
for (i = 0; i < accordion.length; i++) {
  //création d'un event  fonction au click
  accordion[i].addEventListener("click", function () {
      //rend les class active  faisant le spawn block
    this.classList.toggle("active"); 
    //
    var prout    = this.nextElementSibling;
    //modification de la dimension de la taille du block //
    if (prout.style.maxHeight) {//si la taille et null //
      prout.style.maxHeight = null;
    } else {
       //sinon cela ce redimensionneras vias les valeur défini in CSS//
        prout.style.maxHeight = prout.scrollHeight + "px";
    }
  });
}
