<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Anfrage einreichen</title>
        <link rel="stylesheet" href="" />
        <link rel="stylesheet" href="../scripts/main-layout.css" />
        <link rel="stylesheet" href="../scripts/newRequest.css" />
        <script src="../scripts/library.js"></script>
        <script src="../scripts/jquery-3.6.0.js"></script>
        <script src="../scripts/newRequest.js"></script>
        <script>
            var xttp, optionElement, a = 0;
        </script>
        <?php
            include("../scripts/checkAuthenificationState.php");
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
            <div id="main-body">
                <table>
                    <thead>
                        <td></td>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Anfragename</td>
                            <td>
                                <input type="text" id="main-body-table-requesterName" />
                            </td>
                            <td>E-Mail-Adresse</td>
                            <td>
                                <input type="email" name="" id="main-body-table-email" />
                            </td>
                        </tr>
                        <tr>
                            <td>Betreff</td>
                            <td>
                                <input type="text" id="main-body-table-betreff" />
                            </td>
                            <td>Priorität:</td>
                            <td>
                                <select name="" id="main-body-table-priority" >
                                    <script>
                                        xhttp = new XMLHttpRequest();
                                        xhttp.open("GET", "../scripts/api/getPriority.php", false);
                                        xhttp.send();
                                        const priority = JSON.parse(xhttp.response);
                                        a=0;
                                        while(priority[a]){
                                            optionElement = document.createElement("option");
                                            optionElement.setAttribute("value", priority[a].PrioID);
                                            optionElement.appendChild(document.createTextNode(priority[a].Prio));
                                            document.getElementById("main-body-table-priority").appendChild(optionElement);

                                            a++;
                                        }
                                    </script>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select name="" id="main-body-table-state" disabled="disabled">
                                    <option value="1">Geöffnet</option>
                                </select>
                            </td>
                            <td>Kategorie</td>
                            <td>
                                <select name="" id="main-body-table-category">
                                    <script>
                                        xhttp = new XMLHttpRequest();
                                        xhttp.open("GET", "../scripts/api/getCategory.php", false);
                                        xhttp.send();
                                        const category = JSON.parse(xhttp.response);
                                        a=0;
                                        while(category[a]){
                                            optionElement = document.createElement("option");
                                            optionElement.setAttribute("value", category[a].KategorieID);
                                            optionElement.appendChild(document.createTextNode(category[a].Kategorie));
                                            document.getElementById("main-body-table-category").appendChild(optionElement);

                                            a++;
                                        }
                                    </script>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Beschreibung</td>
                            <td colspan="3" >
                                <textarea name="" id="main-body-table-description" cols="30" rows="10" ></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button onClick="createTicket();" >Anfrage einreichten</button>
                <div id="testnachricht"></div>
            </div>
        </div>
        <div id="footer">Fußbereich</div>
    </body>
</html>