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
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Fastest CMS by Shishir Raven</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">

      <style>
        .author {
            font-style: italic;
            font-weight: bold;
        }
    </style>
   </head>
   <body>
     <h1>Fastst CMS Test</h1>
   </body>
</html>
<script src="<?php echo BASEURL ?>js/jquery.min.js"></script>
<script src="<?php echo BASEURL ?>js/bootstrap.min.js"></script>
<?php fastest_cms::create_editor(); ?>
<script>
$(document).ready(function() {

});
</script>

