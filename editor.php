<?php 
include("../connection.php");
include("fastest_cms.php");
//fastest_cms::create_login_form();
if(isset($_GET['file_path']))
{
	$content = file_get_contents($_GET['file_path']);
}
?>
<html>
	<head>
		<title>Edit : </title>
	</head>
	<body>
		<form action="">
			
			<textarea class="editor-text-area" name="" id="" cols="30" rows="10">
				<?php echo $content;  ?>
			</textarea>
		</form>
		
	</body>
	<style>
	.editor-text-area{
		font-family: monospace;
		font-size:15px;
		width:100%;
		height:100%;
	}

	</style>


</html>