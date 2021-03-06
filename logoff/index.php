<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Logoff</title>
        <link rel="stylesheet" href="" />
        <link rel="stylesheet" href="../scripts/main-layout.css" />
        <link rel="stylesheet" href="../scripts/dashboard.css" />
        <script src="../scripts/library.js"></script>
        <?php
            session_start();
            session_destroy();
            header("Location: ../logon/");
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
                    <script>document.getElementById("head-logonUser-settings").innerHTML=usermenu();</script>
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