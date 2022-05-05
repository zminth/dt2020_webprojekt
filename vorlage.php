<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Vorlage</title>
        <link rel="stylesheet" href="" />
        <link rel="stylesheet" href="../scripts/main-layout.css" />
        <link rel="stylesheet" href="../scripts/dashboard.css" />
        <script src="../scripts/library.js"></script>
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
                    <p>Einstellungen</p>
                    <p>Abmelden</p>
                </div>
            </div>
        </div>
        <div id="main">
            <div id="main-diagram-createdTickets"></div>
            <div id="main-diagram-overviewLast20Days"></div>
        </div>
        <div id="footer">Fußbereich</div>
    </body>
</html>