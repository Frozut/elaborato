<?php
require_once 'source/session.php';
require_once 'source/db_connect.php';

if (isset($_POST['submit'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $id = $_SESSION['id'];
    $new_password=crypt($new_password,PASSWORD_DEFAULT);
    
    function alert(){
        echo "<script>confirm('errore la password non è stata cambiata')</script>";
    }
    try {
        $SQLQuery = "SELECT password FROM users WHERE id = '$id'";
        $statement = $conn->prepare($SQLQuery);
        $statement->execute();

        if ($row = $statement->fetch()) {
            if (password_verify($old_password, $row['password'])) {
                $SQLQuery = "UPDATE users SET password='$new_password' WHERE id = '$id';";
                $statement = $conn->prepare($SQLQuery);
                $statement->execute();
                header('location: settings.php');
            }
            else{
                alert();
                header('location: settings.php');
                
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
