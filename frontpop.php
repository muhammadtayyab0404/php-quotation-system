<?php
require_once('database.php');


    if(isset($_POST['time'])){
        $time=$_POST['time'];
        $type=$_POST['type'];
        $head=$_POST['heading'];
        $para=$_POST['para'];
        $position=$_POST['position'];
        $status=$_POST['status'];



      if($conn){ 
        $queryy="INSERT INTO popup (second, type, heading, para,position,active) VALUES ('$time','$type', '$head', '$para', '$position', '$status')";

        if($conn->query($queryy)){
            echo "successful";
            
        }
      

      }
    
}


?>