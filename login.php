<?php

require_once 'source/session.php';
require_once 'source/db_connect.php';

if(isset($_POST['login-btn'])) {

    $user = $_POST['user-name'];
    $password = $_POST['user-pass'];
    
    try {
      $SQLQuery = "SELECT * FROM users WHERE username = :username";
      $statement = $conn->prepare($SQLQuery);
      $statement->execute(array(':username' => $user));

      if($statement->execute()){
        header('location: index.html');
      }

      while($row = $statement->fetch()) {
        $id = $row['id'];
        $hashed_password = $row['password'];
        $username = $row['username'];
        

        if(password_verify($password, $hashed_password)) {
          
          $_SESSION['id'] = $id;
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
          $_SESSION['conto'] = include_once 'source/GETcontoutentesessione.php';
          header('location: dashboard.php');
        }
        else {
          echo "Error: Invalid username or password";
          header('location: index.html');
        }
      }
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      
    }

}

?>