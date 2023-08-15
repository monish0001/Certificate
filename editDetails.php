<?php
  require 'dashMenu.php';
  require_once 'utils/utilFunc.php';

  $certificateName = $_GET['Name'];

  $certificate = new Certificate;
  $detail = $certificate->getTitleAndContent($certificateName);

  $title = $detail['title'];
  $content = $detail['content'];

?>
<html>
  <head>

  </head>
  <body>
    <div  id = "main" class="row">
      <div class="col s8 offset-s3">
      	 <form class="form" method="POST" action="utils/request.php">
          <input type="hidden" name="name" value='<?php  echo $certificateName; ?>' />
          <fieldset>
            <legend><h1 style="color: #26a69a;" >Edit Certificate Type</h1></legend>
              <div  class="row">
              <div class="input-field col s12">
                <label for="title">Certificate Name : <?php echo $certificateName; ?></label>
              </div>
            </div><br><br>
        
            <div class="row">
              <div class="input-field col s12">
                <input name = "title" id="title" type="text" value="<?php echo $title ?>">
                <label  for="title">Title</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea name="content" id="content" class="materialize-textarea"><?php echo $content ?></textarea>
                <label for="content">Content</label>
              </div>
            </div>
            <div class="row">
             <button class="btn waves-effect waves-light col s2 offset-s5" type="submit" name="editDetails">Update <i class="material-icons right">edit</i>
              </button>
            </div>
          </fieldset>
        </form>
      </div>
          </div>
      </body>
      </html>
