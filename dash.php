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
    <div  id = "main" class="row">
      <div class="col s8 offset-s3">
        <form class="form" method="post" action="/utils/request.php" enctype="multipart/form-data">
          <fieldset>
            <legend  style="color: #26a69a;">
              
              <b>Event Details</b>
            </legend>
            <div class="row">
              <div class="input-field col s12">
                <input name = "Convenor" id="Convenor" type="text" class="validate">
                <label for="Convenor">Convenor</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input name = "eventName" id="eventName" type="text" class="validate">
                <label for="eventName">Event Name (Title Of The Event)</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input name = "startDate" id="startDate" type="text" class="datepicker">
                <label for="startDate">Start Date</label>
              </div>
              <div class="input-field col s6">
                <input name = "endDate" id="endDate" type="text" class="datepicker">
                <label for="endDate">End Date</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input type = "text" list="browsers" name = "eventType" id = "eventType">
                <datalist id="browsers">
                  <?php
                    $db = new DB;
                    $db->makeConnection('Certificate');
                    $sql = "Select * from eventTypes";
                    $result = $db->query($sql);
                    $db->close();

                    $row = $result->fetch_assoc();
                    while ($row)
                    {
                      echo '<option value="'. $row['EventType'] .'">';
                      $row = $result->fetch_assoc();
                    }
                  ?>
                </datalist>
                <label for = "eventType">Type of Event</label>
              </div>
              <div class="input-field col s6">
                <select name = "certficateType">
                  <?php
                    $certificate = new Certificate;
                    $certificates = $certificate->getCertificates();
                    foreach ($certificates as $key => $certificate){
                      echo '<option value="'.$certificate.'">'.$certificate.'</option>';
                    }
                  ?>
                </select>
                <label>Type of Certficate</label>
              </div>
            </div>
            <div class="file-field input-field col s12">
              <div class="btn">
                <span>File</span>
                <input type="file" name = "csvFile">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path" type="text" required>
              </div>
            </div>
            <div class="row">
              <button class="btn waves-effect waves-light col s2 offset-s5" type="submit" name="upload">Upload
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
      $('.datepicker').datepicker({
        format : 'yyyy-mm-dd'
      });
    });

    $.validator.addMethod('greaterThan', function(value, element, param) {
      return this.optional(element) || value >= $(param).val();
    }, 'Invalid value');

    $(".form").validate({
      rules: {
        conveyor: {
          required: true
        },
        eventName: {
          required: true
        },
        startDate: {
          required: true
        },
        endDate: {
          required: true,
          greaterThan: startDate
        }
      },
      //For custom messages
      messages: {
          conveyor:{
              required: "Enter Conveyor Name"
          },
          eventName:{
              required: "Enter Event Name"
          },
          startDate:{
              required: "Enter Start Date"
          },
          endDate:{
              required: "Enter End Date",
              greaterThan: "End Date must be Greater Than or Equal to Start Date"
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
