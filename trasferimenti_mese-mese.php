<?php
require_once 'source/db_connect.php';
require_once 'source/session.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Transazioni da... a</title>
    <link rel="stylesheet" href="css/style1.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style3.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <?php if (!isset($_SESSION['username'])) : header("location: logout.php"); ?>
    <?php else : ?>
    <?php endif ?>
</head>

<body>
    <?php include_once "source/header.php" ?>
    <div class="home_content">
        <?php echo "<h1 style=color:#f1a566;  align='center'>scegli " . $_SESSION['username'] . " da che data a che data vedere le transazioni </h1>" ?>
        <div class="panel-body">
            <div class="col-xs-12 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                <div class="tondeggia">
                    <form method="post" action="seetransazioni.php">
                    <div class="form-group">
                    <label>DATA INIZIALE</label>
                        <input type="date" name="data1" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label>DATA FINALE</label>
                        <input type="date" name="data2" class="form-control" required>
                    </div>
                        <div class="form-group has-success">
                            <input type="submit" class="btn btn-primary" style="background-color:#f1a566" value="invia data">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</body>


</html>