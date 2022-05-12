
function managementMenu(elementName){
    "use strict"
    //Variablen

    var contentElement=["user","group","kategory"];

    //Code
    for(var a=0; a<contentElement.length;a++){
        if(contentElement[a]==elementName){
            document.getElementById("main-body-"+contentElement[a]+"-overview").style.display="block";
        } else {
            document.getElementById("main-body-"+contentElement[a]+"-overview").style.display="none";
        }
    }
    
}

function benutzerAnlegen(){
    "use strict";

    //Variablen

    document.getElementById("main-body-window").style.display = "block";
    document.getElementById("main-body-window-userCreation").style.display = "block";
}

function gruppeAnlegen(){
    "use strict";

    //Variablen

    document.getElementById("main-body-window").style.display = "block";
    document.getElementById("main-body-window-groupManagement").style.display = "block";
}

function kategorieAnlegen(){
    "use strict";

    //Variablen

    document.getElementById("main-body-window").style.display = "block";
    document.getElementById("main-body-window-category").style.display = "block";
}



function generateUserName(){
    "use strict";

    var firstName = document.getElementById("main-body-window-userCreation-firstName").value;
    var lastName = document.getElementById("main-body-window-userCreation-lastName").value;
    var userName = firstName.substr(0, 1)+lastName;

    document.getElementById("main-body-window-userCreation-userName").value = userName.toLowerCase();
}

function generateEmailAdress(){
    "use strict";

    var firstName = document.getElementById("main-body-window-userCreation-firstName").value;
    var lastName = document.getElementById("main-body-window-userCreation-lastName").value;
    var userName = firstName+"."+lastName+"@ticketsystem.de";

    document.getElementById("main-body-window-userCreation-email").value = userName.toLowerCase();
}

function saveNewUser(){
    "use strict";
    //Variablen
    const firstName = document.getElementById("main-body-window-userCreation-firstName").value;
    const lastName = document.getElementById("main-body-window-userCreation-lastName").value;
    const userName = document.getElementById("main-body-window-userCreation-userName").value;
    const password = document.getElementById("main-body-window-userCreation-password").value;
    const abteilung = document.getElementById("main-body-window-userCreation-abteilung").value;
    const gruppe = document.getElementById("main-body-window-userCreation-gruppe").value;
    const mail = document.getElementById("main-body-window-userCreation-email").value;

    console.log( firstName, lastName, userName, password);

    $.ajax({
        method: "POST",
        url: "../scripts/api/createNewUser.php",
        data: { vorname: firstName, nachname: lastName, benutzername: userName, key: password, group: gruppe, abteilung: abteilung, mail: mail  }
      }).done(function( msg ) {
            document.getElementById("main-body-windows-userCreation-message").innerHTML = msg;
            //console.log(msg);
            //msg = JSON.parse(msg);
            //document.getElementById("main-body-windows-userCreation-message").appendChild(document.createTextNode(msg.error));

        });

    //document.getElementById("main-body-window-userCreation-userName").value=document.getElementById("main-body-window-userCreation-firstName").value
}

function saveNewGroup(){
    "use strict";
    //Variablen
    const groupName = document.getElementById("main-body-window-groupManagement-name").value;
    const beschreibung = document.getElementById("main-body-window-groupManagement-description").value;

    console.log( firstName, lastName, userName, password);

    $.ajax({
        method: "POST",
        url: "../scripts/api/createNewGroup.php",
        data: { groupName: groupName, description: beschreibung }
      }).done(function( msg ) {
            document.getElementById("main-body-windows-groupManagement-message").innerHTML = msg;
            //console.log(msg);
            //msg = JSON.parse(msg);
            //document.getElementById("main-body-windows-userCreation-message").appendChild(document.createTextNode(msg.error));

        });

    //document.getElementById("main-body-window-userCreation-userName").value=document.getElementById("main-body-window-userCreation-firstName").value
}

function saveNewCategory(){
    "use strict";
    //Variablen
    const categoryName = document.getElementById("main-body-window-category-name").value;
    const beschreibung = document.getElementById("main-body-window-category-description").value;

    $.ajax({
        method: "POST",
        url: "../scripts/api/createNewCategory.php",
        data: { categoryName: categoryName, description: beschreibung }
      }).done(function( msg ) {
            document.getElementById("main-body-windows-groupManagement-message").innerHTML = msg;
            //console.log(msg);
            //msg = JSON.parse(msg);
            //document.getElementById("main-body-windows-userCreation-message").appendChild(document.createTextNode(msg.error));

        });

    //document.getElementById("main-body-window-userCreation-userName").value=document.getElementById("main-body-window-userCreation-firstName").value
}