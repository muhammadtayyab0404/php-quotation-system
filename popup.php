<?php
require_once('database.php');
?>
<html>
  <head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/allpop.css" rel="stylesheet">

</head>
<body>
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Add New Popup</h2>


        <form id="form01"  method="post">

           
            <div class="mb-3">
                <label class="form-label fw-bold">Enter the Heading</label>
                <input type="text" name="heading" class="form-control" placeholder="Popup Heading">
            </div>

           
            <div class="mb-3">
                <label class="form-label fw-bold">Enter the Text</label>
                <input type="text" name="para" class="form-control" placeholder="Popup Text">
            </div>

       
            <div class="mb-3">
                <label class="form-label fw-bold">Select the Popup Time</label>
                <div class="form-check">
                    <input type="radio" id="time3" name="time" value="3000" class="form-check-input">
                    <label for="time3" class="form-check-label">3 seconds</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="time5" name="time" value="5000" class="form-check-input">
                    <label for="time5" class="form-check-label">5 seconds</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="timeAlways" name="time" value="0" class="form-check-input">
                    <label for="timeAlways" class="form-check-label">Always</label>
                </div>
            </div>

         
            <div class="mb-3">
                <label class="form-label fw-bold">Select the Popup Type</label>
                <div class="form-check">
                    <input type="radio" id="typeFlash" name="type" value="flash" class="form-check-input">
                    <label for="typeFlash" class="form-check-label">Flash</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="typeStraight" name="type" value="straight" class="form-check-input">
                    <label for="typeStraight" class="form-check-label">Straight</label>
                </div>
            </div>

      
            <div class="mb-3">
                <label class="form-label fw-bold">Select the Popup Position</label>
                <div class="form-check">
                    <input type="radio" id="posRight" name="position" value="20" class="form-check-input">
                    <label for="posRight" class="form-check-label">Right</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="posCenter" name="position" value="50" class="form-check-input">
                    <label for="posCenter" class="form-check-label">Center</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="posLeft" name="position" value="80" class="form-check-input">
                    <label for="posLeft" class="form-check-label">Left</label>
                </div>
            </div>

   
            <div class="mb-3">
                <label class="form-label fw-bold">Select the Active Status</label>
                <div class="form-check">
                    <input type="radio" id="activeYes" name="status" value="1" class="form-check-input">
                    <label for="activeYes" class="form-check-label">Active</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="activeNo" name="status" value="0" class="form-check-input">
                    <label for="activeNo" class="form-check-label">Not Active</label>
                </div>
            </div>

        
            <div class="d-grid gap-2 mt-4">
                <button type="submit" name="newpop" class="btn btn-success">Submit</button>
                <a href="allpopups.php" class="btn btn-primary">View All Popups</a>
            </div>

        </form>
    </div>
</div>


<div>
<div class=" text-center mmnnhh" id="poppupid">
  <h4>Pop up added successfully</h4>
  <button id="poopupbtn" class="btn btn-success zzz"> OK</button>
</div>

</div>

<script>

document.getElementById("form01").addEventListener('submit',function(e){
    e.preventDefault();

    const form = this;
    const  formdata = new FormData(form);

    fetch("frontpop.php",{
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


        poopup.classList.add("mmnnhhss");
    }

})
})



parentdiv =document.getElementById("poppupid");
buttonid =document.getElementById("poopupbtn");


buttonid.addEventListener('click',()=>{

parentdiv.remove();
}

);

</script>


</body>
</html>







