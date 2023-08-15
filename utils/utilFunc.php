<?php

require_once 'classes.php';

  function readCSV($csvFile){
      $file_handle = fopen($csvFile, 'r');
      while (!feof($file_handle) ) {
          $line_of_text[] = fgetcsv($file_handle, 1024);
      }
      fclose($file_handle);
      return $line_of_text;
  }

  function getCertificateContent($csvArray)
  {

    // Event details
    $Convenor  = $csvArray[1][0];
    $eventName = $csvArray[1][1];
    $startDate = $csvArray[1][2];
    $endDate = $csvArray[1][3];
    $eventType = $csvArray[1][4];
    $certificateType = $csvArray[1][5];


    $certificates = array();

    for($i=3, $j=1; $i<sizeof($csvArray)-1; $i++,$j++){
      $num = sprintf("%'03d", $j);
      $date = $startDate;
      $date = str_replace('-','',$date);
      $certificateNumber = $date.$num;

      $placeholder = array();
      $placeholderValues = array();
      foreach ($csvArray[$i] as $key => $value) {
        array_push($placeholder, "%placeholder". ($key + 1) ."%");
        array_push($placeholderValues, $value);
      }

      $certificate = new Certificate;
      $detail = $certificate->getTitleAndContent($certificateType);

      $title = $detail['title'];

      $find = array("%eventname%", "%eventtype%", "%Convenor%", "%startdate%","%enddate%");
      $replace = array($eventName, $eventType, $Convenor, $startDate,$endDate);

      $content = htmlspecialchars_decode($detail['content']);
      $content=str_replace($find, $replace, $content);
      $content=str_replace($placeholder, $placeholderValues, $content);

      array_push($certificates, $arrayName = array('title' => $title, 'content' => $content, 'certificateNumber' => $certificateNumber));

    }

    return $certificates;

  }

  function file_upload($target_dir, $name) {
  	$uploadOk = 1;
  	$fileType = pathinfo(basename($_FILES["csvFile"]["name"]), PATHINFO_EXTENSION);
  	$target_file = $target_dir . $name . "." . $fileType;

  // Check if image file is a actual image or fake image
  	$check = filesize($_FILES["csvFile"]["tmp_name"]);
  	if ($check !== false) {
  		$uploadOk = 1;
  	} else {
  		error_log("File Not an CSV", 0);
  		$uploadOk = 0;
  	}
  // Check if file already exists
  	if (file_exists($target_file)) {
  		error_log("File already exists", 0);
  		$uploadOk = 0;
  	}
  // Check file size
  	if ($_FILES["csvFile"]["size"] > 500000) {
  		error_log("File Size Exceeded", 0);
  		$uploadOk = 0;
  	}
  // Allow certain file formats
  	if ($fileType != "csv") {
  		error_log("Ivalid Format!", 0);
  		$uploadOk = 0;
  	}
  // Check if $uploadOk is set to 0 by an error
  	if ($uploadOk == 0) {
  		error_log("File Not Uploaded", 0);
  		header("Location: /404");
  		// if everything is ok, try to upload file
  	} else {
  		if (move_uploaded_file($_FILES["csvFile"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/" . $target_file)) {
  			return $target_file;
  		} else {
  			error_log("Error Uploading File!", 0);
  			header("Location: /404");
  		}
  	}
  }


  function upload_LeftLogo($target_dir, $name) {
  $uploadOk = 1;
  $imageFileType = pathinfo(basename($_FILES["leftLogo"]["name"]), PATHINFO_EXTENSION);
  $target_file = $target_dir . $name . "." . $imageFileType;
// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["leftLogo"]["tmp_name"]);
  if ($check !== false) {
    $uploadOk = 1;
  } else {
   echo "File Not an Image";
    $uploadOk = 0;
  }
// Check if file already exists
  if (file_exists($target_file)) {
    error_log("File already exists", 0);
    $uploadOk = 0;
  }
// Check file size
  if ($_FILES["leftLogo"]["size"] > 500000) {
    error_log("File Size Exceeded", 0);
    $uploadOk = 0;
  }
// Allow certain file formats
  if ($imageFileType != "jpg" && $imageFileType != "PNG" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Ivalid Format!";
    $uploadOk = 0;
  }
// Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "File Not Uploaded";
  //  header("Location: /404");
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["leftLogo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/" . $target_file)) {
      return $target_file;
    } else {
      echo "Error Uploading File!";
      //header("Location: /404");
    }
  }
}
  function upload_rightLogo($target_dir, $name) {
  $uploadOk = 1;
  $imageFileType = pathinfo(basename($_FILES["rightLogo"]["name"]), PATHINFO_EXTENSION);
  $target_file = $target_dir . $name . "." . $imageFileType;
// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["rightLogo"]["tmp_name"]);
  if ($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File Not an Image";
    $uploadOk = 0;
  }
// Check if file already exists
  if (file_exists($target_file)) {
    error_log("File already exists", 0);
    $uploadOk = 0;
  }
// Check file size
  if ($_FILES["rightLogo"]["size"] > 500000) {
    error_log("File Size Exceeded", 0);
    $uploadOk = 0;
  }
// Allow certain file formats
  if ($imageFileType != "jpg" && $imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "png"
    && $imageFileType != "gif") {
    echo "Ivalid Format!";
    $uploadOk = 0;
  }
// Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
   echo "File Not Uploaded";
   /// header("Location: /404");
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["rightLogo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/" . $target_file)) {
      return $target_file;
    } else {
      echo "Error Uploading File!";
     // header("Location: /404");
    }
  }
}
?>
