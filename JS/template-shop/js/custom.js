let urlcourante = document.location.href;
let url = new URL(urlcourante);
let search_param = new URLSearchParams(url.search);

//fonction Selecte page a la main 
if (search_param.has('theme')){

    let name=search_param.get('theme');

    if(name=="2"){
        CTheme();
        console.log("Theme 2");
    }
    else{
        console.log("Theme 1");
    }
};

//création du fameux boutton 
let button = document.querySelector('.header-logo');
button.insertAdjacentHTML('afterend', '<a id="btn-theme" href="' + url.pathname + '?theme=2">/theme2</a>');
button.insertAdjacentHTML('afterend', '<a id="btn-theme" href="' + url.pathname + '?theme=1">/theme1</a>');
console.log(url);
function CTheme(){
//modification du logo Porto
const logo = document.querySelector(".header-logo  img");

if(logo && logo.style) {
    logo.src = './img/logo-default.png';
};

//création var changement images produits
let mainimg = document.querySelector("div.owl-carousel div:nth-child(1n) img")
let secondimg = document.querySelector("div.owl-carousel div:nth-child(2) img")
let thirdimg = document.querySelector("div.owl-carousel div:nth-child(3) img")

//changement d'images carousel
mainimg.src = "./img/sac3.jpg";
secondimg.src = "./img/sac2.jpg"; 
thirdimg.src = "./img/sac3.jpg";

//suppression div categorie 
document.querySelector('div.main > div.container > div.row > div.col-lg-3').style.display="none";
//modification classe
document.querySelector('div.main > div.container > div.row > div.col-lg-9').className="col-lg-12";



// récupération des information
let dome = document.querySelector('div.main > div.container > div.row > div.col-lg-12 > div.row > .col-lg-6:nth-child(2) div.summary');

let form = document.querySelector('form.cart');
let cat = document.querySelector('div.product-meta');
//inverser l'ordre des 2 blocs
dome.insertBefore(cat, form);
//modifcation style des blocs 
form.style.marginTop="50px"; 
form.style.display="flex";
form.style.flexDirection="column";
form.style.alignItems="center";
form.style.marginLeft="50px";



//placement bouton 
let marge = document.querySelector("div.quantity.quantity-lg");

marge.style.marginLeft= "13px";


//selection zone images 
let img1 = document.querySelector('.masonry-loader > .row > .product:nth-child(1) > span > a:nth-child(2) > span > img');
img1.src ="./img/camera.jpg";

let img2 = document.querySelector('.masonry-loader > .row > .product:nth-child(2) > span > a:nth-child(2) > span > img');
img2.src ="./img/golfbag.jpg";

let img3 = document.querySelector('.masonry-loader > .row > .product:nth-child(3) > span > a:nth-child(2) > span > img');
img3.src ="./img/chaussure.jpg";

let img4 = document.querySelector('.masonry-loader > .row > .product:nth-child(4) > span > a:nth-child(2) > span > img');
img4.src ="./img/bagluxe.jpg";

//modification bordure Bouton footer 
document.querySelector('form#newsletterForm > div.input-group > span > button.btn').style.borderRadius="0px";
};