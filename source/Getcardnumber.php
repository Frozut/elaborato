<?php
     require_once 'source/db_connect.php';
     require_once 'source/session.php';


     $CardNumber='';
     $id=$_SESSION['id'];


     try {
        $SQLInsert = "SELECT Cardnumber FROM creditcard INNER JOIN users on creditcard.id_user = users.id WHERE creditcard.id_user = ".$id." ;";
        $statement=$conn->prepare($SQLInsert);
        $statement->execute();
        if($row = $statement->fetch()){
            $CardNumber = $row['Cardnumber'];
            
        }
        else {
            echo "Error: Invalid username or password";
          }
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    echo $CardNumber;










?>