<?php	
include_once("../connection.php");
include("fastest_cms.php");

$pattern = '/^fastest-cms-id-(.*)/';
preg_match($pattern, $_POST['element_to_delete'], $matches);
	if(count($matches))
	{
		fastest_cms::revert_editable($_POST['page_name'],$matches[1]);
	}
?>

