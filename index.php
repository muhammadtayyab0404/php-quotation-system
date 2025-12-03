<?php
require_once('database.php');
require 'vendor/autoload.php';

use NumberToWords\NumberToWords;

?>

<html>

<head>
  
    <link href="/index.css" rel="stylesheet">

</head>

<body>

<?php
$timer =0;
if($conn){
  $queryy= "SELECT id,second,type,heading,para,position FROM popup WHERE active='1'" ;
  if($conn->query($queryy)){
    $res=$conn->query($queryy);

    if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
            $iid=$row['id'];
            $time=$row['second'];
            $type=$row['type'];
            $head=$row['heading'];
            $para=$row['para'];
            $position=$row['position'];
            
            $timer=$timer +$time;

            $numberToWords = new NumberToWords();
            $numberTransformer = $numberToWords->getNumberTransformer('en');
            $clas= $numberTransformer->toWords($iid);
            $classname = str_replace([" ", "-"], "", $clas);
         

            ?>
             <div class="container  ">
        
            <div class="popup hidepopup" id="popup_<?php echo $classname; ?>">
                <img src="tick.png" alt="yamaha" >
                <h2><?php echo $head; ?></h2>
                <p><?php echo $para; ?></p>
                <button onclick="closepopup('popup_<?php echo $classname; ?>')" type="button">OK</button>

            </div>

            <style>
                #popup_<?php echo $classname ?>
                {

                    left:<?php echo $position?>%;

                }


            </style>

             <script>
                window.addEventListener('DOMContentLoaded', () => {


                    let popup= document.getElementById('popup_<?php echo $classname ?>');
                        
                   
                    var cc=<?php echo $timer ?>;

                
                    if (cc>0){

                        

                        setTimeout(()=>{

                        hideAllPopups();

                    popup.classList.remove('hidepopup');
                    popup.classList.add('showpopup');

                     },cc)



                     

                    console.log(cc);

                    }
                    
                     })

                     
                     
                     ;
                </script> 

        </div>
            <?php
           

                        
        }
    }

  }
}

?>








</body>
<div  style="text-align:center; margin-top:80px; background-color:wheat; ">
    <a href="login.php" 
       style="font-size:28px; color:#1565c0; text-decoration:none; font-weight:bold;">
       Login
    </a>
    <br><br>
    <a href="register.php" 
       style="font-size:28px; color:#00897b; text-decoration:none; font-weight:bold;">
       Register
    </a>
</div>



</body>
<script>

function closepopup(id){
let popup = document.getElementById(id);
if(popup){

popup.classList.remove('showpopup');
 popup.classList.add('hidepopup');  
}

                    }

function hideAllPopups(){
    document.querySelectorAll('.popup').forEach(p=>{
    p.classList.remove('showpopup');
    p.classList.add('hidepopup');
    })
}


</script>
</html>

