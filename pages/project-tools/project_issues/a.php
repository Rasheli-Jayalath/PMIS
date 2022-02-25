<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.9.2/jquery-ui.min.js"></script>

<script> 
$(document).ready(function () {
    var date = new Date();
    $('#datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    });
});
</script> 

</head>
<body>
 
<p>Date: <input type="text" id="datepicker"></p>

</body>