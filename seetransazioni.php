<?php
include_once 'source/session.php';




?>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Transazioni</title>
    <link rel="stylesheet" href="css/style1.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/tabelle.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <?php if (!isset($_SESSION['username'])) : header("location: logout.php"); ?>
    <?php else : ?>
    <?php endif ?>

</head>

<body>
    <?php include_once "source/header.php" ?>
  
    <div class="home_content">
    <?php echo "<h1 style=color:#f1a566 align=center> " . $_SESSION['username'] . " Queste sono le tue transazioni </h1>" ?>
        <div class="col-xs-12 col-md-12 col-md-offset-1 col-lg-12 col-lg-offset-3" style="top:10%">


            <table class="table4">
                <thead>
                    <tr>
                        <th>Oggetto</th>
                        <th>Prezzo</th>
                        <th>Tipo processo</th>
                        <th>Destinatario</th>
                        <th>Data transazione</th>
                    </tr>
                </thead>
                <?php include_once 'GETtransazioni.php' ?>
            </table>
        </div>
    </div>
    </div>

</body>

</html>