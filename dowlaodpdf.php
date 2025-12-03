<?php
require 'vendor/autoload.php';

use Dompdf\Options;
use Dompdf\Dompdf;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('defaultFont', 'DejaVu Sans');



ob_start();
include 'agg.php';

$css= "<style>
.no-pdf { display: none; }
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 40px auto;
    background: #fff;
    padding: 30px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

header {
    text-align: center;
    border-bottom: 2px solid #333;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

header h1 {
    margin: 0;
}

.customer-info, .quotation-items, .terms {
    margin-bottom: 30px;
}

.customer-info p, .terms li {
    margin: 5px 0;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}

table thead {
    background-color: #f0f0f0;
}

table tfoot td {
    font-weight: bold;
}

footer {
    text-align: center;
    font-style: italic;
    border-top: 2px solid #333;
    padding-top: 10px;
}

</style>";
$html=$css. ob_get_clean() ;


$dompdf = new Dompdf($options);
$dompdf->setPaper('A4', 'portrait');

$dompdf->loadHtml($html);


// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>