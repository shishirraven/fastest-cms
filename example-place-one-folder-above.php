<?php 
include("connection.php");  
include("fastest_cms/fastest_cms.php");
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      <title>American Granite & Tile</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">

      <style>
        .author {
            font-style: italic;
            font-weight: bold;
        }
    </style>
   </head>
   <body>
     
    <div class="container"><?php fastest_cms::editable(57); ?></div>
   </body>
</html>
<script src="<?php echo BASEURL ?>js/jquery.min.js"></script>
<script src="<?php echo BASEURL ?>js/bootstrap.min.js"></script>


<?php fastest_cms::create_editor(); ?>
<script>
$(document).ready(function() {

});
</script>

