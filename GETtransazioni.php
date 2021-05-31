<?php
require_once 'source/db_connect.php';
require_once 'source/session.php';

$data1=$_POST['data1']??null;
$data2=$_POST['data2']??null;
$id = $_SESSION['id'];


if(empty($data1) && empty($data1)){
    
    $SQLInsert = "SELECT * from transazioni WHERE ID_user='$id' ORDER BY dataTransazione ASC";
    $statement = $conn->prepare($SQLInsert);
    $statement->execute();
}else{
    $SQLInsert = "SELECT * from transazioni where ID_user='$id' AND dataTransazione BETWEEN '$data1' AND '$data2' ORDER BY dataTransazione ASC";
    $statement = $conn->prepare($SQLInsert);
    $statement->execute();
}


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