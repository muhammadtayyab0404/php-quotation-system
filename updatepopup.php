<?php
require_once('database.php');

if(isset($_POST['idd'])){
$id = $_POST['idd'];
$status = $_POST['status'];

 if($conn){ 
  $queryy="UPDATE popup SET active='$status' WHERE id='$id' ";

  if($conn->query($queryy)){
  echo "successful";
            
    }
      

    }
    


echo"Halla .;".$id;
}
?>