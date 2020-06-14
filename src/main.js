function w3_open(){
  document.getElementById("mySidebar").style.width = "250px";
}
function w3_close(){
  document.getElementById("mySidebar").style.width = "0";
}


//validate the recipe entry
function showError(){
  var titlu = document.forms["regForm"]["titlu"];
  var descriere = document.forms["regForm"]["descriere"];
  var poza = document.forms["regForm"]["poza"];

  var titluErr = document.querySelector("#titlu + span.error");
  var descriereErr = document.querySelector("#descriere + span.error");
  var pozaErr = document.querySelector("#poza + span.error");



  if(titlu.value === ""){
    titluErr.textContent = "Enter your recipe title!";
    titlu.focus();
    return false;
  }else if (titlu.value.length < 3){
    titluErr.textContent = "Name not valid!";
    titlu.focus();
    return false;
  } else {
    titluErr.textContent = "";
  }

  if(descriere.value === ""){
    descriereErr.textContent = "Enter the description of the recipe!";
    descriere.focus();
    return false;
  }else{
    descriereErr.textContent = "";
  }

  if(poza.value === ""){
    pozaErr.textContent = "Insert a picture!";
    poza.focus();
    return false;
  }else{
    pozaErr.textContent = "";
  }

   return true;

}


//display current page

function activePage(evt){
  var i, talinks;

  tablinks = document.getElementsByClassName("tablink");
  for(i = 0; i < tablinks.length; i++){
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  evt.currentTarget.className += " active";
}
