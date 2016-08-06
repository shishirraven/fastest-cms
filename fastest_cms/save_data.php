<?php
include("../connection.php");
include("fastest_cms.php");

print_r($_POST);

$pattern = '/^fastest-cms-id-(.*)/';
foreach($_POST as $key => $value)
{
	preg_match($pattern, $key, $matches);
	if(count($matches))
	{
		// Updating the record into table. 
		echo $value;
		echo $matches[1];

		fastest_cms::save_by_record( $value , $matches[1]);
	}
}
?>