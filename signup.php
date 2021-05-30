<?php

require_once 'source/db_connect.php';

if (isset($_POST['signup-btn'])) {

  $username = $_POST['user-name'];
  $email = $_POST['user-email'];
  $password = $_POST['user-pass'];

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  try {
    $SQLInsert1 = "SELECT username FROM users WHERE username='$username'";
      

    $statement = $conn->prepare($SQLInsert1);
    $statement->execute();
    $row = $statement->fetch();
    if($username==$row['username']){
      header('location: index.html');
    }
    else{
      $SQLInsert = "INSERT INTO users (username, password, email, to_date)
                   VALUES (:username, :password, :email, now())";

    $statement = $conn->prepare($SQLInsert);
    $statement->execute(array(':username' => $username, ':password' => $hashed_password, ':email' => $email));

    if ($statement->rowCount() == 1) {
      header('location: Credit_card.php');
    }
    }



    
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

?>
<html>
<html>