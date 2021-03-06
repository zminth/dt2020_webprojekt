<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Dashboard - Ticketsystem</title>
        <link rel="stylesheet" href="" />
        <link rel="stylesheet" href="../scripts/main-layout.css" />
        <link rel="stylesheet" href="../scripts/dashboard.css" />
        <script src="../scripts/library.js"></script>
        <script src="../scripts/loader.js"></script> <!-- Framework Link: https://www.gstatic.com/charts/loader.js -->
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
            <div id="main-diagram-diagramWeeklyOverview">
                <div id="diagramm-wochenuebersicht">
                    <script>
                        diagramWeeklyOverview();
                    </script>
                </div>
            </div>

            <div id="main-diagram-todaysTickets">
                <div id="diagramm-heutigeTickets">
                    <script>
                        diagramTicketsToday();
                    </script>
                </div>
            </div>

            <div id="main-diagram-perWorker">
                <div id="diagramm-einesMitartbeiters">
                    <script>
                        diagramPerWorker();
                    </script>
                </div>
            </div>
        </div>
        <div id="footer">Fußbereich</div>
    </body>
</html>