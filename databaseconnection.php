<?php
//session_start();  // Developed by www.freestudentprojects.com
$db=@mysql_connect("localhost","root","");
mysql_select_db("hostelmanagement",$db);
if(!$db)
{
	echo"unable to establish connection to server";
}
?>
