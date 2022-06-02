<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Anfrage 359590</title>
        <link rel="stylesheet" href="" />
        <link rel="stylesheet" href="../scripts/main-layout.css" />
        <link rel="stylesheet" href="../scripts/request.css" />
        <script src="../scripts/library.js"></script>
        <script src="../scripts/jquery-3.6.0.js"></script>
        <script src="../scripts/request.js"></script>
        <script>
            var temp;


            var url = window.location;
            url = new URL(url);
            const ticketID = url.searchParams.get("id");
        </script>
        <?php
            include("../scripts/checkAuthenificationState.php");
        ?>
    </head>

    <body>
        <div id="navigation">
            <script>document.getElementById("navigation").innerHTML=createMenu();</script>
        </div>
        
        <div id="head">
            <div id="head-logonUser">
                    <?php
                        echo '<div id="head-logonUser-username" style="margin: 16px 0px 16px 0px;">'.$_SESSION["username"].'</div>';
                    ?>
                <div id="head-logonUser-settings">
                    <script>document.getElementById("head-logonUser-settings").innerHTML=userMenu();</script>
                </div>
            </div>
        </div>
        <div id="main">
            <div id="main-header">
                <div id="main-header-ticketid"></div>
                <div id="main-header-ticketbetreff"></div>
                <div id="main-header-anfragename"></div>
                <div id="main-header-fertigstellungsDatum"></div>
            </div>

            <div id="main-body">
                <div id="main-ticket-beschreibung"></div>
                <table id="main-ticketEinstellungen">
                    <tbody>
                        <tr>
                            <td>Prio:</td>
                            <td>
                                <select name="" id="main-ticketEinstellungen-priority" onChange="setTicketPriority(ticketID);"></select>
                            </td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>
                                <select name="" id="main-ticketEinstellungen-state" onChange="setTicketState(ticketID);"></select>
                            </td>
                        </tr>
                        <tr>
                            <td>Techniker:</td>
                            <td>
                                <select name="" id="main-ticketEinstellungen-techniker" onChange="setTicketTechnician(ticketID);">
                                    <option value="0" id="nicht-zugewiesen">Nicht zugewiesen</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Erstelldatum:</td>
                            <td id="main-ticketEinstellungen-erstelldatum">
                                27.04.2022 10:27
                            </td>
                        </tr>
                        <tr>
                            <td>Kategorie:</td>
                            <td>
                                <select name="" id="main-ticketEinstellungen-category" onChange="setTicketCategory(ticketID);">
                                    <!-- <option value="">Hardware</option>
                                    <option value="">Software</option>
                                    <option value="">Usermanagement</option>
                                    <option value="">Netzwerk</option>
                                    <option value="">Sonstige</option> -->
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div id="main-ticket-noteArea">
                    <textarea name="" id="main-ticket-createNote" cols="30" rows="10" style="resize: none;" ></textarea>
                    <button style="width: max-content;position: absolute;top: 120px;right: 0px;" onClick="addNote();">Hinweis hinzufügen</button>
                    <div id="main-ticket-displayNotes">
                        <div class="displayNote" >
                            <div id="main-ticket-displayNote-time">04.05.2022 14:12</div>
                            <div id="main-ticket-displayNote-creator">Hauke, Dirk</div>
                            <div id="main-ticket-displayNote-message">Dies ist ein Hinweis!</div>
                        </div>
                        
                    </div>
                </div>
                
            </div>

            <script>

                //Ticketinformationen holen
                /* var ticket; */
                $.ajax({
                    method: "POST",
                    url: "../scripts/api/getTicket.php",
                    data: { id: ticketID}
                }).done(function( msg ) {
                        ticket = msg;

                        document.getElementById("main-header-ticketid").innerHTML = ticket.TicketID;
                        document.title = "Anfrage "+ticket.TicketID;
                        document.getElementById("main-header-ticketbetreff").innerHTML = ticket.Titel;
                        document.getElementById("main-header-anfragename").innerHTML = 'Anfragename: '+ticket.ersteller;

                        var erstelldatum = new Date(ticket.creationDate);
                        var faellingkeitsdatum = new Date(erstelldatum.getTime()+691200000);

                        document.getElementById("main-ticketEinstellungen-erstelldatum").innerHTML = ''+erstelldatum.getUTCDate()+'.'+(erstelldatum.getMonth()+1)+'.'+erstelldatum.getUTCFullYear()+' '+erstelldatum.getHours()+':'+erstelldatum.getMinutes();
                        document.getElementById("main-header-fertigstellungsDatum").innerHTML = 'Fälligkeitsdatum: '+faellingkeitsdatum.getUTCDate()+'.'+(faellingkeitsdatum.getMonth()+1)+'.'+faellingkeitsdatum.getUTCFullYear()+' '+faellingkeitsdatum.getHours()+':'+faellingkeitsdatum.getMinutes()
                        
                        document.getElementById("main-ticket-beschreibung").innerHTML = ticket.Text;

                        //Prioritäten-Informationen holen
                        $.ajax({
                        method: "POST",
                        url: "../scripts/api/getPriority.php",
                        data: { id: ticketID}
                        }).done(function( msg ) {
                                priority = msg;

                                var a=0, optionElement;
                                while(priority[a]){
                                    optionElement = document.createElement("option");
                                    optionElement.setAttribute("value", priority[a].PrioID);
                                    if(priority[a].PrioID==ticket.PrioID){
                                        optionElement.setAttribute("selected", "");
                                    }
                                    optionElement.appendChild(document.createTextNode(priority[a].Prio));
                                    document.getElementById("main-ticketEinstellungen-priority").appendChild(optionElement);

                                    a++;
                                }
                            });
                        //Prioritäten-Informationen holen

                        //Status-Informationen holen
                        $.ajax({
                        method: "POST",
                        url: "../scripts/api/getState.php",
                        data: { id: ticketID}
                        }).done(function( msg ) {
                                state = msg;

                                var a=0, optionElement;
                                while(state[a]){
                                    optionElement = document.createElement("option");
                                    optionElement.setAttribute("value", state[a].StatusID);
                                    if(state[a].Status==ticket.Status){
                                        optionElement.setAttribute("selected", "");
                                    }
                                    optionElement.appendChild(document.createTextNode(state[a].Status));
                                    document.getElementById("main-ticketEinstellungen-state").appendChild(optionElement);

                                    a++;
                                }
                            });
                        //Status-Informationen holen
                        
                        //Techniker-Informationen holen
                        $.ajax({
                        method: "POST",
                        url: "../scripts/api/getTechnician.php",
                        data: { id: ticketID}
                        }).done(function( msg ) {
                                technician = msg;

                                var a=0, optionElement;
                                while(technician[a]){
                                    optionElement = document.createElement("option");
                                    optionElement.setAttribute("value", technician[a].BenutzerID);
                                    if(ticket.BenutzerID==0){
                                        document.getElementById("nicht-zugewiesen").setAttribute("selected", "");
                                    }

                                    if(technician[a].BenutzerID==ticket.BenutzerID){
                                        optionElement.setAttribute("selected", "");
                                    }
                                    optionElement.appendChild(document.createTextNode(technician[a].Name+', '+technician[a].Vorname));
                                    document.getElementById("main-ticketEinstellungen-techniker").appendChild(optionElement);

                                    a++;
                                }
                            });
                        //Techniker-Informationen holen

                        //Kategorie-Informationen holen
                        $.ajax({
                        method: "POST",
                        url: "../scripts/api/getCategory.php",
                        data: { id: ticketID}
                        }).done(function( msg ) {
                            category = msg;

                                var a=0, optionElement;
                                while(category[a]){
                                    optionElement = document.createElement("option");
                                    optionElement.setAttribute("value", category[a].KategorieID); 
                                    if(category[a].Kategorie==ticket.Kategorie){
                                        optionElement.setAttribute("selected", "");
                                    }
                                    optionElement.appendChild(document.createTextNode(category[a].Kategorie));
                                    document.getElementById("main-ticketEinstellungen-category").appendChild(optionElement);

                                    a++;
                                }
                            });
                        //Kategorie-Informationen holen
                        
                        
                });
            </script>
        </div>
        <div id="footer">Fußbereich</div>
    </body>
    <script>
        
    </script>
</html>