<?php
require_once 'utils/classes.php';
require 'dashMenu.php';
$certificate = new Certificate;
$certificates=$certificate->getGeneratedCertificate();
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
    <div id = "main" class="row">
      <div class="col s8 offset-s3">
        <form class="form" method="post" action="pdf.php">
          <fieldset>
            <legend><b style="color: #26a69a;" > Generated Certificate</b></legend>
            <?php if ($certificates==NULL) {
           echo "<h2>Sorry! No Certificate Found<h2>";
            } ?>
           <!-- <div class="row">
              <div class="input-field col s12">
                <select name = "pdfFile">
                  <?php
                    $dir = 'GeneratedCertificates';
                    $files = scandir($dir);
                    for ($i=2; $i < sizeof($files); $i++) {
                      echo "<option value='".$files[$i]."'>".$files[$i]."</option>";
                    }
                  ?>
                </select>
                <label>File</label>
              </div>
            </div>
            <div class="row">
              <button class="btn waves-effect waves-light col s2 offset-s5" type="submit" name="view">View
                <i class="material-icons right">pageview</i>
              </button>
            </div> -->


      <table>
        <thead>
          <tr>
              <th>Certificate Name</th>
              <th>Delete </th>
              <th>View</th>
              <th>Download</th>
          </tr>
        </thead>

        <tbody>
          <?php   foreach ($certificates as  $certificate){ ?>
          <tr>
            <td><?php echo $certificate['FileName']; ?> </td>
            <td><a onclick="return getConfirmation();" class="btn waves-effect waves-light"  href="/utils/request.php?Action=<?php echo $certificate['id']; ?>"> <i class="material-icons">delete_forever</i></a></td>
            <td>
              <input type="hidden" value="<?php echo $certificate['FileName']; ?>" name="pdfFile">
              <button onclick="return getviewConfirmation()" class="btn waves-effect waves-light" type="submit" name="view">
                <i class="material-icons ">pageview</i>
              </button></td>
              <td><a class="btn waves-effect waves-light" href="<?php echo $certificate['FileName']; ?>" download><i class="material-icons ">arrow_downward</i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>



          </fieldset>
        </form>
      </div>
    </div>
  </body>
  <script>
    $(document).ready(function(){
      $('select').formSelect();
    });
    function getConfirmation(){
               var retVal = confirm("Do you want to delete this certificate?");
               if( retVal == true ){
                  return true;
               }
               else{
                  return false;
               }
            }
             function getviewConfirmation(){
               var retVal = confirm("Do you want to view this certificate?");
               if( retVal == true ){
                  return true;
               }
               else{
                  return false;
               }
            }
  </script>
</html>