<?php

include_once 'source/session.php';
include_once 'source/db_connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style1.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <?php if (!isset($_SESSION['username'])) : header("location: logout.php"); ?>
    <?php else : ?>
    <?php endif ?>
</head>

<body>

    <?php include_once "source/header.php" ?>
    <div class="home_content">
        <?php echo "<h1 align='center' style=color:#f1a566> Benvento " . $_SESSION['username'] . " alla Dashboard </h1>" ?>
        <!-- spese fatte oggi-->
        <div class="col-xs-6 col-md-3">
            <div class="tondeggia">
                <h4>Spese giornaliere</h4>
                <?php
                $id = $_SESSION['id'];
                $tdate = date('Y-m-d');
                try {
                    $SQLInsert = "SELECT SUM(prezzo) AS spesetotali FROM transazioni WHERE ID_user='$id' AND dataTransazione='$tdate'";
                    $statement = $conn->prepare($SQLInsert);
                    $statement->execute();
                    if ($row = $statement->fetch()) {
                        $prezzo = $row['spesetotali'];
                    }
                } catch (PDOException $e) {
                    echo $e;
                }
                ?>
                <div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $prezzo; ?>">
                    <span class="percent">
                        <?php if ($prezzo == "") {
                            echo "0";
                        } else {
                            echo $prezzo;
                        }
                        ?>
                    </span>
                </div>
            </div>
        </div>
        <!-- spese aftte il fiorno precedente-->
        <div class="col-xs-6 col-md-3">
            <div class="tondeggia">
                <h4>spese di ieri</h4>
                <?php
                $ydate = date('Y-m-d', strtotime("-1 days"));
                try {
                    $SQLInsert = "SELECT SUM(prezzo) AS speseieri FROM transazioni WHERE ID_user='$id' AND dataTransazione='$ydate'";
                    $statement = $conn->prepare($SQLInsert);
                    $statement->execute();
                    if ($row = $statement->fetch()) {
                        $prezzoieri = $row['speseieri'];
                    }
                } catch (PDOException $e) {
                    echo $e;
                }
                ?>

                <div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $prezzoieri; ?>">
                    <span class="percent">
                        <?php if ($prezzoieri == "") {
                            echo "0";
                        } else {
                            echo $prezzoieri;
                        } ?>
                    </span>
                </div>
            </div>
        </div>
        <!-- spese fatte durante la settimana-->
        <div class="col-xs-6 col-md-3">
            <div class="tondeggia">
                <h4>spese settimanali</h4>
                <?php
                try {
                    $pastdate =  date("Y-m-d", strtotime("-1 week"));
                    $crrntdte = date("Y-m-d");
                    $SQLInsert = "SELECT SUM(prezzo) AS spesesettimanali FROM transazioni WHERE ID_user='$id' AND dataTransazione BETWEEN '$pastdate' AND '$crrntdte'";
                    $statement = $conn->prepare($SQLInsert);
                    $statement->execute();
                    if ($row = $statement->fetch()) {
                        $prezzosettimanale = $row['spesesettimanali'];
                    }
                } catch (PDOException $e) {
                    echo $e;
                }
                ?>
                <div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $prezzosettimanale; ?>">
                    <span class="percent">
                        <?php if ($prezzosettimanale == "") {
                            echo "0";
                        } else {
                            echo $prezzosettimanale;
                        } ?>
                    </span>
                </div>
            </div>
        </div>
        <!--spese fatte durante il mese-->
        <div class="col-xs-6 col-md-3">
            <div class="tondeggia">
                <h4>spese mensili</h4>
                <?php
                try {
                    $monthdata = date("Y-m-d", strtotime("-1 month"));
                    $crrntdte = date("Y-m-d");
                    $SQLInsert = "SELECT SUM(prezzo) AS spesemensili FROM transazioni WHERE ID_user='$id' AND dataTransazione BETWEEN '$monthdata' AND '$crrntdte'";
                    $statement = $conn->prepare($SQLInsert);
                    $statement->execute();
                    if ($row = $statement->fetch()) {
                        $prezzomensile = $row['spesemensili'];
                    }
                } catch (PDOException $e) {
                    echo $e;
                }
                ?>
                <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $prezzomensile; ?>">
                    <span class="percent">
                        <?php if ($prezzomensile == "") {
                            echo "0";
                        } else {
                            echo $prezzomensile;
                        } ?>
                    </span>
                </div>
            </div>
        </div>
        <!--spese fatte durante l'anno-->
        <br>
        <br>
            <div class="col-xs-6 col-md-3 " style="margin-top:2%">
                <div class="tondeggia">
                    <h4>spese annuali</h4>
                    <?php
                    try {
                        $cyear = date("Y");
                        $crrntdte = date("Y-m-d");
                        $SQLInsert = "SELECT SUM(prezzo) AS speseannuali FROM transazioni WHERE ID_user='$id' AND (YEAR(dataTransazione)='$cyear') ";
                        $statement = $conn->prepare($SQLInsert);
                        $statement->execute();
                        if ($row = $statement->fetch()) {
                            $prezzoannuale = $row['speseannuali'];
                        }
                    } catch (PDOException $e) {
                        echo $e;
                    }
                    ?>
                    <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $prezzoannuale; ?>">
                        <span class="percent">
                            <?php if ($prezzoannuale == "") {
                                echo "0";
                            } else {
                                echo $prezzoannuale;
                            } ?>
                        </span>
                    </div>

                </div>
            </div>
        <!--spese totali-->
        <div class="col-xs-6 col-md-3" style="margin-top:2%">
                <div class="tondeggia">
                    <h4>spese totali</h4>
                    <?php
                    try {
                        $SQLInsert = "SELECT SUM(prezzo) AS spesetotali FROM transazioni WHERE ID_user='$id' ";
                        $statement = $conn->prepare($SQLInsert);
                        $statement->execute();
                        if ($row = $statement->fetch()) {
                            $prezzototale = $row['spesetotali'];
                        }
                    } catch (PDOException $e) {
                        echo $e;
                    }
                    ?>
                    <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $prezzototale; ?>">
                        <span class="percent">
                            <?php if ($prezzototale == "") {
                                echo "0";
                            } else {
                                echo $prezzototale;
                            } ?>
                        </span>
                    </div>

                </div>
            </div>

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/chart-data.js"></script>
        <script src="js/easypiechart.js"></script>
        <script src="js/easypiechart-data.js"></script>



</body>

</html>