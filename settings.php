<?php

include_once 'source/session.php';

?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/style4.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <title>settings</title>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <?php include_once "source/header.php" ?>

    <?php if (!isset($_SESSION['username'])) : header("location: logout.php"); ?>
    <?php else : ?>
    <?php endif ?>

    <div class="home_content">
        <div><?php echo "<h1 style=color:#f1a566 align='center';> Qua  " . $_SESSION['username'] . " puoi vedere i tuoi dati </h1>" ?></div>

        <div class=" col-xs-12 col-md-6 col-md-offset-3 col-lg-5 col-lg-offset-3">
            <div class="tondeggia">
                <div class="card" style="position: unset;">
                    <div class="face front">



                        <h3 class="debit">Carta di credito</h3>



                        <img class="chip" src="img/chip.png" alt="chip">


                        <h3 class="number"><?php include_once 'source/Getcardnumber.php' ?></h3>


                        <h5 class="valid"><span>valid thru <br /> <?php include_once 'source/GetCarddate.php' ?></span><span></span></h5>


                        <h5 class="card-holder"><?php echo $_SESSION['username'] ?></h5>




                    </div>
                    <div class="face back">
                        <div class="blackbar"></div>
                        <div class="cvvtext">
                            <div class="white-bar"></div>
                            <div class="cvv"><?php include_once 'source/Getcvv.php'  ?></div>
                        </div>
                        <p class="text">
                            questa carta &#232; di propriet&#224; di DAILYBANK.<br> In caso di ritrovamento si prega di restituirla ad una delle filiali della banca. Consulta l'elenco su iltemuto.com<br> Servizio clienti: 3926571026
                        </p>

                    </div>
                    <div>

                    </div>

                </div>


            </div>
            <div class="tondeggia"><?php include_once 'source/GETdatipersonali.php' ?>
                <div style="display: inline-block">
                    <input type="submit" class="btn btn-primary" style="background-color:#f1a566" id="cambia" name="password_change" value="cambia password">
                </div>
                <div style="display: inline-block; margin-left:35%">
                    <input type="submit" style="background-color:#f1a566" id="prova" value="cancella_account" class="btn btn-primary" style="width:30%;">
                </div>

                <form action="cambia_password.php" method="post">
                    <div id="creare" style="flex:right">
                    </div>
                </form>
                
                <form method="post" name="elimina">
                </form>
            </div>

        </div>
    </div>

    <script>
        var a = document.getElementById("cambia");
        var cancellare = document.getElementById("prova");

        function cambia() {
            var div = document.createElement('div');
            var div1 = document.createElement('div');
            var div2 = document.createElement('div');
            div.id = 'old_password';
            div1.id = 'new_password';
            div2.id = 'invia';
            div.innerHTML += '<label>old_password</label><input type="passswrod" name="old_password" class="form-control" style="width:30%;" required autocomplete="off">'
            div1.innerHTML += '<label>new_password</label><input type="password" name="new_password" class="form-control" style="width:30%;" required autocomplete="off"><br>'
            div2.innerHTML += '<input type="submit" name="submit" style="background-color:#f1a566" class="btn btn-primary" style="width:30%;" required><br>'
            document.getElementById("creare").appendChild(div);
            document.getElementById("creare").appendChild(div1);
            document.getElementById("creare").appendChild(div2);
            a.remove();
        }

        function cancella() {
            var c = confirm("vuoi seriamente cancellare l'account?");
            if (c == true) {
                document.elimina.action = "elimina_account.php";
                document.elimina.submit();
            } else {
                alert("account non eliminato");
            }
        }

        a.onclick = cambia;
        cancellare.onclick = cancella;
    </script>
</body>

</html>