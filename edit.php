<?php
  require 'dashMenu.php';
  require_once 'utils/utilFunc.php';

?>

<html>
  <head>
    <style>
      #main{
          margin-top: 1%;
            margin-left:100px;
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
            <legend style="color: #26a69a;" ><h1  > Edit Certificate </h1>(Title And Content)</legend>
            <table class="striped">
        <thead>
          <tr>
              <th>Certificate Type</th>
             
              <th>Edit </th>
          </tr>
        </thead>

        <tbody>
         
            <?php
            $certificate = new Certificate;
            $certificates = $certificate->getCertificates();
            foreach ($certificates as $key => $certificate){
             echo "<tr><td> $certificate </td>";
            //  echo "<td> $certificate </td>";?>
             <td><a href="editDetails.php?Name=<?php echo "$certificate";?>"> <i class="small material-icons">edit</i></a></td></tr>
             	<?php
             }
            ?>
          
          
        </tbody>
      </table>
          </fieldset>
          </div>
        </div>
      </body>
      </html>