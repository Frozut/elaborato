<?php
     require_once 'source/db_connect.php';
     require_once 'source/session.php';


     $civ='';
     $id=$_SESSION['id'];


     try {
        $SQLInsert = "SELECT civ FROM creditcard INNER JOIN users on creditcard.id_user = users.id WHERE creditcard.id_user = ".$id." ;";
        $statement=$conn->prepare($SQLInsert);
        $statement->execute();
        if($row = $statement->fetch()){
            $civ = $row['civ'];
            
        }
        else {
            echo "Errord";
          }
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    echo $civ;










?>