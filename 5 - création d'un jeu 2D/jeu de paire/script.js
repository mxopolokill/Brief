/////////////////
var images = [];//tableau image////
var images=[1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8];
////////////////

initialiseJeu();
console.log(images);
function initialiseJeu(){
	for(var position=images.length-1; position>=1; position--){
		var hasard=Math.floor(Math.random()*(position+1));
		var sauve=images[position];
		images[position]=images[hasard];
		images[hasard]=sauve;
	}
}
/////////////////////////////////////////////////////////////////::
var ajout = "<tr>"; //ajout de ma balise tr en html 
  for (var i = 0; i < 16; i++) {  
      ajout += "<td>";//ajout de ma balise td en html 
      ajout += "<img src = './img/" + images[i] + ".jpg'/>";//ajout de mon image dans mon td
      ajout += "</td>";//fermeture mon mon tr ou mon image et présente
  }
ajout += "</tr>";//fermeture de mon tr en html 
document.getElementById("blockcard").innerHTML = ajout;//ajout des élment HTML réferencer dans ma variable ajout
document.getElementsByName("img").visibility='hidden';



