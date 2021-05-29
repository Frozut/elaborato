<?php
    require_once 'source/db_connect.php';
    require_once 'source/session.php';


    $id='';
    try {
        $SQLInsert = "SELECT id FROM users ORDER BY id DESC LIMIT 1;";
        $statement=$conn->prepare($SQLInsert);
        $statement->execute();
        if($row = $statement->fetch()){
            $id = $row['id'];
            
        }
        else {
            echo "Error: Invalid username or password";
            echo $id;

          }
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    echo $id;

?>

