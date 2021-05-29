<?php
require_once 'source/db_connect.php';
$id=$_SESSION['id'];
$password=$_SESSION['password'];
$email;
$to_date;

try {
    $SQLInsert = "SELECT email,to_date FROM users WHERE id='$id'";
    $statement=$conn->prepare($SQLInsert);
    $statement->execute();
    if($row = $statement->fetch()){
        $email = $row['email'];
        $to_date=$row['to_date'];
    }
    else {
        echo "Errord";
      };
      echo  "<h2 class=> Email: ".$email."</h2>", "<h2 class=> data di registarzione: ".$to_date."</h2>";
      //"<h2 class=> Password: ".$password."</h2><br>", 
}
catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

?> 