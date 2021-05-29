<?php

$otherid='';
try{
    $SQLInsert = "SELECT id FROM users WHERE username='$Destinatario'";
    $statement = $conn->prepare($SQLInsert);
    $statement->execute();
    if($row = $statement-> fetch()){
        $otherid=$row['id'];
    }
}
catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
echo $otherid;

?>