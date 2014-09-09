<?php
// like i said, we must never forget to start the session
session_start();
// is the one accessing this page logged in or not?
if (!isset($_SESSION['basic_is_logged_in'])
    || $_SESSION['basic_is_logged_in'] !== true) {
    // not logged in, move to login page
    header('Location: login.php');
    exit;
}
include('function.php');
if ((isset($_POST["title"])) && ($_POST["title"]=="") && (isset($_POST["content"])) && ($_POST["content"]==""))
{
echo "No Data";	
}
else
{
$title=$_POST["title"];
$content=$_POST["content"];
$id=$_POST["id"];
$con = mysql_connect("localhost","root","");
	if (!$con)
 		  {
  		die('Could not connect: ' . mysql_error());
  		  }
		mysql_select_db("wphelp", $con);
$sql="update wphelp set title = '".  mysql_real_escape_string($_POST[title]) . "', content= '" .  mysql_real_escape_string($_POST[content]) . "' where id= '$id'";
			if (!mysql_query($sql,$con))
  				{
  				die('Error:' . mysql_error());
  				}
			header( 'Location: codes.php?message=Code Updated');
			mysql_close($con);
}
		 //mysql_query("update tb_facility set title='$title',news='$desc',image='$upload_file' where id ='$nid'");
		
			?>