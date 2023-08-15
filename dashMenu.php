  <?php
  require 'vendor/autoload.php';

  $dbh = new PDO("mysql:host=localhost;dbname=phpauth", "root", "");

  $config = new PHPAuth\Config($dbh);
  $auth   = new PHPAuth\Auth($dbh, $config);
  if (!$auth->isLogged()) {
      header('HTTP/1.0 403 Forbidden');
      echo "Forbidden";
      exit();
  }
?>
<html>
  <head>
    <link rel="shortcut icon" href="images/DDULogo.jpg" type="image/jpg" />
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.css" />
    <script src="js/jquery.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/materialize.js"></script>
    <style>
        *{  
  font-family: 'Nova Flat', sans-serif;
  margin:0px;
  box-sizing:border-box;
}
      .name, .email{
        color: black !important;
        font-size: 18px !important;
      }
      .error{
        color: #d32f2f;
      }
    </style>
  </head>
  <body >
 
    <ul id="slide-out" class="sidenav sidenav-fixed">
      <li><div class="user-view" style="height:180px;width: 300px;">
        <div class="background">
          <img src="images/adminBackground.jpg" style="height:180px;width: 300px;">
        </div>
        
      </div></li>
       <li  id="dashMain"><a href="dashHome.php">Dashboard</a></li>

      <li  id="dash"><a href="dash.php">Upload Exel File</a></li>
      
     
      <li id="add"><a href="add.php">Add Content</a></li>
      <li id="updateLogo"><a href="updateLogo.php">Update Logo's</a></li>
       <li id="generate"><a href="generateCertificate.php">Generate Certificates</a></li>
      <li id="view"><a href="view.php">Get Certificates</a></li>
     <!--  <li id="delete"><a href="delete.php">Delete Certificate Type</a></li> -->
     
       
      <li><a data-target="modal1"  class="modal-trigger" style="cursor: pointer;" >Logout</a></li> 
     
    </ul>
    <!-- Modal Trigger -->

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Ready to Leave?</h4>
      <p>Select "AGREE" below if you are ready to end your current session.</p>
    </div>
    <div class="modal-footer">
      <a href="#" class="modal-close waves-effect waves-green btn-flat">DISAGREE</a>
       <a href="logout.php" class="modal-close waves-effect waves-green btn-flat">AGREE</a>
    </div>
  </div>
  </body>
  <script>
     document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.modal').modal();
  });
    $(document).ready(function(){
      $('.sidenav').sidenav();
      $( "#dashMain" ).removeClass( "active" );
      $( "#dash" ).removeClass( "active" );
      $( "#view" ).removeClass( "active" );
      $( "#generate" ).removeClass( "active" );
      $( "#add" ).removeClass( "active" );
      $( "#delete" ).removeClass( "active" );
      $( "#edit" ).removeClass( "active" );
      
       $( "#updateLogo" ).removeClass( "active" );

      var url = window.location.href;
      url = url.split("/");
      page = url[url.length - 1];
      switch(page) {
        case 'dash.php':
            $('#dash').addClass("active")
            break;
        case 'updateLogo.php':
            $('#updateLogo').addClass("active")
            break;
        case 'dashHome.php':
            $('#dashMain').addClass("active")
            break;
        case 'view.php':
            $('#view').addClass("active")
            break;
        case 'generateCertificate.php':
            $('#generate').addClass("active")
            break;
        case 'add.php':
            $('#add').addClass("active")
            break;
        case 'delete.php':
            $('#delete').addClass("active")
            break;
        case 'edit.php':
            $('#edit').addClass("active")
            break;
      }
    });



  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.fixed-action-btn').floatingActionButton();
  });
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });
  </script>
</html>
<div class="fixed-action-btn">
  <a class="btn-floating btn-large #26a69a pulse" >
    <i class="large material-icons ">mode_edit</i>
  </a>
  <ul>
   <!--  <li class=" tooltipped" data-position="left" data-tooltip="Dashboard" ><a href="/dashHome.php"  class="btn-floating black"><i class="material-icons">home</i></a></li> -->
    
 <!--    <li class=" tooltipped" data-position="left" data-tooltip="Upload excel file"><a href="dash.php" class="btn-floating #26a69a"><i class="material-icons">cloud_upload</i></a></li> -->
   <!--  <li class=" tooltipped" data-position="left" data-tooltip="View certificates"><a  href="view.php" class="btn-floating #26a69a"><i class="material-icons">pageview</i></a></li> -->
    <!-- <li class=" tooltipped" data-position="left" data-tooltip="Generate certificates "><a href="generateCertificate.php" class="btn-floating #26a69a"><i class="material-icons">print</i></a></li> -->
    <li class=" tooltipped" data-position="left" data-tooltip="Add content"><a  href="add.php" class="btn-floating #26a69a"><i class="material-icons">add_circle</i></a></li>
   
    <li class=" tooltipped" data-position="left" data-tooltip="Update content"><a  href="edit.php" class="btn-floating #26a69a"><i class="material-icons">edit</i></a></li>
    <li class=" tooltipped" data-position="left" data-tooltip="Update Logo"><a  href="updateLogo.php" class="btn-floating #26a69a"><i class="material-icons">border_color</i></a></li>
     <li class=" tooltipped" data-position="left" data-tooltip="Delete content"><a  href="delete.php" class="btn-floating #26a69a "><i class="material-icons">delete</i></a></li>
   <!--  <li class=" tooltipped" data-position="left" data-tooltip="Logout"><a  href="/logout.php" class="btn-floating black darken-1"><i class="material-icons">lock_outline</i></a></li> -->
  </ul>
</div>