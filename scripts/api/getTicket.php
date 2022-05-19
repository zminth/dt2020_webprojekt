<?php
    error_reporting(0);
    header('Content-Type: application/json');

    //Serververbindung
    include("../generalInformations.php");

    //Variablen
    $a = 0;
    $ticketID = $_POST["id"];

    @$dbVerbindung = new mysqli($hostname, $username, $password, $database);
    if(mysqli_connect_errno() == 0){

        $sql = "SELECT `TicketID`,`ersteller`,`creationDate`,`Titel`,`Text`,`BenutzerID`,`PrioID`, `kategorie`.`Kategorie`, `status`.`Status`
        FROM `tickets`
        INNER JOIN `kategorie` on `tickets`.`KategorieID`=`kategorie`.`KategorieID`
        INNER JOIN `status` on `tickets`.`StatusID`=`status`.`StatusID`
        WHERE `TicketID`=$ticketID
        ORDER BY `TicketID` ASC;";

        $content = $dbVerbindung->query($sql);
        if ($content->num_rows == 0){
            $data = [
                'error' => "Keine Einträge vorhanden",
                'error_code' => "404",
                'error_message' => "Data not found"
            ];
        }else{
            while ($obj = $content->fetch_object()){
                $data = $obj;

                $a++;
            }
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
?>