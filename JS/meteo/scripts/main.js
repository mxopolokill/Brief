import tabJoursEnOrdre from "./Utilitaire/gestionTemps.js";

// console.log("DEPUIS MAIN JS:" + tabJoursEnOrdre);

const CLEFAPI = "f27a5bb190ab16a25e5cfb703ccfd6ec";
let resultatsAPI;


const temps = document.querySelector(".temps");
const temperature = document.querySelector(".temperature");
const localisation = document.querySelector(".localisation");
const heure = document.querySelectorAll(".heure-nom-prevision");
const tempPourH = document.querySelectorAll(".heure-prevision-valeur");
const joursDiv = document.querySelectorAll(".jour-prevision-nom");
const tempJoursDiv = document.querySelectorAll(".jour-prevision-temp");
const imgIcone = document.querySelector(".logo-meteo");


//demande de géolocalisation 
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(
    (position) => {
      // console.log(position);
      let long = position.coords.longitude;
      let lat = position.coords.latitude;
      AppelAPI(long, lat);
    },
    () => {
      alert(
        `Vous avez refusé la géolocalisation, l'application ne peur pas fonctionner, veuillez l'activer.!`
      );
    }
  );
}
//APEL API
function AppelAPI(long, lat) {
  fetch(
    "https://api.openweathermap.org/data/2.5/onecall?lat=45.05&lon=-3.89&city-name=3002465&exclude=minutely&units=metric&lang=fr&appid=" +
      CLEFAPI
  )
    .then((reponse) => {
      return reponse.json();
    })
    .then((data) => {
      // console.log(data);

      resultatsAPI = data;
      // Résultat + COnfig Text Temperature et localisation 
      temps.innerText = resultatsAPI.current.weather[0].description;
      temperature.innerText = `${Math.trunc(resultatsAPI.current.temp)}°`;
      localisation.innerText = resultatsAPI.timezone;

      // les heures, par tranche de trois, avec leur temperature.

      let heureActuelle = new Date().getHours();

      for (let i = 0; i < heure.length; i++) {
        let heureIncr = heureActuelle + i * 3;

        if (heureIncr > 24) {
          heure[i].innerText = `${heureIncr - 24} h`;
        } else if (heureIncr === 24) {
          heure[i].innerText = "00 h";
        } else {
          heure[i].innerText = `${heureIncr} h`;
        }
      }
      console.log(resultatsAPI);
      // temp pour 3h
      tempPourH.forEach((temps) => {
        temps.innerHTML = `${
          Math.trunc(resultatsAPI.current.temp) 
        }°C`;
      });

      // trois premieres lettres des jours

      for (let k = 0; k < tabJoursEnOrdre.length; k++) {
        joursDiv[k].innerText = tabJoursEnOrdre[k].slice(0, 3);
      }

      // Temps par jour
      for (let m = 0; m < 7; m++) {
        tempJoursDiv[m].innerText = `${Math.trunc(
          resultatsAPI.daily[m + 1].temp.day
        )}°C`;
      }

      //  condition Icone dynamique via résultat API
      if (heureActuelle >= 6 && heureActuelle < 21) {
        imgIcone.src = `ressources/jour/${resultatsAPI.current.weather[0].icon}.svg`;
      } else {
        imgIcone.src = `ressources/nuit/${resultatsAPI.current.weather[0].icon}.svg`;
      }
    });
}
