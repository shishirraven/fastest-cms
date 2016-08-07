<?php	
include_once("../connection.php");
include("fastest_cms.php");

fastest_cms::create_a_editable_area($_POST['page_name'], $_POST['content']);
//fastest_cms::create_a_editable_area_dom_path($_POST['page_name'],  $_POST['path']);


?>
