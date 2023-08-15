<?php

require '../vendor/autoload.php';

$dbh = new PDO("mysql:host=localhost;dbname=phpauth", "root", "");

$config = new PHPAuth\Config($dbh);
$auth   = new PHPAuth\Auth($dbh, $config);

if (!$auth->isLogged()) {
    header('HTTP/1.0 403 Forbidden');
    echo "Forbidden";
    exit();
}

require_once 'utilFunc.php';
require_once 'classes.php';

  function filter_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if (isset($_POST['upload'])) {
    $Convenor = filter_data($_POST['Convenor']);
    $eventName = filter_data($_POST['eventName']);
    $startDate = filter_data($_POST['startDate']);
    $endDate = filter_data($_POST['endDate']);
    $eventType = filter_data($_POST['eventType']);
    $certificateType = filter_data($_POST['certficateType']);

    $db = new DB;
    $db->makeConnection('Certificate');
    $sql = "INSERT INTO eventTypes(EventType) values('$eventType')";
    $result = $db->query($sql);
    $db->close();

    $columnHeader = array('Convenor', 'Event Name', 'Start Date', 'End Date', 'Event Type', 'Certificate Type');
    $columnValue = array($Convenor, $eventName, $startDate,$endDate, $eventType, $certificateType);

    $csvFile = file_upload("Events/", $eventName.$startDate.$Convenor.$eventType.$certificateType);
    $data = readCSV("../".$csvFile);

    $file = fopen("../".$csvFile,"w");
    fputcsv($file,$columnHeader);
    fputcsv($file,$columnValue);

    foreach ($data as $key => $value) {
      if($value)
        fputcsv($file,$value);
    }

    header('Location: /dash.php');

  }elseif(isset($_POST['addCertificate'])){

      $certificateName = filter_data($_POST['name']);
      $certificateTitle = filter_data($_POST['title']);
      $certificateContent = filter_data($_POST['content']);
      $certificate = new Certificate;
      if($certificate->addCertificate($certificateName,$certificateTitle,$certificateContent))
      {
        $event = null;
        header("Location: /dash.php");
        exit;
      }
  }elseif(isset($_POST['editDetails'])){
      $certificateName=$_POST['name'];
      $certificateTitle = filter_data($_POST['title']);
      $certificateContent = filter_data($_POST['content']);
      $certificate = new Certificate;
      if($certificate->editCertificate($certificateName,$certificateTitle,$certificateContent))
      {
        $certificate = null;
        header("Location: /dash.php");
        exit;
      }

  }elseif(isset($_GET['Name'])){
    $certificateName = $_GET['Name'];
    $certificate = new Certificate;
    if($certificate->deleteCertificate($certificateName))
    {
      $certificate = null;
      header("Location: /delete.php");
      exit;
    }
  }elseif(isset($_GET['Action'])){
    $certificateid = $_GET['Action'];
    $certificate = new Certificate;
    if($certificate->deletegeneratedCertificate($certificateid))
    {
      $certificate = null;
      header("Location: /view.php");
      exit;
    }
  }elseif(isset($_POST['uploadLogo'])){
      $rand=rand(1,100000000);
  if (!empty($_FILES['leftLogo']['name'])) {
  $leftLogo = upload_leftLogo('images/', $rand);
  }
  $rand=rand(1,100000000);
  if (!empty($_FILES['rightLogo']['name'])) {
  $rightLogo = upload_rightLogo('images/', $rand);
  }
      $certificate = new Certificate;
      if($certificate->uploadLogo($leftLogo,$rightLogo))
      { 
        $event = null;
        header("Location: /updateLogo.php");
        exit;
  }
}
elseif(isset($_POST['updateLogo'])){
    $leftLogo=$_POST['leftLogo'];
    $rightLogo=$_POST['rightLogo'];
 
      $certificate = new Certificate;
      if($certificate->UpdateLogo($leftLogo,$rightLogo))
      {
        $event = null;
        header("Location: /updateLogo.php");
        exit;
  }
}
?>
