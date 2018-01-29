
//global variables
var entriesContainer = document.getElementById("entries_container");
var loadBtn = document.getElementById("loading_button");
var submitBtn = document.getElementById("submit");
var completeForm = document.getElementById("form");
var formTextfield = document.forms["form"]["textfield"];
var formTextarea = document.forms["form"]["textarea"];
var btnCounter = 1;


//add all Listeners
loadBtn.addEventListener("click", getEntries);
submitBtn.addEventListener("click", submitForm);


// execute always once
getEntries();
zenscroll.setup(null, 52);


//on click functions
function submitForm(){
  if (validateForm()) {
    postForm();
  }
}

function getEntries(){
  var request  = new XMLHttpRequest();
  request.open('GET', '/api/entries/get/'+ btnCounter);
  request.onload = function(){
    if(request.status == 200){
      var data = JSON.parse(request.responseText);
      createHTML(data);
      btnCounter++;
    } else {
      console.log("Error");
    }
  };
  request.send();
}


//other functions
function validateForm(){
  if (formTextfield.value == "" && formTextarea.value == "") {
    document.getElementById("textfield_error").innerHTML = " Insert name!";
    document.getElementById("textarea_error").innerHTML = " Insert message!";
    return false;
  } else {
    if (formTextfield.value == "") {
      document.getElementById("textfield_error").innerHTML = " Insert name!";
      return false;
    } else {
      document.getElementById("textfield_error").innerHTML = "";
    }
    if (formTextarea.value == "") {
      document.getElementById("textarea_error").innerHTML = " Insert message!";
      return false;
    } else {
      document.getElementById("textarea_error").innerHTML = "";
    }
    return true;
  }
}

function postForm(){
  var request = new XMLHttpRequest();
  var formName = formTextfield.value;
  var formMessage = formTextarea.value;
  request.open('POST', '/api/entries/add')
  request.setRequestHeader("Content-Type", "application/json");
  request.send(JSON.stringify({name: formName, message: formMessage}));
  btnCounter = 1;
  location.href = "#guestbook";
  getEntries();
  completeForm.reset();
}

function createHTML(data) {
  var rawTemplate = document.getElementById("entryTemplate").innerHTML;
  var compiledTemplate = Handlebars.compile(rawTemplate);
  var generatedHTML = compiledTemplate(data);

  entriesContainer.innerHTML = generatedHTML;
}
