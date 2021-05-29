<?php
require_once 'source/db_connect.php';
require_once 'source/session.php';

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
  $prova = $conto- $prezzo;
  //INSERIRE IL FILE PHP PER LA QUERY DE CONTO

  if ($seleziona == 'trasferimento') {
    $seleziona = true;
  } else {
    $seleziona = false;
  }
  try {
    //inserimento nella tabella ziende del iban e del nome dell'azienda
    if ($seleziona != 'trasferimento') {
      $iban = $_POST['iban'];
      $nomeazienda = $_POST['nomezienda'];
      $SQLInsert1 = "INSERT INTO aziende (iban,nomeazienda) 
        VALUES (:iban,:nomeazienda)";
      $statement = $conn->prepare($SQLInsert1);
      $statement->execute(array(':iban' => $iban, 'nomeazienda' => $nomeazienda));
    }

    //AGGIORNARE IL SALDO DI UN UTENTE
    $SQLInsert2 = "UPDATE soldi SET conto=$prova WHERE user_id=$id";
    $statement = $conn->prepare($SQLInsert2);
    $statement->execute();
    $_SESSION['conto'] = $_SESSION['conto'] - $prezzo;

    if ($seleziona == 'trasferimento') {
      //include_once file per prendere l'id della persona a cui l'utende vuole mandare dei soldi

      include_once 'source/GETidtrasferimento.php';

      include_once 'source/GETcontoother.php';
      
      $conto1 = (int)$conto1;
      $prezzo = (int)$prezzo;
      $aggiungi = $conto1 + $prezzo;
      $SQLInsert3 = "UPDATE soldi SET conto=$aggiungi WHERE user_id=$otherid";
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
