<?php
     require_once 'source/db_connect.php';
     require_once 'source/session.php';


     $Date='';
     $id=$_SESSION['id'];


     try {
        $SQLInsert = "SELECT expirationDate FROM creditcard INNER JOIN users on creditcard.id_user = users.id WHERE creditcard.id_user = ".$id." ;";
        $statement=$conn->prepare($SQLInsert);
        $statement->execute();
        if($row = $statement->fetch()){
            $Date = $row['expirationDate'];
            
        }
        else {
            echo "Errord";
          }
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    echo $Date;










?>