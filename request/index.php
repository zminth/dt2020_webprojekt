<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Anfrage 359590</title>
        <link rel="stylesheet" href="" />
        <link rel="stylesheet" href="../scripts/main-layout.css" />
        <link rel="stylesheet" href="../scripts/request.css" />
        <script src="../scripts/library.js"></script>
        <?php
            session_start();
            if($_SESSION["authentifiziert"]==false){
                header("Location: http://127.0.0.1:8080/webprojekt/logon/");
            }
        ?>
    </head>

    <body style="overflow: hidden;">
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
            <div id="main-header">
                <div id="main-header-ticketid">359590</div>
                <div id="main-header-ticketbetreff">PC defekt</div>
                <div id="main-header-anfragename">Anfragename: Schmitt, Peter</div>
                <div id="main-header-fertigstellungsDatum">Fälligkeitsdatum: 06.05.2022 10:27</div>
            </div>

            <div id="main-body">
                <div id="main-ticket-beschreibung">Hallo wertes IT-Team, <br> können Sie bitte dafür sorgen, dass ich meinen PC wieder benutzen kann?<br/> Gruß<br/> Peter Schmitt</div>
                <table id="main-ticketEinstellungen">
                    <tbody>
                        <tr>
                            <td>Prio:</td>
                            <td>
                                <select name="" id="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>
                                <select name="" id="">
                                    <option value="">Geöffnet</option>
                                    <option value="">Warten</option>
                                    <option value=""></option>
                                    <option value="">Geschlossen</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Techniker:</td>
                            <td>
                                <select name="" id="">
                                    <option value="">Hauke, Dirk</option>
                                    <option value="">Alfs, Jerome</option>
                                    <option value="">Hagedorn, Kevin</option>
                                    <option value="">Weigand, Dominik</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Erstelldatum:</td>
                            <td>
                                27.04.2022 10:27
                            </td>
                        </tr>
                        <tr>
                            <td>Kategorie:</td>
                            <td>
                                <select name="" id="">
                                    <option value="">Hardware</option>
                                    <option value="">Software</option>
                                    <option value="">Usermanagement</option>
                                    <option value="">Netzwerk</option>
                                    <option value="">Sonstige</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div id="main-ticket-noteArea">
                    <textarea name="" id="main-ticket-createNote" cols="30" rows="10"></textarea>
                    <button style="width: max-content;position: absolute;top: 120px;right: 0px;">Hinweis hinzufügen</button>
                    <div id="main-ticket-displayNotes">
                        <div class="displayNote" >
                            <div id="main-ticket-displayNote-time">04.05.2022 14:12</div>
                            <div id="main-ticket-displayNote-creator">Hauke, Dirk</div>
                            <div id="main-ticket-displayNote-message">Dies ist ein Hinweis!</div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
        <div id="footer">Fußbereich</div>
    </body>
    <script>
        var url = window.location;
        url = new URL(url);
        var id = url.searchParams.get("id");
        console.log(id);
    </script>
</html>