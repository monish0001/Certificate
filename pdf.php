<?php
require_once 'utils/classes.php';
  require 'vendor/autoload.php';
$certificate = new Certificate;
$certificates1=$certificate->getGeneratedCertificate();
  $dbh = new PDO("mysql:host=localhost;dbname=phpauth", "root", "");

  $config = new PHPAuth\Config($dbh);
  $auth   = new PHPAuth\Auth($dbh, $config);
  if (!$auth->isLogged()) {
      header('HTTP/1.0 403 Forbidden');
      echo "Forbidden";
      exit();
  }

  if (isset($_POST['generate'])) {

    require_once 'fpdf/fpdf.php';
    require 'utils/certificate.php';
    require 'utils/utilFunc.php';

    $csvFile = 'Events/'.$_POST['csvFile'];

    $csv = readCSV($csvFile);

    $conveyor = $csv[1][0];
    $eventName = $csv[1][1];
    $startDate = $csv[1][2];
    $endDate = $csv[1][3];
    $eventType = $csv[1][4];
    $certificateType = $csv[1][5];

    $certificates = getCertificateContent($csv);

    $pdf = new PDF();
    $pdf->AddFont('Monotype','','Monotype.php');

    foreach ($certificates as $key => $certificate) {
      $pdf->AddPage('L', 'A3');
      $pdf->certificateNumber = $certificate['certificateNumber'];
      $pdf->SetTitle('Certificate'); //SetTitleofPage
      $pdf->Border(); //SetBorderofCertificate
     // $pdf->setlogo($left,$right);
      $pdf->Title($certificate['title']); //SetTitle
      $pdf->Content($certificate['content']); //Content
      $pdf->Signature($conveyor);
    }

    $outputFileName = 'GeneratedCertificates/'.$eventName.$startDate.$conveyor.$eventType.$certificateType.date("Y-m-d").".pdf";
   foreach ($certificates1 as  $certificate){ 
           $var= $certificate['FileName'];;
      if ($outputFileName==$var) {
       $certificate = null;
      
echo "Sorry! this certificate has already been generated .";
header("Refresh:5; url=/generateCertificate.php");
     //  header("Location: /generateCertificate.php");
       exit;
      }
   }
   $certificate = new Certificate;
  if($certificate->GeneratedCertificate($outputFileName))
    {
      $certificate = null;
     // header("Location: /dash.php");
     // exit;
    }

    $pdf->Output();
    $pdf->Output('F', $outputFileName);
  }elseif(isset($_POST['view'])){

    echo '<object width="100%" height="100%" data="'.$_POST['pdfFile'].'"></object>';
  }else{
    header('Location: /');
  }
?>
<style>
*{
  margin: 0px;
}



</style>
<script>
function myFunction() {
    alert("Hello! I am an alert box!");
}
</script>