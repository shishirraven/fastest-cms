<?php 
include_once("simple_html_dom.php");
/*
	About 			: Part of Instant CMS System. 
	System Designer : Shishir Raven. 

	====================
	SECTION 1		
	====================
	This class is repsonsible for displaying the content 
	from the database on the page. Also it creates
	special containers which are identifiable by the Javascript library.

	Section 1: Important Function Reference. 
	=============================

	function editable($content_identification_id)
	-----------------------------------------------------

	a. Display the content corresponding to the area from the database table.  and displaying it. 
	
	b. Creating a a HTML Container(<Span>).  this span will be 	responsible 
	for having the Indentification number. So thatJavascript can know which 
	content block to update.

	====================
	SECTION 2		
	====================
	Has functions that will add PHP markup into the file into places
	which match the string selected. 


*/
	Class fastest_cms
	{

/* =============================================================*/
/* ==== SECTION 1: Display Content Functions ===================*/
/* =============================================================*/

		static function  editable($content_identification_id)
		{
			/* Finding out the data */
			// SQL Select Single 
		
			$sql = "select * from cms_atom_content where id='".$content_identification_id."'";
			$rs  = mysql_query($sql ) or die(mysql_error());
			$row = mysql_fetch_array($rs);
			fastest_cms::display_container_start($content_identification_id);
			echo $row['content'];
			fastest_cms::display_container_end($content_identification_id);
		}

		static function revert_editable($file_name,$content_identification_id)
		{
			/* Finding out the data */
			$content =utf8_encode(file_get_contents($file_name));
			// SQL Select Single 
			$sql = "select * from cms_atom_content where id='".$content_identification_id."'";
			$rs  = mysql_query($sql ) or die(mysql_error());
			$row = mysql_fetch_array($rs);
			if(mysql_num_rows($rs))
			{
				$string_to_replace = "<?php fastest_cms::editable(".$content_identification_id."); ?>";
				$content = str_replace($string_to_replace, $row['content'], $content);
				file_put_contents($file_name,$content);
				echo "done";
			}
		}

		function display_container_start($content_identification_id)
		{


			echo "<div data-editable data-name='fastest-cms-id-".$content_identification_id."'>";
		}		

		function display_container_end()
		{
			echo "</div>";
		}

/* =============================================================*/
/* =====SECTION 1: CREATE EDITABLE BLOCKS 	====================*/
/* =============================================================*/

		static function create_a_editable_area($file_name, $string_to_replace)
		{
			fastest_cms::install_tables();
			/* Step 1 : Opening the File and and save into variable */

			$string_to_replace=str_replace("\n", PHP_EOL, $string_to_replace);
		
			$content =file_get_contents($file_name);
			//$content=str_replace('\r\n', PHP_EOL, $content);
			
			/* Step 2:  Finding if the Content and how many occurance does it has */
			$count = substr_count($content , $string_to_replace);

			if($count>1)
			{
				/* This means the ediable area can be confusing  we cannot proceed */
				echo "{'result':'ambigous search'}";
			}	
			$content_identification_id = fastest_cms::create_atom_record($string_to_replace);
			/* Step 3 : Preparing the Replacement Markup */
			$replacement = "<?php fastest_cms::editable(".$content_identification_id."); ?>";
			/* Step 4 : Replacing the search Data with Replacement Markup. .*/
			$content = str_replace($string_to_replace, $replacement, $content);
			file_put_contents($file_name,$content);
			echo "{'content_identification_id':'".$content_identification_id."'}";
		}


		static function create_a_editable_area_dom_path($file_name,  $dom_path)
		{
			$content=file_get_contents($file_name);
			$html = str_get_html($content);
			fastest_cms::install_tables();
			$string_to_replace = $html->find($dom_path, 0)->outertext;
			$content_identification_id = fastest_cms::create_atom_record($string_to_replace);
			$replacement = "<?php fastest_cms::editable(".$content_identification_id."); ?>";
			$html->find($dom_path, 0)->outertext = $replacement ;
				
			file_put_contents($file_name,$html);
			echo "{'content_identification_id':'".$content_identification_id."'}";
		}


		function create_atom_record($content_string)
		{
			fastest_cms::install_tables();
			/* Step 1 : Create a Insert Query */
			$sql = "insert into cms_atom_content(content) values('".mysql_escape_string($content_string)."')";
			mysql_query($sql) or die(mysql_error());
			return mysql_insert_id();
		}

/* =============================================================*/
/* =====SECTION 3: CREATING Editor 	====================*/
/* =============================================================*/

		static function create_editor()
		{
			if(!fastest_cms::is_user_logged_in()){
				return;
			}

			/* Step 1 : Generate a floating Footer Bar */
			include("footer_bar.php");

		}

/* =============================================================*/
/* =====SECTION 3: Updating the existing Data 	================*/
/* =============================================================*/


		function save_by_record( $content_string , $id )
		{
			/* Step 1 : Create a Insert Query */
			$sql = "update cms_atom_content  set content='".mysql_escape_string($content_string)."' where id='".$id."'";
			mysql_query($sql) or die(mysql_error());
			return mysql_insert_id();
		}

		static function install_tables(){

			if(mysql_num_rows(mysql_query("SHOW TABLES LIKE 'cms_atom_content'"))==0) 
			{
				$query_cms_atom_content = "
			
				CREATE TABLE `cms_atom_content` (
				  `id` int(11) NOT NULL,
				  `content` text NOT NULL
				)
				";

				$query_cms_atom_content_pk ="ALTER TABLE `cms_atom_content`
				  ADD PRIMARY KEY (`id`);
				";

				$query_cms_atom_content_ai ="ALTER TABLE `cms_atom_content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
				mysql_query($query_cms_atom_content) or die(mysql_error());
				mysql_query($query_cms_atom_content_pk) or die(mysql_error());
				mysql_query($query_cms_atom_content_ai) or die(mysql_error());
			}
		}


/* =============================================================*/
/* =====SECTION 3: Login Management 	================*/
/* =============================================================*/
	
	static function is_user_logged_in()
	{
		if($_SESSION['fastest_cms']=="its-a-fast-world")
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	static function create_login_form()
	{
		/* Logout Starts here */
		if(isset($_GET['logout-me']) && $_GET['logout-me'])
		{
				$_SESSION['fastest_cms']="";
				header("Location:?successfully-logout=1");
		}
		/* Show Lout out button if the Session is live*/
		if(
			(isset($_POST['username']) && $_POST['username']=="admin")
			&& 
			(isset($_POST['password']) && $_POST['password']=="fastest-admin")
		
			)
		{
			$_SESSION['fastest_cms']="its-a-fast-world" ;
		}
		else if(isset($_POST['username']) )
		{
			?>
			<h2>Wrong Credentails, Try Again. </h2>
			<?php
		}

		?>
		<style>
		body
		{
			
			margin:30px;
			background: #9D50BB; /* fallback for old browsers */
			background: -webkit-linear-gradient(to left, #9D50BB , #6E48AA); /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to left, #9D50BB , #6E48AA); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
			color:white;
		}
		.login
		{
			
			font-family: Tahoma, Geneva, sans-serif;
			padding:20px;
			border-radius: 3px;
		
			text-transform: uppercase;
			  letter-spacing: 2px;
			  width:250px;
		}
		.login h1,h2
		{

			font-family: arial;
		    text-transform: uppercase;
		    letter-spacing: 5px;
		  font-weight: normal;

			
		}
		input{font-size: 18px;
		    border-radius: 3px;
		    padding: 7px 10px;
		    color: white;


		    background-color: #6f48aa;
		    border: 1px solid #ffffff;
			margin:2px;}

		input[type="submit"]
		{
			font-family: Tahoma, Geneva, sans-serif;
			font-size:18px;
			margin-top:20px;
			padding: 7px 20px;
			letter-spacing: 2px;
		}
		a{
			color:white;
		}
		</style>
		<?php
			if(isset($_SESSION) && isset($_SESSION['fastest_cms']) && $_SESSION['fastest_cms']=="its-a-fast-world"  ) 
		{
		?>
		<div class="login">
			
		<h1>Logout ?</h1>
		<p>
			<a href="?logout-me=1">Logout</a>
		</p>
		<p>
			<a href="<?php echo BASEURL; ?>">Take me to Homepage</a>
		</p>
		</div>
		<?php
		exit;
		}
		?>
		<form action="" method="POST" class="login">
			<h1><i>Fastest</i> CMS Login</h1>
			<p>Username</p>
			<input type="text" name="username">
			<p>Password</p>
			<input type="password" name="password">
			<p>
			<input type="submit" value="LOGIN">
			</p>
		</form>
	<?php
	}
}
 ?>