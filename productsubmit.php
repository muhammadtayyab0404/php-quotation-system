
<?php
session_start();
require_once('database.php');

if(isset($_POST['proname'])){

    $productname=$_POST['proname'];
    $productprc=$_POST['proprice'];

    foreach ($productname as $i=>$proname){
        echo $proname.'ppp'.$productprc[$i];
        $data[$i]['proname']=$proname;
        $data[$i]['proprc']=$productprc[$i];
    }

    $emaill=trim($_SESSION['mail']);
    $_SESSION['data']=$data;

    $jsondata=json_encode($data);

    if($conn){
        $queryy= "UPDATE website SET detailjson= '$jsondata' WHERE email='$emaill'"; 
        if($conn->query($queryy)){
            echo "query success";
        }
    }
}

?>