<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Requests - Ticketsystem</title>
        <link rel="stylesheet" href="" />
        <link rel="stylesheet" href="../scripts/main-layout.css" />
        <link rel="stylesheet" href="../scripts/requests.css" />
        <script src="../scripts/library.js"></script>
        <?php
            include("../scripts/checkAuthenificationState.php");
        ?>
    </head>

    <body style="overflow: hidden;" >
        <div id="navigation">
            <script>document.getElementById("navigation").innerHTML=createMenu();</script>
        </div>
        
        <div id="head">
            <div id="head-logonUser">
                <p>
                    <?php
                        echo $_SESSION["username"];
                    ?>
                </p>
                <div id="head-logonUser-settings">
                    <script>document.getElementById("head-logonUser-settings").innerHTML=userMenu();</script>
                </div>
            </div>
        </div>
        <div id="main">
            <div id="main-ueberischtVerwaltung">
                <select id="ticketfilter" name="" onChange="" >
                    <option value="">Alle Anfragen</option>
                    <option value="">Nicht zugewiesene Anfragen</option>
                    <option value="">Meine offenen Anfragen</option>
                    <option value="">Meine ausstehenden Anfragen</option>
                    <option value="">Meine erledigen Anfragen</option>
                    <option value="">Alle wartenden Anfragen</option>
                </select>
            </div>

            <div id="main-ticketübersicht">
                <div class="ticket-row">
                    <div class="ticket-nummer">359590</div>
                    <div class="ticket-prio">2</div>
                    <div class="ticket-betreff"><a href="../request/?id=359590">PC defekt</a></div>
                    <div class="ticket-status">geöffnet</div>
                    <div class="ticket-ersteller">Schmitt, Peter</div>
                    <div class="ticket-kategorie">Hardware</div>
                    <div class="ticket-erstelldatum">27.04.2022</div>
                    <div class="ticket-abschlussdatum">06.05.2022</div>
                </div>
                <script>
                    const xhttp = new XMLHttpRequest();
                    xhttp.open("GET", "../scripts/api/getTickets.php", false);
                    xhttp.send();

                    const tickets = JSON.parse(xhttp.response);

                    var ticketRow, ticketNummer, ticketPrio, ticketBetreff, link, ticketStatus, ticketErsteller, ticketKategorie, ticketErstellDatum, ticketAbschlussDatum, a;
                    var element = document.getElementById("main-ticketübersicht");
                    var a = 0;

                    while(tickets[a]){
                        //Ticketzeile erstellen
                        ticketRow = document.createElement("div");
                        ticketRow.setAttribute("class", "ticket-row");
                        
                        //Ticketnummer
                        ticketNummer = document.createElement("div");
                        ticketNummer.setAttribute("class", "ticket-nummer");
                        ticketNummer.appendChild(document.createTextNode(tickets[a].TicketID));
                        ticketRow.appendChild(ticketNummer);

                        //Ticket-Prio hinzufügen
                        ticketPrio = document.createElement("div");
                        ticketPrio.setAttribute("class","ticket-prio");
                        ticketPrio.appendChild(document.createTextNode(tickets[a].PrioID));
                        ticketRow.appendChild(ticketPrio);

                        //Ticketbetreff einfügen
                        ticketBetreff = document.createElement("div");
                        ticketBetreff.setAttribute("class","ticket-betreff");
                        link = document.createElement("a");
                        link.setAttribute("href", "../request/?id="+tickets[a].TicketID);
                        link.appendChild(document.createTextNode(tickets[a].Titel));
                        ticketBetreff.appendChild(link);
                        ticketRow.appendChild(ticketBetreff);

                        //Ticketstatus
                        ticketStatus = document.createElement("div");
                        ticketStatus.setAttribute("class","ticket-status");
                        ticketStatus.appendChild(document.createTextNode(tickets[a].StatusID));
                        ticketRow.appendChild(ticketStatus);

                        //Ticketersteller
                        ticketErsteller = document.createElement("div");
                        ticketErsteller.setAttribute("class","ticket-ersteller");
                        ticketErsteller.appendChild(document.createTextNode(tickets[a].ersteller));
                        ticketRow.appendChild(ticketErsteller);

                        //Ticketkategorie
                        ticketKategorie = document.createElement("div");
                        ticketKategorie.setAttribute("class","ticket-kategorie");
                        ticketKategorie.appendChild(document.createTextNode(tickets[a].KategorieID));
                        ticketRow.appendChild(ticketKategorie);

                        //TicketErstellDatum
                        ticketErstellDatum = document.createElement("div");
                        ticketErstellDatum.setAttribute("class","ticket-erstelldatum");
                        ticketErstellDatum.appendChild(document.createTextNode(tickets[a].creationDate));
                        ticketRow.appendChild(ticketErstellDatum);

                        //TicketAbschlussDatum
                        ticketAbschlussDatum = document.createElement("div");
                        ticketAbschlussDatum.setAttribute("class","ticket-abschlussdatum");
                        ticketAbschlussDatum.appendChild(document.createTextNode("abschluss"));
                        ticketRow.appendChild(ticketAbschlussDatum);

                        //Ticket-Zeile der Übersicht hinzufügen
                        element.appendChild(ticketRow);
                        a++;
                    }
                </script>
            </div>
        </div>
        <div id="footer">Fußbereich</div>
    </body>
</html>