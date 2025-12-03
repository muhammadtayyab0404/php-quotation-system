<?php
session_start();
require_once('database.php');
require 'vendor/autoload.php';

$eemail=$_SESSION['mail'];


if($conn){
    $queryy= "SELECT * FROM website  WHERE email='$eemail'";
    if($conn->query($queryy)){
        $result=$conn->query($queryy);
        if($result->num_rows>0){

           while( $row=$result->fetch_assoc()){
            $email=$row['email'];
            $data= json_decode( $row['detailjson']);

           
            
           }
            

        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Quotation</h1>
            <p>Date: <span id="date">2025-11-19</span></p>
        </header>

        <section class="customer-info">
            <h2>Customer Details</h2>
            <p>Email: <?php echo $email ?></p>
        </section>

        <section class="quotation-items">
            <h2>Quotation Items</h2>
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                   
                   <?php
                     foreach($data as $dataa){
                        echo "
                    <tr>
                        <td>$dataa->proname</td>
                        <td>1</td>
                        <td>$$dataa->proprc</td>
                        <td>$$dataa->proprc</td>
                    </tr>";
                    $prc = $dataa->proprc;
                    $totalprc= $totalprc +$prc; 
                     }
                   ?>


                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Grand Total</td>
                        <td>$<?php echo $totalprc ?></td>
                    </tr>
                </tfoot>
            </table>
        </section>

        <section class="terms">
            <h2>Terms & Conditions</h2>
            <ol>
                <li>Payment due within 30 days of invoice.</li>
                <li>Quotation is valid for 15 days from the date issued.</li>
                <li>All work will be delivered according to agreed specifications.</li>
                <li>Any additional services will be charged separately.</li>
            </ol>
        </section>

        <footer>
            <p>Thank you for your business!</p>
        </footer>

        <a href="dowlaodpdf.php" class="no-pdf" > Dowload pdf</a>
        <div class="movebutton">
        <button><a href="addproduct.php" class="backbutton"> Back</a></button>
        </div>
    </div>
</body>
</html>

<style>
.backbutton{
    font-size: 20px;
    
    
}
.movebutton{
margin-left:700px ;
margin-top:-20px ;
}

</style>
