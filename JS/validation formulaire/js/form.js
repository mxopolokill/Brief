const Name = document.getElementById("name");
const phone = document.getElementById("phone");
const form = document.getElementById("signup-form");
const mail = document.getElementById("email");
let error = true;

const Erreur = "red";
const valider = "green";

//création évenement
w
  e.preventDefault();

  //validation élement name
  if (Name.value === "" || Name.value == null || Name.value.length > 50) {
   
    const erreurName = document.createElement("span");
    erreurName.textContent = "Ta une calvace sans nom";
    Name.parentElement.appendChild(erreurName);
    ErrorName.style.padding = "5px 0 5px 20px";
    errorName.style.fontSize = "12px";

    errorName.innerHTML = errorNameText;
    errorName.style.display="block";
    error = true;
   
  }else {
    Name.style.border = `1px solid ${valider}`;
    errorName.style.display = "none";
    spanCharRest.style.bottom = "0px";
    error = false;
}


  console.log(Name.value);
  //validation élement Mail
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value)) {
    if (mail.value != document.getElementById("email").value)
      document.querySelector("form > div.form-group").style.border = "1px red";
      const erreurMail = document.createElement("span");
      erreurName.textContent = "Ta une calvace sans Mail";
      mail.parentElement.appendChild(erreurMail);
      errorMail.style.display="block";
    
  } else {
    mail.style.border = `1px solid ${valider}`;
    errorName.style.display = "none";
    spanCharRest.style.bottom = "0px";
    error = false;
}

  //validation élement Phone

  if (phone.value === "" || phone.value == null || phone.value.length != 10) {
    document.querySelector("form > div.form-group").style.border = "1px red";
    const erreurPhone = document.createElement("span");
      erreurPhone.textContent = "Ta une calvace sans phone";
      phone.parentElement.appendChild(erreurPhone);
      errorPhone.style.display="block";
    phone.focus();
    return false;
  }
  else { 
    phone.value.indexOf(06) && phone.value.indexOf(07)
    phone.style.border = `1px solid ${valider}`;
    errorName.style.display = "block";
    spanCharRest.style.bottom = "0px";
    error = True;
}

  
});

//Validation Formulaire aprés submit
submitButton.addEventListener("click", (e) => {
  if (NameValidation() || emailValidation() || phoneValidation()) {
      Name();
      email();
      phone();
      e.preventDefault();
  }
});
NameValidation();
emailValidation();
phoneValidation();
