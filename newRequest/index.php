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
        <div id="main"></div>
        <div id="footer">Fußbereich</div>
    </body>
</html>