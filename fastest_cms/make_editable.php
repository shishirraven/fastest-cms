<?php 
include("fastest_cms/fastest_cms.php");
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
$content = file_get_contents($file);
// Create a DOM object from a string
$html = str_get_html($content);

$i=1;
foreach($html->find('div,p, h1,h2,h3,h4') as $e) {
	/* The children should not contain any further div's*/
	if(!$e->find("div"))
	{
		$e->setAttribute ( "data-name", "fastest-cms-id".$i );
		$e->setAttribute ( "data-editable", '' );
		$i++;
	}
}
$content = tidyHTML($html);
file_put_contents("test2.php",$content);
?>
