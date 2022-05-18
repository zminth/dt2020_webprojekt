<?php
    error_reporting(0);
    //header('Content-Type: application/json');

    //Serververbindung
    include("../generalInformations.php");

    //Variablen
    $a = 0;
    $name = $_POST["nachname"];
    $vorname = $_POST["vorname"];
    $benutzername = $_POST["benutzername"];
    $key = $_POST["key"];
    $gruppenid = $_POST["group"];
    $abteilungsid = $_POST["abteilung"];
    $email = $_POST["mail"];

    @$dbVerbindung = new mysqli($hostname, $username, $password, $database);
    if(mysqli_connect_errno() == 0){

        $sql = "INSERT INTO benutzer (Name, Vorname, AbteilungsID, Benutzername, Passwort, GruppenID, EMail) VALUES ('$name', '$vorname', '$abteilungsid', '$benutzername', '$key', $gruppenid, '$email')";
        //echo "$sql";

        echo "Benutzer wurde angelegt!";

        $content = $dbVerbindung->query($sql);
        

        /* $sql = "SELECT * FROM `benutzer` WHERE `EMail`='$vorname.$nachname@ticketsystem.de';";
        $content = $dbVerbindung->query($sql); */
        
        if ($content->num_rows == 0){
            /* $data = [
                'error' => "Fehler beim anlegen des Benutzers",
                'error_code' => "404",
                'error_message' => "Data not found"
            ]; */
        }else{
            /* while ($obj = $content->fetch_object()){
                $data[$a] = $obj;

                $a++;
            } */
        }

    }else{
        $data = [
            'error' => "Keine Verbindung zur Datenbank",
            'error_code' => "503",
            'error_message' => "Service Unavailable"
        ];
    }

    if($data){
        echo json_encode($data);
    }

    //echo "Benutzer wurde erfolgreich angelegt!";
?>