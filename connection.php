<?php
if(!isset($_SESSION))
{
	session_start();
	session_name('fastest-cms');
}
mysql_connect("localhost","root","") or die(mysql_error());
mysql_query('SET CHARACTER SET utf8');
mysql_select_db("instant_cms") or die(mysql_error());
define("enable_cms",true);
define("BASEURL","http://localhost/instant_cms/");
?>