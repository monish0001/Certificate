<?php

  require 'dashMenu.php';

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
            <legend><b style="color: #26a69a;" > Generate Certificate</b></legend>
            <div class="row">
              <div class="input-field col s12">
                <select name = "csvFile">
                  <?php
                    $dir = 'Events';
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
              <button class="btn waves-effect waves-light col s2 offset-s5" type="submit" name="generate">Generate
                <i class="material-icons right">file_upload</i>
              </button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
  <script>
    $(document).ready(function(){
      $('select').formSelect();
    });
  </script>
</html>
