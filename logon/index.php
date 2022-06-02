<!DOCTYPE html>
<html>
    <head>
        <?php
            error_reporting(0);
        ?>
        <meta charset="utf-8"/>
        <title>Logon</title>
        <link rel="stylesheet" href="" />
        <link rel="stylesheet" href="../scripts/main-layout.css" />
        <link rel="stylesheet" href="../scripts/logon.css" />
        <script src="../scripts/library.js"></script>
        <?php
            //Abfrage der Datenbank, ob der Benutzer existiert oder nicht und ob das Kennwort richtig ist.

            include("../scripts/userAuthentification.php");

            $username = $data["name"];
            $password = $data["key"];
            $groups = $data["group"];

            if($_POST["user"]&&$_POST["key"]){
                echo $username;
                if($_POST["user"]==$username && $_POST["key"]==$password){
                    echo "Anmeldung erfolgreich!";
                    session_start();
                    $_SESSION["authentifiziert"]=true;
                    $_SESSION["username"]=$username;
                    $_SESSION["groups"]=$groups

                    header("Location: ../dashboard/");
                }
            }
            
        ?>
    </head>

    <body>
        <div id="navigation"></div>
        <div id="head"></div>
        <div id="main">

            <form action="" method="POST">

                <?php
                    if($_POST["user"] && $_POST["user"]!=$username || $_POST["key"] && $_POST["key"]!=$password){
                        printf('<div id="main-form-logonState">Benutzername oder Password falsch!</div>');
                    }  
                ?>
                <input tpye="text" placeholder="Username" name="user" required />
                <input type="password" placeholder="Password" name="key" minlength="8" required />
                <button type="submit">Anmelden</button>
            </form>
        </div>
        <div id="footer">Fußbereich</div>
    </body>
</html>