<?php
    /* error_reporting(0);
    header('Content-Type: application/json');
 */
    //Serververbindung
    include("../scripts/generalInformations.php");

    //Variablen
    $a = 0;
    $user = $_POST["user"];

    @$dbVerbindung = new mysqli($hostname, $username, $password, $database);
    if(mysqli_connect_errno() == 0){

        $sql = "SELECT * FROM `benutzer` WHERE `Benutzername`='$user';";

        $content = $dbVerbindung->query($sql);
        if ($content->num_rows == 0){
            $data = [
                'error' => "Keine Einträge vorhanden",
                'error_code' => "404",
                'error_message' => "Data not found"
            ];
        }else{
            while ($obj = $content->fetch_object()){
                $data["name"] = $obj->Benutzername;
                $data["key"] = $obj->Passwort;
                $data["groups"]=$obj->GruppenID;

                //$a++;
            }
        }

    }else{
        $data = [
            'error' => "Keine Verbindung zur Datenbank",
            'error_code' => "503",
            'error_message' => "Service Unavailable"
        ];
    }

    /* if($data){
        echo json_encode($data);
    } */
?>