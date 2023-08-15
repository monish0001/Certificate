<?php
  require 'dashMenu.php';
  require_once 'utils/classes.php';

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
        <form class="form" method="post" action="utils/request.php">
          <fieldset>
            <legend style="color: #26a69a;" > <b>Add New Certificate</b> </legend>
            <div class="row">
              <div class="input-field col s12">
                <input name = "name" id="name" type="text">
                <label for="name">Type of Certificate</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input name = "title" id="title" type="text">
                <label for="title">Title( To be displayed in center)</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea name="content" id="content" class="materialize-textarea"></textarea>
                <label for="content">Content</label>
              </div>
            </div>
            <div class="row">
              <button class="btn waves-effect waves-light col s2 offset-s5" type="submit" name="addCertificate">Submit<i class="material-icons right">add</i>
              </button>
            </div>
          </fieldset>
        </form>


      </div>

    </div>
 
  </body>

  <script>
    $(".form").validate({
      rules: {
        name: {
          required: true
        },
        title: {
          required: true
        },
        content: {
          required: true
        }
      },
      //For custom messages
      messages: {
        name: {
          required: 'Enter Name of Certficate'
        },
        title: {
          required: 'Enter Title'
        },
        content: {
          required: 'Enter Content'
        }
      },
      errorElement : 'div',
      errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
          $(placement).append(error)
        } else {
          error.insertAfter(element);
        }
      }
     });
  </script>
</html>

    
            