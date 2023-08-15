<?php

  require 'dashMenu.php';
  require_once 'utils/classes.php';
  $certificate = new Certificate;
  $certificates=$certificate->getAllLogo();
  $logoArray=$certificate->getCurentLogo();
  $left= $logoArray['leftLogo'];
  $right=$logoArray['rightLogo'];

?>

<html>
  <head>
    <style>
      #main{
          margin-top: 1%;
      }
      fieldset{
        padding: 20px;
      }
      legend{
        font-size: 20px;
      }
    </style>
  </head>
  <body>
    <div  id = "main" class="row">
      <div class="col s8 offset-s3">
        <form class="form" method="post" action="/utils/request.php" enctype="multipart/form-data">
          <fieldset>
            <legend><b style="color: #26a69a;" >Upload New Logo</b></legend>
            
            <div class="file-field input-field col s6">
              <div class="btn">
                <span>Left </span>
                <input type="file" name = "leftLogo">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path" type="text" required>
              </div>
            </div>
            <div class="file-field input-field col s6">
              <div class="btn">
                <span>Right </span>
                <input type="file" name = "rightLogo">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path" type="text" required>
              </div>
            </div>
            <div style="margin-top: 150px;" class="row">
              <button class="btn waves-effect waves-light col s2 offset-s5" type="submit" name="uploadLogo">Update
                <i class="material-icons right">file_upload</i>
              </button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>

        <div  id = "main" class="row">
      <div class="col s8 offset-s3">
        <fieldset>
            <legend><b style="color: #26a69a;" >Current Logo</b></legend>
     <div class="row " style="margin-left: 5%">
     <div class="file-field input-field col s6">
         <img  class="materialboxed" data-caption="This is present left logo"width="150" style="height: 150px;" src="<?php echo $left; ?>">
        </div>
        <div class="file-field input-field col s6">
          <img class="materialboxed" data-caption="This is present right logo" width="150"  style="height: 150px;"  src="<?php echo $right; ?>">
        </div>
      </div> 
         </fieldset>
      </div>
    </div>


<div  id = "main" class="row">
<div class="col s8 offset-s3">
<fieldset>
<legend style="color: #26a69a;"><b >Select  any one that would be your current logo</b></legend>

  <?php   foreach ($certificates as  $certificate){ ?>
<form class="form" method="post" action="/utils/request.php" enctype="multipart/form-data" >
  <input type="hidden" name="rightLogo" value="<?php echo $certificate['rightLogo']; ?>">
   <input type="hidden" name="leftLogo" value="<?php echo $certificate['leftLogo']; ?>">
              <div class="row " style="margin-left: 5%">
     <div class="file-field input-field col s6">
         <img  class="materialboxed" data-caption="This is left logo" style="height: 150px;" width="150" src="<?php echo $certificate['leftLogo']; ?> ">
        </div>
        <div class="file-field input-field col s6">
          <img class="materialboxed" data-caption="This is right logo" width="150" style="height: 150px;" src="<?php echo $certificate['rightLogo']; ?> ">
        </div>
      </div>
 <div style="margin-top: 10px;" class="row">
              <button class="btn waves-effect waves-light col s2 offset-s5" type="submit" name="updateLogo">Select
                <i class="material-icons right">file_upload</i>
              </button>
            </div>
             </form>
<hr>
<?php } ?>
        </fieldset>
      </div>
    </div>
  </body>
       <script type="text/javascript">
           $('.carousel.carousel-slider').carousel({fullWidth: true});
            $('.carousel.carousel-slider').carousel({fullWidth: true});
              $(document).ready(function(){
    $('.materialboxed').materialbox();
  });

        </script>
</html>
