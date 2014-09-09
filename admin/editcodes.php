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
$message = $_GET["message"];
?>
<?php include('header.php')?>
<?php include('menu.php')?>

<div class="main_content">
  
    <div class="content_block">
        <h1>Select Code to Edit</h1>
    
        
            <?php
if ($message != '') {
?>
<div class="message"><?php echo $message; ?></div>
<?php
}
?>

        <p>
       <?php
my_connect();
$query= mysql_query("select * from wphelp");
$cnt=1;
?>
	<?php
		while($row = mysql_fetch_array($query))
		{?>
            <table border="1" align="center">
              <tr>
                <td width="530"><?php echo stripslashes($row['title']);?></td>
                <td width="170"><a id="update_link" href="update.php?sn=<?php echo $row['id']?>"> Click to Edit</a> <div class="admin_number"><?php echo $cnt; ?></div></td>
              </tr>
            </table>
    <?php 
	$cnt++;
	} ?>
        </p>
    </div>
    
   
    
</div>

<?php include('footer.php')?>