<?php
session_start();
require_once('database.php'); 

$error = ""; 
if(isset($_POST["submit"])){
    $email = $_POST['email'];
    $pass  = $_POST['psw'];

    if($conn){
        $query = "SELECT email, pass FROM website WHERE email='$email' AND pass='$pass' LIMIT 1";
        $result = $conn->query($query);

        if($result && $result->num_rows > 0){
            $_SESSION["mail"] = $email; 
            session_write_close(); 
            header('Location: redirect.php'); 
            exit;
        } else {
            $error = "Incorrect email or password";
        }
    } else {
        $error = "Database connection failed!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">


<style>
  body{
    background-color: rgb(235, 238, 255);
  }



.login-containerhh {
    width: 500px;
    margin: 50px auto;
    padding: 25px;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
    position: absolute;
    top: 0%;
    left: 40%;
    visibility: hidden;
}

.login-containerss {
    width: 500px;
    margin: 50px auto;
    padding: 25px;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
    position: absolute;
    top: 15%;
    left: 40%;
    visibility: visible;
    transition: top 1.4s ease-out;

}



</style>

</head>

<body>
<div >
<div class="login-containerhh"  id="loginpop">
    <h2 class="text-center mb-4">Login</h2>

    <?php if($error != ""): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
        </div>
        <div class="mb-3">
            <label for="psw" class="form-label">Password</label>
            <input type="password" name="psw" class="form-control" placeholder="Enter Password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success w-100">Login</button>
    </form>

    <div class="text-center mt-3">
        <a href="register.php" class="btn btn-warning">Register</a>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




<script>

  window.onload= function(){
    
let popup = document.getElementById("loginpop");
console.log(popup);    
if(popup){

  setTimeout(showpopup ,2000)
  
    
}

 
function showpopup(){
  console.log('showpopup is working');

   popup.classList.add("login-containerss");
  setTimeout(()=>{
popup.classList.remove("login-containerhh");
  } ,1000 )
console.log(popup);

 
  }

}


</script>