<?php
require_once 'utils/classes.php';
  $certificate = new Certificate;
  $logoArray=$certificate->getCurentLogo();
  $left= $logoArray['leftLogo'];
  $right=$logoArray['rightLogo'];

  class PDF extends FPDF
  {

    var $certificateNumber;

    function Header()
    {
        global $left,$right;

        $width = $this->GetPageWidth() - 60;
        //logo
        $this->Image($left, 30, 30, 40, 40);
        $this->Image($right, $width-10, 30, 40, 40);
   
        // Select Arial bold 15
        $this->SetTextColor(0, 0, 70);
        $this->SetFont('Times','B',40);

        $this->SetXY(30,30);
        //Header
        $this->Cell($width,15,'DEEN DAYAL UPADHYAYA COLLEGE',0,1,'C');

        // Line break
        $this->Ln(0);

        // Select Arial bold 15
        $this->SetFont('Times','B',24);
        //Header
        $this->SetX(30);
        $this->Cell($width,10,'(UNIVERSITY OF DELHI)',0,1,'C');

        // Line break
        $this->Ln(0);

        // Select Arial bold 15
        $this->SetFont('Monotype','',18);

        //Header
        $this->SetX(30);
        $this->Cell($width,10,"NAAC Accredited 'B' Grade (CGPA=2.63)Institute",0,1,'C');

        // Line break
        $this->Ln(0);

        // Select Arial bold 15
        $this->SetFont('Monotype','',30);
        //Header
        $this->SetX(30);
        $this->Cell($width,10,'Sector-3, Dwarka, New Delhi, 110078',0,1,'C');

        // Line break
        $this->Ln(20);
        $this->SetTextColor(0, 0, 0);
    }

    function footer()
    {
        $width = $this->GetPageWidth();
        // Go to 1.5 cm from bottom
        $this->SetXY($width-50,-10);
        // Select Arial italic 8
        $this->SetFont('Arial','I',8);
        // Print centered page number
        $this->Cell(0,10,$this->certificateNumber,0,0,'C');
    }

    function Border(){
      //border
      $height = $this->GetPageHeight();
      $width = $this->GetPageWidth();
      $this->Image('images/border.png', 10, 10, $width-20, $height-20);
    }

    function Title($title){
      $width = $this->GetPageWidth() - 60;
      // Select Arial bold 15
      $this->SetFont('Monotype','',60);
      $this->SetTextColor(220,0 ,0);
      //Header
      $this->SetX(30);
      $this->Cell($width,10,$title,0,1,'C');

      // Line break
      $this->Ln(35);

      $this->SetTextColor(0,0 ,0);
    }

    function Content($content){
      $width = $this->GetPageWidth();
      // Select Arial bold 15
      $this->SetTextColor(0, 0, 70);
      $this->SetFont('Monotype','',30);
      //Header
      $this->SetX(30);
      $this->MultiCell($width-60,20,$content,0,'J');

      // Line break
      $this->Ln(20);
      $this->SetTextColor(0, 0, 0);
    }

    function Signature($conveyor){
      $width = $this->GetPageWidth();
      // Select Arial bold 15
      $this->SetTextColor(0, 0, 70);
      $this->SetFont('Monotype','',30);
      $this->SetX(30);
      $this->Cell(($width-60)/4,20,$conveyor,0,0,'C');
      $this->Cell(($width-60)/1.7,20,' ',0,0,'C');
      $this->Cell(($width-60)/12,20,'Dr. Hem Chand Jain',0,0,'C');

      $this->Ln(10);

      $this->SetX(30);
      $this->Cell(($width-60)/4,20,'(Convener)',0,0,'C');
      $this->Cell(($width-60)/1.7,20,'',0,0,'C');
      $this->Cell(($width-60)/15,20,'(Acting Principal)',0,0,'C');

      // Line break
      $this->Ln(40);
      $this->SetTextColor(0, 0, 0);
    }

  }
?>
