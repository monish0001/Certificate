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
    <div  id = "main" class="row">
      <div class="col s8 offset-s3">
        <form class="form" method="post" action="/utils/request.php" enctype="multipart/form-data">
          <fieldset>
            <legend style="color: #26a69a;"><b>Guideline's for Admin Panel</b></legend>

  <ul  class="collapsible popout">
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i>How can upload new file?</div>
      <div class="collapsible-body"><span>Simply just click on upload file menu bar and select CSV file, fill some details and save it.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">print</i>How can generate certificate?</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">pageview</i>How can view all the generated certificate?</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">add</i>How can add new certificate type?</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">edit</i>How can edit existing certificate type?</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">delete</i>How can delete existing certificate type? </div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_tilt_shift</i>How can change the logo or upoad a new logo?</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
  </ul>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
  <script type="text/javascript">
  	
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
      
  </script>
  </html>