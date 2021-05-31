<?php
require_once 'source/db_connect.php';
require_once 'source/session.php';

function alert()
{
  echo "<script>confirm('non vi sono abbastanza soldi per fare questo acquiesto')</script>";
}

/*ho fatto in questo modo solo per creare un atabella in più, ma teoricamente ho pensato che sarebbe stato meglio 
creare un altro attrubuto per vedere se è un acquisto o una transazione di soldi.*/
if (isset($_POST['prova'])) {
  $Oggetto = $_POST['Ogetto'];
  $prezzo = $_POST['Prezzo'];
  $Destinatario = $_POST['Destinatario'];
  $dataTransazione = $_POST['dataTransazione'];
  $id = $_SESSION['id'];
  $seleziona = $_POST['seleziona'];

  include_once 'source/GETcontoutentesessione.php';

  //INSERIRE IL FILE PHP PER LA QUERY DE CONTO
  //inserimento nella tabella ziende del iban e del nome dell'azienda





  try {
    if ($_SESSION['conto'] - $prezzo < 0) {
      alert();
    } else {
      $contoeseguito = $conto - $prezzo;
    }

    if ($seleziona == 'trasferimento') {
      $seleziona = true;
    } else {
      $seleziona = false;
    }
    if (!$seleziona) {
      $iban1 = '';
      $iban = $_POST['iban'];
      $nomeazienda = $_POST['nomezienda'];
      $SQLInsert5 = "SELECT iban FROM aziende WHERE iban='$iban'";
      $statement = $conn->prepare($SQLInsert5);
      $statement->execute();
      if ($row = $statement->fetch()) {
        $iban1 = $row['iban'];
      }


      if ($iban != $iban1 && $contoeseguito > 0) {
        $SQLInsert1 = "INSERT INTO aziende (iban,nomeazienda) VALUES (:iban,:nomeazienda)";
        $statement = $conn->prepare($SQLInsert1);
        $statement->execute(array(':iban' => $iban, 'nomeazienda' => $nomeazienda));
      } else {
        alert();
        header('location: Trasferimenti.php');
      }
    }


    //AGGIORNARE IL SALDO DI UN UTENTE
    $SQLInsert2 = "UPDATE soldi SET conto=$contoeseguito WHERE user_id='$id'";
    $statement = $conn->prepare($SQLInsert2);
    $statement->execute();
    $_SESSION['conto'] = $_SESSION['conto'] - $prezzo;

    if ($seleziona) {
      //include_once file per prendere l'id della persona a cui l'utende vuole mandare dei soldi

      include_once 'source/GETidtrasferimento.php';

      include_once 'source/GETcontoother.php';

      $conto1 = (int)$conto1;
      $prezzo = (int)$prezzo;
      $aggiungi = $conto1 + $prezzo;
      $SQLInsert3 = "UPDATE soldi SET conto=$aggiungi WHERE user_id='$otherid'";
      $statement = $conn->prepare($SQLInsert3);
      $statement->execute();
    }

    $SQLInsert = "INSERT INTO transazioni (ID_user,dataTransazione ,Destinatario,Oggetto,prezzo,tipoTransazione) 
        VALUES ($id,:dataTransazione,:Destinatario,:Oggetto,:prezzo,:tipoTransazione)";
    $statement = $conn->prepare($SQLInsert);
    $statement->execute(array(':dataTransazione' => $dataTransazione, 'Destinatario' => $Destinatario, 'Oggetto' => $Oggetto, 'prezzo' => $prezzo, 'tipoTransazione' => $seleziona));

    if ($statement->rowCount() == 1) {
      header('location: Trasferimenti.php');
    }
  } catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
  }
}
