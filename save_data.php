<?php 
include("fastest_cms.php");
$file="test2.php";
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
$content = file_get_contents($file_to_make_editable);
// Create a DOM object from a string
$html = str_get_html($content);



$pattern = '/^fastest-cms-id-(.*)/';
foreach($_POST as $key => $value)
{
	preg_match($pattern, $key, $matches);
	if(count($matches))
	{
	/*	// Updating the record into table. 
		echo $value;
		echo $matches[1]*/;
		$html->find("[data-name=".$key."]",0).outertext=$value;
	}
}
$content = tidyHTML($html);
file_put_contents("test2.php",$content);
?>