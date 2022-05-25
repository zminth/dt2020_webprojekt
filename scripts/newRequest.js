function createTicket(){
    "use strict";
    //Variablen
    const requesterName = document.getElementById("main-body-table-requesterName").value;
    const email = document.getElementById("main-body-table-email").value;
    const betreff = document.getElementById("main-body-table-betreff").value;
    const priority = document.getElementById("main-body-table-priority").value;
    const state = document.getElementById("main-body-table-state").value;
    const category = document.getElementById("main-body-table-category").value;
    const description = document.getElementById("main-body-table-description").value;

    var testnachricht = requesterName+"\n"+email+"\n"+betreff+"\n"+priority+"\n"+state+"\n"+category+"\n"+description;

    document.getElementById("testnachricht").innerHTML = testnachricht.replace(/\n|\r/g, "<br/>");
    $.ajax({
        method: "POST",
        url: "../scripts/api/createNewRequest.php",
        data: { requesterName: requesterName, email: email, betreff: betreff, priority: priority, state: state, category: category, description: description }
      }).done(function( msg ) {
            document.getElementById("testnachricht").innerHTML = msg;
        });
}