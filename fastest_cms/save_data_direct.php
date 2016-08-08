<?php 
include("fastest_cms.php");
$file="../test2.php";
function tidyHTML($content){
	// Specify configuration
	$config = array(
	           'indent'         => true,
	           'output-xml'   => true,
	           'wrap'           => 200);
	// Tidy
	$tidy = new tidy;
	$tidy->parseString($content , $config, 'utf8');
	$tidy->cleanRepair();
	return tidy_get_output($tidy);
}
$content = file_get_contents($file);
// Create a DOM object from a string
$html = str_get_html($content);



$pattern = '/^fastest-cms-id(.*)/';
foreach($_POST as $key => $value)
{
	preg_match($pattern, $key, $matches);
	if(count($matches))
	{
		// Updating the record into table. 
		//echo $value;
		//echo $matches[1];
		//echo "string123";
		//echo "[data-name=".$key."]";

		$html->find("[data-name=".$key."]",0)->innertext=$value;
		


	}
}
$content = tidyHTML($html);


//echo $content;
file_put_contents("../test2.php",$content);
?>