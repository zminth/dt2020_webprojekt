function setTicketPriority(ticketID){
  "use strict";
  //Variablen

  const priority = document.getElementById("main-ticketEinstellungen-priority").value;

  $.ajax({
      method: "POST",
      url: "../scripts/api/setTicketPriority.php",
      data: { priority: priority, ticketID: ticketID }
    }).done(function( msg ) {
      });
}

function setTicketState(ticketID){
  "use strict";
  //Variablen

  const state = document.getElementById("main-ticketEinstellungen-state").value;

  $.ajax({
      method: "POST",
      url: "../scripts/api/setTicketState.php",
      data: { state: state, ticketID: ticketID }
    }).done(function( msg ) {
      });
}

function setTicketTechnician(ticketID){
  "use strict";
  //Variablen

  const techniker = document.getElementById("main-ticketEinstellungen-techniker").value;

  $.ajax({
      method: "POST",
      url: "../scripts/api/setTicketTechnician.php",
      data: { techniker: techniker, ticketID: ticketID }
    }).done(function( msg ) {
      });
}

function setTicketCategory(ticketID){
  "use strict";
  //Variablen

  const category = document.getElementById("main-ticketEinstellungen-category").value;

  $.ajax({
      method: "POST",
      url: "../scripts/api/setTicketCategory.php",
      data: { category: category, ticketID: ticketID }
    }).done(function( msg ) {
      });
}