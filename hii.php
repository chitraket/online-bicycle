<?php

require_once 'dompdf/autoload.inc.php'; 
 
use Dompdf\Dompdf; 
$dompdf = new Dompdf();
$order_id=$_GET['o_id'];
$html='hii';
$html .='order_id='.$order_id.'';                     
$dompdf->loadHtml($html); 
$dompdf->setPaper('A4', 'landscape'); 
$dompdf->render(); 
$dompdf->stream("codexworld", array("Attachment" => 0));
?>
