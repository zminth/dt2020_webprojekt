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
            session_start();
            if($_SESSION["authentifiziert"]==false){
                header("Location: http://127.0.0.1:8080/webprojekt/logon/");
            }
        ?>
    </head>

    <body>
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
                    <div class="ticket-betreff">PC defekt</div>
                    <div class="ticket-status">geöffnet</div>
                    <div class="ticket-ersteller">Schmitt, Peter</div>
                    <div class="ticket-kategorie">Hardware</div>
                    <div class="ticket-erstelldatum">27.04.2022</div>
                    <div class="ticket-abschlussdatum">06.05.2022</div>
                </div>

            </div>
        </div>
        <div id="footer">Fußbereich</div>
    </body>
</html>