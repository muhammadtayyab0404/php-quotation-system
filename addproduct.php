<?php
session_start();
require_once('database.php');
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #f3f6ff;
        padding: 40px;
        font-family: Arial, sans-serif;
    }

    .card-customhh {
        border-radius: 15px;
        padding: 25px;
        background: #ffffff;
        box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.1);
        width: 700px;
        margin: auto;
        visibility: hidden;
        position: absolute;
        top: 0%;
        left: 35%;
    }


    .card-customss {
        border-radius: 15px;
        padding: 25px;
        background: #ffffff;
        box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.1);
        width: 700px;
        margin: auto;
        visibility: show;
        position: absolute;
        top: 20%;
        left: 35%;
        transition: top 1.4s ease-out;
    }



    .productinput {
        padding: 18px;
        border: 1px solid #d7d7d7;
        border-radius: 10px;
        margin-bottom: 15px;
        background: #fafbff;
        border: 2px solid black;
    }


    .itemsaddedpop{
        position: absolute;
        top: 90%;
        left:-20%;
        background-color: green;
        padding: 10 20px;
        width: 420px;
        border-radius: 15px;
        visibility: hidden;
        
    }
        .itemsaddedshow{
        position: absolute;
        top: 90%;
        left:0%;
        background-color: green;
        padding: 10 20px;
        width: 420px;
        border-radius: 15px;
        visibility: visible;
        transition: left 0.5s ;

        
    }



    .itemssadded p{
        justify-content: center;
        color: white;
        font-size: 22px;
        
    }
</style>

<div class="card-customhh" id="loginpop">
    <h2 class="text-center mb-4">Add Products</h2>
    

    <form  id="form01"  method="post">
        <div id="classcontainer">

            <div class="productinput" id="llmmn"> 
                <button type="button" class="btn-close" onclick="closess(this)"aria-label="Close"></button>
                <div class="mb-3">
                    <label class="form-label fw-bold">Enter the Product</label>
                    <input name="proname[]" class="form-control" placeholder="Product name">
                </div>

                <div class="mb-2">
                    <label class="form-label fw-bold">Enter the Price</label>
                    <input name="proprice[]" class="form-control" placeholder="Product price">
                </div>
            </div>

        </div>

        <button type="button" onclick="addmore()" class="btn btn-primary w-100 mt-3">
            + Add More Product
        </button>


        <button type="submit" name="submit" value='success' class="btn btn-success w-100 mt-3">
            Submit
        </button>
        


    </form>


    <a href="agg.php" class="text-decoration-none">
        <h4 class="text-center mt-4 text-primary">➡ Move towards the Agreement</h4>
    </a>

    <a href="redirect.php" class="text-decoration-none">
    <h4 class="text-center mt-4 text-danger">Back</h4>
    </a>
</div>


<div class="itemsaddedpop" id="poppupid">
    <div class="itemssadded">
        <p>Items added to Cotation Successfully</p>
    </div>
</div>

<script>
function addmore() {
    const container = document.getElementById("classcontainer");

    const newField = `
        <div class="productinput">
        <button type="button" class="btn-close" onclick="closess(this)"aria-label="Close"></button>
            <div class="mb-3">
                <label class="form-label fw-bold">Enter the Product</label>
                <input name="proname[]" class="form-control" placeholder="Product name">
            </div>

            <div class="mb-2">
                <label class="form-label fw-bold">Enter the Price</label>
                <input name="proprice[]" class="form-control" placeholder="Product price">
            </div>
        </div>
    `;

    container.insertAdjacentHTML("beforeend", newField);
}

function closess(btn){

    let element= btn.closest(".productinput");
    element.remove();

    
}

function itemsadded(){

    console.log("items has been submitted");

    return false;
}


</script>








<script>





  window.onload= function(){
    
let popup = document.getElementById("loginpop");
console.log(popup);    
if(popup){

  setTimeout(showpopup ,1000)
  
    
}

 
function showpopup(){
  console.log('showpopup is working');

   popup.classList.add("card-customss");
   popup.classList.remove("card-customhh");

console.log(popup);

 
  }

}



document.getElementById("form01").addEventListener('submit',function(e){
    e.preventDefault();

    const form = this;
    const  formdata = new FormData(form);

    fetch("productsubmit.php",{
        method: "POST",
        body: formdata


    })
    .then (response => response.text())
     .then(data => {
        console.log("Server Response:", data);

    history.pushState(null, "", "status=success");

    form.reset();


    const poopup=document.getElementById("poppupid");
    if (poopup){


        poopup.classList.add("itemsaddedshow");
    }

})
})


</script>


<?php

if(isset($_GET['status'])){
    echo"aasadssdsad";
}

?>
