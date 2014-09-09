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
// every page needs to start with these basic things 
// I'm using a separate config file. so pull in those values 
require("config.inc.php"); 
// pull in the file with the database class 
require("Database.class.php"); 
// create the $db object 
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$action= $_POST["action"];
$id = $_POST["id"];
$data['title'] = $_POST["title"];
$data['content'] = $_POST["content"];
?>
<?php
$db->connect(); 
switch($action) {
		// Everything is shamelessly stolen and rewritten.
		case 'addnew':
					
					$db->query_insert("wphelp", $data); 
					header( 'Location: codes.php?message=One new code added');
					break;
					
		case 'delete':
					$sql = "DELETE FROM ".TABLE_WPHELP." WHERE id='$id'";
					$db->query($sql);
					header('Location: codes.php?message=Entry Deleted&priority=red');
					break;
		case 'update':
					$db->query_update(TABLE_WPHELP, $data, "id='$id'");
					header( 'Location: codes.php?message=Updated');
					break;
		default:
					header('Location: codes.php?message=Error');
					break;
				}// End Stealing
$db->close();
?>