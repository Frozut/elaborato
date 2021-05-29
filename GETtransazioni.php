<?php
require_once 'source/db_connect.php';
require_once 'source/session.php';

$id = $_SESSION['id'];
$SQLInsert = "SELECT * from transazioni where ID_user='$id'";
$statement = $conn->prepare($SQLInsert);
$statement->execute();
try {
    while ($row = $statement->fetch()) {
?>
        <tbody>
            <tr>

                <td><?php echo $row['Oggetto']; ?></td>
                <td><?php echo $row['prezzo']; ?></td>
                <td><?php
                    if ($row['tipoTransazione'] == 0) {
                        echo 'Acquistato';
                    } else {
                        echo 'trasferimento';
                    } ?></td>
                <td><?php echo $row['Destinatario']; ?></td>
                <td><?php echo $row['dataTransazione']; ?></td>
            </tr>
        </tbody>
<?php
    }
} catch (PDOException $e) {
}
?>