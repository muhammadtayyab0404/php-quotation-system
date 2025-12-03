


<?php
require_once ('database.php');
require ('vendor/autoload.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

?>



<div class="login-container">
    <h2 class="text-center mb-4">Register</h2>

    <?php if($error != ""): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email"  class="form-control" placeholder="Enter Email" required>
        </div>
        <div class="mb-3">
            <label for="psw" class="form-label">Password</label>
            <input type="password" name="psw" class="form-control" placeholder="Enter Password" required>
        </div>
        <button type="submit" name="submit" value="Submit" class="btn btn-success w-100">Register</button>
    </form>

    <div class="text-center mt-3">
        <a href="login.php" class="btn btn-warning">Already Have a Account!! Login</a>
    </div>
</div>






<?php
if(isset($_SESSION)){
    session_unset();
}
if(isset($_POST['submit'])){
 


$email=$_POST["email"];
$pass=$_POST["psw"];
$recname='XYZ';


 session_start();

$_SESSION["mail"]= $email; 

if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
    
       $randomnumber= rand(1000,9999);
       
        echo  "Email is  $email ";
        $mail= new PHPMailer(true);
        try {
        
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'darkskeleton1122@gmail.com';                     //SMTP username
        $mail->Password   = 'ntnhycdfmvczfpeu';                               //SMTP password
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        
        $mail->setFrom('darkskeleton1122@gmail.com', 'Malik');
        $mail->addReplyTo('darkskeleton1122@gmail.com', 'Malik');
        $mail->addAddress($email,$recname);     //Add a recipient

        
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body  <b>Your OTP is ' .$randomnumber. '</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
 

        dbconn($email,$pass,$randomnumber,$conn);
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


    }
    else
    {
      echo $error="email is incorrect";
      header(header: "Refresh:3; index.php" ); 
      exit();      
    }
}

function dbconn($email,$pass,$randomnumber,$conn){

if($conn){
    
echo "<h1> db connected </h1>";

 $queryy= "INSERT INTO website (email, pass, otp, expdate) VALUES ('$email', '$pass', '$randomnumber', '2024-12-31')"; 
         
    if ($conn->query($queryy)){

       echo"<script>window.location.href='/abc.php'</script>";

        exit;
    }else{
    echo "conn is not successful";
    }

}else
{
echo"u are not connected";
}





}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</div>
</html>

