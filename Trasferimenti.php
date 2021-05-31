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
    <link rel="stylesheet" href="css/style3.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <?php if (!isset($_SESSION['username'])) : header("location: logout.php"); ?>
    <?php else : ?>
    <?php endif ?>



</head>

<body>
    <?php include_once "source/header.php" ?>
    <div class="home_content">
        <?php echo "<h1 style=color:#f1a566> Benvento " . $_SESSION['username'] . " alla pagina delle transazioni </h1>" ?>

        <div class="panel-body">
            <div class="col-xs-12 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4" style="width:508px">

                <form class="tondeggia" role="form" method="post" name="invia">
                    <div class="form-group">
                        <label>Oggetto</label>
                        <input type="text" class="form-control" name="Ogetto" placeholder="ogetto" style="width:30%;" required>
                    </div>
                    <div class="form-group">
                        <label>Prezzo</label>
                        <input type="number" id="prezzo" name="Prezzo" placeholder="prezzo" class="form-control" style="width:30%;" min="1" required>
                    </div>

                    <div class="form-group">
                        <label>Tipo processo</label>
                        <select name="seleziona" class="form-control" id="seleziona" style="width:30%;">
                            <option value="trasferimento">Trasferimento</option>
                            <option value="comprare">Acquistato</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Destinatario</label>
                        <select name="Destinatario" id="destinatario" class="form-control" style="width:30%;" required>
                            <?php include_once 'source/GETdestinatario.php' ?>
                            <!-- Robo php per <option> -->
                        </select>
                        <!--<input type="text" name="Destinatario" id="destinatario" placeholder="Destinatario" class="form-control" style="width:30%;" required>-->
                    </div>
                    <div class="form-group">
                        <label>Data transazione</label>
                        <input type="date" name="dataTransazione" id="datefield" min='' max='' class="form-control" style="width:30%;" required>
                    </div>

                    <div id="creare">
                    </div>



                    <div class="form-group has-success">
                        <input type="submit" id="controlla" class="btn btn-primary" style="background-color:#f1a566" name="prova" value="Add">
                    </div>
                </form>

            </div>
        </div>


    </div>






    <?php if (!isset($_SESSION['username'])) : header("location: logout.php"); ?>
    <?php else : ?>
    <?php endif ?>




    <script>
        var a = document.getElementById("seleziona");
        const dest = document.getElementById('destinatario');
        var prezzo = document.getElementById("prezzo");
        var pulsante=document.getElementById("controlla");


        function test() {
            if (a.value === "comprare") {
                var div = document.createElement('div');
                var div1 = document.createElement('div');
                div.id = 'iban';
                div1.id = 'nomeazienda';
                div.innerHTML += '<label>iban</label><input type="text" name="iban" class="form-control" style="width:30%;" required>'
                div1.innerHTML += '<label>nome azienda</label><input type="text" name="nomezienda" class="form-control" style="width:30%;" required><br>'
                document.getElementById("creare").appendChild(div);
                document.getElementById("creare").appendChild(div1);

                const sel = document.createElement('div');
                dest.style.display = 'none';
                dest.removeAttribute('name');
                dest.removeAttribute('required');
                sel.id = "destinatario-sel";
                sel.innerHTML += '<input type="text" name="Destinatario" id="destinatario" placeholder="Destinatario" class="form-control" style="width:30%;" required>'
                dest.parentElement.appendChild(sel);

            } else {
                var elem = document.getElementById("iban");
                var elem1 = document.getElementById("nomeazienda");
                if (elem) {
                    elem.remove();
                    elem1.remove();
                }

                const sel = document.getElementById('destinatario-sel');
                if (sel) {
                    sel.remove();
                    dest.style.display = 'block';
                    dest.setAttribute('required', true);
                    dest.setAttribute('name', 'Destinatario');

                }
            }
        }

        function date() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }

            today = yyyy + '-' + mm + '-' + dd;
            document.getElementById("datefield").setAttribute("max", today);
        }

        function datamin() {
            var datamese = new Date();
            var dd = datamese.getDate();
            var mm = datamese.getMonth();
            var yyyy = datamese.getFullYear();
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = yyyy + '-' + mm + '-' + dd;
            document.getElementById("datefield").setAttribute("min", today);

        }
        function controlloprezzo(){
            if(prezzo.value>8000){
                alert("il valore di un oggetto non può essere superiore a 80000euro");
            }
            else{
                document.invia.action= "sendTransazioni.php";
                document.invia.submit();

            }
        }


        date();
        datamin();
        pulsante.onclick= controlloprezzo;
        a.onchange = test;
        test();
    </script>

</body>

</html>