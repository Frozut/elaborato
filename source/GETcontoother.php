<?php


$conto1='';

try {
    $SQLInsert = "SELECT conto FROM soldi WHERE user_id='$otherid'";
    $statement=$conn->prepare($SQLInsert);
    $statement->execute();
    if($row = $statement->fetch()){
        $conto1 = $row['conto'];
        
    }
    else {
        echo "Errord";
      }
}
catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
echo $conto1;
?>