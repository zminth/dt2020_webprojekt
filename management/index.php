<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Verwaltung</title>
        <link rel="stylesheet" href="" />
        <link rel="stylesheet" href="../scripts/main-layout.css" />
        <link rel="stylesheet" href="../scripts/management.css" />
        <script src="../scripts/library.js"></script>
        <script src="../scripts/jquery-3.6.0.js"></script>
        <script src="../scripts/management.js"></script>
        <script>
            var xttp, optionElement, a = 0;
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
            <div id="main-body" style="color: white;" >
                <nav id="main-body-nav">
                    <div id="main-body-nav-users" onClick="managementMenu('user');" >Benutzerverwaltung</div>
                    <div id="main-body-nav-groups" onClick="managementMenu('group');" >Gruppenverwaltung</div>
                    <div id="main-body-nav-kategory" onClick="managementMenu('kategory');" >Kategorien</div>
                </nav>
                <div id="main-body-user-overview" style="display: block;">
                    <table>
                        <thead>
                            <td>Username</td>
                            <td>Name</td>
                            <td>Vorname</td>
                            <td>Kennwort</td>
                            <td>Mitglied von</td>
                            <td>Mail-Adresse</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td>dhauke</td>
                                <td>Hauke</td>
                                <td>Dirk</td>
                                <td>
                                    <button>Kennwort ändern</button>
                                </td>
                                <td>Administrator, Benutzer, Techniker</td>
                                <td>dhauke@bkbmail.de</td>
                            </tr>
                        </tbody>
                    </table>
                    <button onClick="benutzerAnlegen();" >Benutzer hinzufügen</button>
                </div>

                <div id="main-body-group-overview" style="display: none;">
                    <table>
                        <thead>
                            <td>Gruppenname</td>
                            <td>Bezeichnung</td>
                            <td></td>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Administrator</td>
                                <td>Zur Administration des Ticketsystems</td>
                                <td>
                                    <button>Bnutzer hinzufügen</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button onClick="gruppeAnlegen();" >Gruppe hinzufügen</button>
                </div>

                <div id="main-body-kategory-overview" style="display: none;">
                    <table>
                        <thead>
                            <td>Kategorie</td>
                            <td>Beschreibung</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Software</td>
                                <td>Alle Probleme, die in einer Software auftreten</td>
                            </tr>
                        </tbody>
                    </table>
                    <button onClick="kategorieAnlegen();">Kategorie hinzufügen</button>
                </div>

                <!-- Pop-Up Fenster -->
                <div id="main-body-window" style="display: none;" >
                    <div id="main-body-window-userCreation" style="display: none;" >
                        <div id="main-body-window-userCreation-close" onClick="document.getElementById('main-body-window').style.display = 'none';document.getElementById('main-body-window-userCreation').style.display = 'none';">X</div>
                        <table>
                            <thead>
                                <td></td>
                                <td></td>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Vorname</td>
                                    <td>
                                        <input type="text" id="main-body-window-userCreation-firstName" name="" placeholder="Vorname" autocomplete="off" onkeyup="generateUserName(); generateEmailAdress();" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nachname</td>
                                    <td>
                                        <input type="text" id="main-body-window-userCreation-lastName" name="" placeholder="Nachname" autocomplete="off" onkeyup="generateUserName(); generateEmailAdress();" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>
                                        <!-- <div id="main-body-window-userCreation-userName" ></div> -->
                                        <input type="text" id="main-body-window-userCreation-userName" name="" placeholder="Username" autocomplete="off" disabled />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Passwort</td>
                                    <td>
                                        <input type="password" id="main-body-window-userCreation-password" name="" placeholder="Password" autocomplete="off" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Abteilung</td>
                                    <td>
                                        <select name="" id="main-body-window-userCreation-abteilung">
                                            <script>
                                                xhttp = new XMLHttpRequest();
                                                xhttp.open("GET", "../scripts/api/getAbteilungen.php", false);
                                                xhttp.send();
                                                const abteilungen = JSON.parse(xhttp.response);
                                                a=0;
                                                while(abteilungen[a]){
                                                    optionElement = document.createElement("option");
                                                    optionElement.setAttribute("value", abteilungen[a].AbteilungsID);
                                                    optionElement.appendChild(document.createTextNode(abteilungen[a].Abteilung));
                                                    document.getElementById("main-body-window-userCreation-abteilung").appendChild(optionElement);

                                                    a++;
                                                }
                                            </script>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gruppe</td>
                                    <td>
                                        <select name="" id="main-body-window-userCreation-gruppe">
                                            <script>
                                                xhttp = new XMLHttpRequest();
                                                xhttp.open("GET", "../scripts/api/getUserGroups.php", false);
                                                xhttp.send();
                                                const groups = JSON.parse(xhttp.response);
                                                a=0;
                                                while(groups[a]){
                                                    optionElement = document.createElement("option");
                                                    optionElement.setAttribute("value", groups[a].GruppenID);
                                                    optionElement.appendChild(document.createTextNode(groups[a].Gruppe));
                                                    document.getElementById("main-body-window-userCreation-gruppe").appendChild(optionElement);

                                                    a++;
                                                }
                                            </script>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>E-Mail</td>
                                    <td>
                                        <input type="text" id="main-body-window-userCreation-email" name="" placeholder="example@ticketsystem.de" autocomplete="off" disabled />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button onClick="saveNewUser();">Benutzer anlegen</button>
                        <div id="main-body-windows-userCreation-message"></div>
                    </div>

                    <div id="main-body-window-groupManagement" style="display: none;" >
                        <div id="main-body-window-groupManagement-close" onClick="document.getElementById('main-body-window').style.display = 'none';document.getElementById('main-body-window-groupManagement').style.display = 'none';">X</div>
                        <table>
                            <thead>
                                <td></td>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Gruppenname</td>
                                    <td>
                                        <input type="text" id="main-body-window-groupManagement-name" name="" placeholder="Gruppenname" autocomplete="off"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Beschreibung</td>
                                    <td>
                                        <input type="text" id="main-body-window-groupManagement-description" name="" placeholder="Beschreibung" autocomplete="off"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button onClick="saveNewGroup();">Gruppe anlegen</button>
                        <div id="main-body-windows-groupManagement-message"></div>
                    </div>

                    <div id="main-body-window-category" style="display: none;" >
                        <div id="main-body-window-category-close" onClick="document.getElementById('main-body-window').style.display = 'none';document.getElementById('main-body-window-category').style.display = 'none';">X</div>
                        <table>
                            <thead>
                                <td></td>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kategorie</td>
                                    <td>
                                        <input type="text" id="main-body-window-category-name" name="" placeholder="Kategoriename" autocomplete="off"/>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>Beschreibung</td>
                                    <td>
                                        <input type="text" id="main-body-window-category-description" name="" placeholder="Beschreibung" autocomplete="off"/>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                        <button onClick="saveNewCategory();">Kategorie anlegen</button>
                        <div id="main-body-windows-category-message"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">Fußbereich</div>
    </body>
</html>