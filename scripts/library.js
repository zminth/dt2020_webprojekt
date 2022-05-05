

function createMenu() {
	"use strict";

	//variablen
	var output;
	var hostAdress = window.location.origin+"/webprojekt/";

    // Anlegend es Menüs
    output = '<nav">'+
        '<table>'+
            '<tbody>'+
                '<tr>'+
                    '<td><a href="'+hostAdress+'">Startseite</a></td>'+
                '</tr>'+

                '<tr>'+
                    '<td><a href="'+hostAdress+'dashboard/">Dashboard</a></td>'+
                '</tr>'+

                '<tr>'+
                    '<td><a href="'+hostAdress+'requests/">Anfragen</a></td>'+
                '</tr>'+

                '<tr>'+
                    '<td><a href="'+hostAdress+'new_request/">Ticketerstellung</a></td>'+
                '</tr>'+

                '<tr>'+
                    '<td><a href="'+hostAdress+'management/">Admindashboard</a></td>'+
                '</tr>'+
                /* '<tr>'+
                    '<td><a href="'+hostAdress+'">Startseite</a></td>'+
                '</tr>'+ */
            '</tbody>'+
        '</table>'+
    '</nav>';

    return output;
}



function userMenu() {
	"use strict";

	//variablen
	var output;
	var hostAdress = window.location.origin+"/webprojekt/";

    // Anlegend es Usermenüs
    output =    '<a href="">Einstellungen</a><br/>'+
                '<a href="'+hostAdress+'logoff/">Abmelden</a>';

    return output;
}




function diagramWeeklyOverview(){
    "use strict";

    //Variablen
    var elementName = "diagramm-wochenuebersicht";

        // Diagramm-Variablen
        var diagramTile = "Wochenübersicht";
        var test = [    ['Datum', 'Geöffnet', 'Geschlossen', 'warten'],
                        ['25.04.22',250,30,0],
                        ['26.04.22',200,100,30],
                        ['27.04.22',225,33,125],
                        ['28.04.22',175,80,40]
                    ];
        var vorlage = [
            ['Year', 'Sales', 'Expenses'],
            ['2013',  1000,      400],
            ['2014',  1170,      460],
            ['2015',  660,       1120],
            ['2016',  1030,      540]
          ]
        
        var daten = test; // Übergabepunkt, an dem die Daten eingetragen werden müssen. Hier wird die Datenbank angebunden

    //Generieren des Diagrammes

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable(daten);

      var options = {
        title: diagramTile,
        hAxis: {title: '',  titleTextStyle: {color: '#333'}},
        vAxis: {minValue: 0}
      };

      var chart = new google.visualization.AreaChart(document.getElementById(elementName));
      chart.draw(data, options);
    }
}

function diagramTicketsToday(){
    "use strict";

    //Variablen
    var elementName = "diagramm-heutigeTickets";

        // Diagram-Variablen
        var diagramTile = "Tagesbilanz";
        var test = [    ['Datum', 'Geöffnet', 'Geschlossen', 'warten'],
                        ['25.04.22',250,30,0],
                        ['26.04.22',200,100,30],
                        ['27.04.22',225,33,125],
                        ['28.04.22',175,80,40]
                    ];
        var vorlage = [
            ["Element", "Density", { role: "style" } ],
            ["Copper", 8.94, "#b87333"],
            ["Silver", 10.49, "silver"],
            ["Gold", 19.30, "gold"],
            ["Platinum", 21.45, "color: #e5e4e2"]
          ]

        var daten = vorlage; // Übergabepunkt, an dem die Daten eingetragen werden müssen. Hier wird die Datenbank angebunden

    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable(daten);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: diagramTile,
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById(elementName));
      chart.draw(view, options);
  }
}

function diagramPerWorker(){
    "use strict";

    //Variablen
    var elementName = "diagramm-einesMitartbeiters";

        // Diagram-Variablen
        var diagramTile = "Übersicht pro Mitarbeiter";
        var test = [    ['Datum', 'Geöffnet', 'Geschlossen', 'warten'],
                        ['25.04.22',250,30,0],
                        ['26.04.22',200,100,30],
                        ['27.04.22',225,33,125],
                        ['28.04.22',175,80,40]
                    ];
        var vorlage = [ ['Task', 'Hours per Day'],
            ['Work',     11],
            ['Eat',      2],
            ['Commute',  2],
            ['Watch TV', 2],
            ['Sleep',    7]
        ];

        var daten = vorlage; // Übergabepunkt, an dem die Daten eingetragen werden müssen. Hier wird die Datenbank angebunden

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable(daten);

        var options = {
        title: diagramTile,
        is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById(elementName));
        chart.draw(data, options);
    }
  
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