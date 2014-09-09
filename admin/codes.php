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
$priority = $_GET["priority"];
?>
<?php include('header.php')?>
<?php include('menu.php')?>

<div class="main_content">
  
    <div class="content_block">
        <h1>List of All Codes</h1>
    
        
            <?php
			
			if ($priority=='red'){
			$message_color='#FF5B5B';
			}
			
if ($message != '') {
?>
<div class="message" style="background-color:<?php echo $message_color; ?>"><?php echo $message; ?></div>
<?php
}
?>

        <p>
       <?php
my_connect();
$query= mysql_query("select * from wphelp ORDER BY 'id' ASC");
$cnt=1;
?>
	<?php
		while($row = mysql_fetch_array($query))
		{?>
            <table border="1" align="center">
              <tr>
                <td width="530"><?php echo stripslashes($row['title']);?></td>
                <td width="170"> 
                <form action="post.php" onsubmit="return confirm('Are you sure you want to delete?')" method="post">
      			<input type="hidden" name="action" value="delete" />
                <input type="hidden" name="id" value="<?php echo stripslashes($row['id']);?>" />
                
                <input type="submit" value="Delete" id="delete_link"/>
                </form>
                <a id="update_link" href="update.php?sn=<?php echo $row['id']?>"> Update</a><div class="admin_number"><?php echo $cnt; ?></div></td>
              </tr>
            </table>
    <?php
	$cnt++;
	 } ?>
        </p>
    </div>
    
   
    
</div>

<?php include('footer.php')?>