<?php
require_once 'source/db_connect.php';
require_once 'source/session.php';
/*function GetId(){
    require_once 'source/db_connect.php';
    require_once 'source/session.php';


    $id='';
    try {
        $SQLInsert = "SELECT id FROM users ORDER BY id DESC LIMIT 1;";
        $statement=$conn->prepare($SQLInsert);
        $statement->execute();
        if($row = $statement->fetch()){
            $id = $row['id'];
            
        }
        else {
            echo "Error: non riuscito";
            

          }
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    return $id;

    }*/


if(isset($_POST['invio'])) {
    $Cardnumber=$_POST['number'];
    $nomeCognome=$_POST['name'];
    $expirationDate=$_POST['expiry'];
    $civ=$_POST['cvv'];
    include_once 'source/GetId.php';
    $conto=8000;

    try{
        $SQLInsert="INSERT INTO creditcard (id_user,Cardnumber,nomeCognome,expirationDate,civ) 
        VALUES ($id,:Cardnumber,:nomeCognome,:expirationDate,:civ)";
        $statement=$conn->prepare($SQLInsert);
        $statement->execute(array(':Cardnumber'=> $Cardnumber,'nomeCognome'=>$nomeCognome,'expirationDate'=> $expirationDate,'civ'=>$civ));

        $SQLInsert1="INSERT INTO soldi (user_id,conto) 
        VALUES ($id,:conto)";
        $statement1=$conn->prepare($SQLInsert1);
        $statement1->execute(array(':conto'=> $conto));
        

        
        if($statement->rowCount()==1){
            
            header('location: index.html');
        }
    }
    catch(PDOException $e){
        echo "ERROR: ".$e->getMessage();
    }
}
