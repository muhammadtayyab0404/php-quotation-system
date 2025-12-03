<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="/bootstrap.css" rel="stylesheet">
  </head>

<?php
require_once ('database.php');

session_start();
?>
<h1 class="text-center">OTP Page </h1> 

<form class="text-center" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<label ><b>Enter The Otp</b></label>
<input type="number" name="otpplace" placeholder="Enter the OTP"> </input>

<button class="btn btn-success" name="submit" value="submit">Submit</button>
</form>

<?php


if(isset($_POST['submit'])){

$cureentotp=$_POST["otpplace"];
echo $cureentotp. "hhhh";

session_start();

if(!empty($_SESSION["mail"])){

 echo $_SESSION["mail"];
 $recentmail=$_SESSION["mail"];
 
 
 //

 if($conn){
    

 $queryy= "SELECT email,otp,id FROM website WHERE email= '$recentmail' ORDER BY id DESC LIMIT 1" ;
    

  $result=($conn->query($queryy));
             
    if ($result->num_rows>0){
    
        $row=$result->fetch_assoc();

        echo "mail is" .$row["email"];
        echo "otp is" .$row["otp"];
        
        if($row["otp"] == $cureentotp){

       header('Location: abcd.php');
        }else
        {
            echo"<h1>OTP Is Incorrect</h1>";
        }


    }else{
    echo "conn is not successful";
    }

}else
{
echo"u are not connected";




 unset($_SESSION["mail"]);
}

}
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>