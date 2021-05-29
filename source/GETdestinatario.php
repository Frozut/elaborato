<?php
require_once 'source/db_connect.php';
require_once 'source/session.php';



$SQLInsert = "SELECT username FROM users WHERE username!='$_SESSION[username]'";
$statement = $conn->prepare($SQLInsert);
$statement->execute();
try {
    while ($row = $statement->fetch()) {
?>
    <option value='<?php echo $row['username']; ?>'><?php echo $row['username']; ?></option>
<?php
    }
} catch (PDOException $e) {
    echo $e;
}

?>