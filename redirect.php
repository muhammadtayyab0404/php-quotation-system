
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="/bootstrap.css" rel="stylesheet">
  </head>
<body>
  <section class="sectionss">
  <br>
  <h1 class='text-center zbc '> </h1 >
<?php
 session_start();
  echo "<br>";

 
if(isset($_SESSION["mail"])){

?>
<div class="redirectheight">
  <div class="redirectppop" id="showpopup" >
<p class="reddirecttxt"> User is Logged in as: <span class="changetxtcolor"><?php echo $_SESSION["mail"] ?> </span></p>

<h1 class='text-center'><a class='link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover  lgga' href=addproduct.php> Add Product</a></h1>
<h1 class='text-center'><a class='link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover  lgga' href=popup.php> Popup </a></h1>
</div>
</div>

   



<?php
}    
    
?>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>

<script>

  window.onload= function(){
    
let popup = document.getElementById("showpopup");
    
if(popup){

  setTimeout(showpopup() ,2000)
console.log(popup);

  
    
}

 
function showpopup(){
  console.log('showpopup is working');

   popup.classList.add("openthepopup");

console.log(popup);

 
  }

}


</script>


