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

function addNote(){
  "use stirct";

  //Variablen
  var notesElement = document.getElementById("main-ticket-displayNotes");
  var displayNoteElemement, creationTimeElement, noteCreatorElement, noteMessageElement, textNote;
  const date = new Date();

  //Anlegen des Elementes für einen Hinweis
  displayNoteElemement = document.createElement("div");
  displayNoteElemement.setAttribute("class", "displayNote");

  //Anlegen des Elementes für den Erstellungszeitpunkt
  creationTimeElement = document.createElement("div");
  creationTimeElement.setAttribute("id", "main-ticket-displayNote-time");

  textNote = document.createTextNode(date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear()+" "+date.getHours()+":"+date.getMinutes());
  creationTimeElement.appendChild(textNote);

  displayNoteElemement.appendChild(creationTimeElement);

  //Anlegen des Elementes für den Notizersteller
  noteCreatorElement = document.createElement("div");
  noteCreatorElement.setAttribute("id", "main-ticket-displayNote-creator");

  textNote = document.createTextNode(document.getElementById("head-logonUser-username").valueOf().firstChild.nodeValue);
  noteCreatorElement.appendChild(textNote);

  displayNoteElemement.appendChild(noteCreatorElement);

  //Anlegen des Elementes für die Notiz
  noteMessageElement = document.createElement("div");
  noteMessageElement.setAttribute("id", "main-ticket-displayNote-message");
  
  textNote = document.createTextNode(document.getElementById("main-ticket-createNote").value);
  noteMessageElement.appendChild(textNote);

  displayNoteElemement.appendChild(noteMessageElement);



  notesElement.appendChild(displayNoteElemement);

  /* $.ajax({
      method: "GET",
      url: "some.php",
      data: { name: "John", location: "Boston" }
    }).done(function( msg ) {
        alert( "Data Saved: " + msg );
      }); */


  //document.getElementById("main-ticket-createNote").value
}
