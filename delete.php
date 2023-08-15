<?php
  require 'dashMenu.php';
  require_once 'utils/utilFunc.php';

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
        <fieldset>
           <legend><h1 style="color: #26a69a;" > Delete Certificate</h1></legend>
          <table class="striped">
            <thead>
              <tr>
                  <th>Certificate</th>
                  <th>Delete </th>
              </tr>
            </thead>
            <tbody>

                <?php
                $certificate = new Certificate;
                $certificates = $certificate->getCertificates();
                foreach ($certificates as $key => $certificate){
                 echo "<tr><td> $certificate </td>";?>
                 <td><a onclick="return getConfirmation();"  href="utils/request.php?Name=<?php echo "$certificate";?>"> <i class="small material-icons">delete_forever</i></td> </tr>
                 	<?php
                 }
                ?>

            </tbody>
          </table>
        </fieldset>
      </div>
    </div>
  </body>
  <script type="text/javascript">
       function getConfirmation(){
               var retVal = confirm("Do you want to delete this certificate type?");
               if( retVal == true ){
                  return true;
               }
               else{
                  return false;
               }
            }
  </script>
  </html>
