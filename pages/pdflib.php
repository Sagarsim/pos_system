<?php

require_once '../dompdf/autoload.inc.php';
Dompdf\Autoloader::register();
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
//$dompdf->loadHtml('');
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if(isset($_POST['detailbtn'])){
    ob_start();
include 'bill.php';
$output = ob_get_clean();
$dompdf->loadHtml($output);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A3', 'portrait');

} 
elseif(strpos($url, 'file=users') !== false){
    ob_start();
include 'export_pdf.php';
$output = ob_get_clean();
$dompdf->loadHtml($output);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A3', 'portrait');

} 
elseif(strpos($url, 'file=items') !== false){
    ob_start();
include 'export_pdf2.php';
$output = ob_get_clean();
$dompdf->loadHtml($output);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A3', 'portrait');

} 
elseif(strpos($url, 'file=stocks') !== false){
    ob_start();
include 'export_pdf3.php';
$output = ob_get_clean();
$dompdf->loadHtml($output);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A3', 'portrait');

} 
elseif(strpos($url, 'file=customers') !== false){
    ob_start();
include 'export_pdf4.php';
$output = ob_get_clean();
$dompdf->loadHtml($output);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A2', 'portrait');

} 




// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();


?>