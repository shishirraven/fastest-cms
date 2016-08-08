<?php 
include_once("simple_html_dom.php");
/*
	About 			: Part of Instant Node. 
	System Designer : Shishir Raven. 
*/
Class fastest_cms_node
{
	public static insert_node($template_name, $text_to_show, $source_file, $running_script){
	?>
		<a href="fastest_cms/add_node.php?template_name=<?php echo $template_name; ?>&text_to_show=<php echo $source_file; ?>&running_script=<?php echo $running_script; ?>"></a>
	<?php
	}

	public static write_node()
	{

	}
}
 ?>
