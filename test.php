<?php
include 'Db.php';
//header('application/json');

if(isset($_POST['id'])){
   $names=[];
    
   $id=$_POST['id']; 
   $conn = Db::getConn();

   $stmt = $conn->prepare('SELECT full_name FROM zaposleni WHERE country_id = :id');
   $stmt->bindValue('id',$id);
   $stmt->execute();
   $stmt->setFetchMode(\PDO::FETCH_ASSOC);

   $contact = $stmt->fetchAll();
    
     foreach($contact as $k) { 

        $names[] = $k['full_name'];
     }

    echo json_encode($names);

}


