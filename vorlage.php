<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Vorlage</title>
        <link rel="stylesheet" href="" />
        <link rel="stylesheet" href="scripts/main-layout.css" />
        <script src="scripts/library.js"></script>
    </head>

    <body>
        <div id="navigation">
            <script>document.getElementById("navigation").innerHTML=createMenu();</script>
        </div>
        
        <div id="head">
            <?php
                if($session="Active"){
                    
                }
            ?>
        </div>
        <div id="main">Hauptbereich</div>
        <div id="footer">Fußbereich</div>
    </body>
</html>