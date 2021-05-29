<?php


$conto='';

try {
    $SQLInsert = "SELECT conto FROM soldi WHERE user_id='$id'";
    $statement=$conn->prepare($SQLInsert);
    $statement->execute();
    if($row = $statement->fetch()){
        $conto = $row['conto'];
        
    }
    else {
        echo "Errord";
      }
}
catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

?>