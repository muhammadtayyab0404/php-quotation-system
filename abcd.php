<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="/bootstrap.css" rel="stylesheet">
  </head>

<?php
echo "<br><h1 class='text-center zbc'> This is Successfull OTP LOGIN Page </h1>";
session_start();
?>

<form action="<?php echo $_SERVER["PHP_SELF"];?>"  method="POST">
  <div class="text-center">
<button name="button" class="btn btn-danger " >Log Out</button>
</div>
</form>

<?php

if(isset($_POST['button'])){
 

    var_dump($_SESSION);
    unset($_SESSION["mail"]);
  echo"<script>document.cookie='PHPSESSID=; path=/;'</script>";
    echo"after deletion:::";
    var_dump($_SESSION);
 

}

?>
  <div class="text-center">

<a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover  lgg" href="login.php"  >COntinue to Login</a>
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>