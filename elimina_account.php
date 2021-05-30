<?php
require_once 'source/db_connect.php';
require_once 'source/session.php';


$id = $_SESSION['id'];
$SQLInsert = "DELETE FROM transazioni where ID_user='$id'";
$statement = $conn->prepare($SQLInsert);
$statement->execute();
$SQLInsert = "DELETE FROM soldi where user_id='$id'";
$statement = $conn->prepare($SQLInsert);
$statement->execute();
$SQLInsert = "DELETE FROM creditcard where id_user='$id'";
$statement = $conn->prepare($SQLInsert);
$statement->execute();
$SQLInsert = "DELETE FROM users where id='$id'";
$statement = $conn->prepare($SQLInsert);
$statement->execute();
include_once 'logout.php';
?>