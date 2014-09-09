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
<script type="text/javascript">
function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {
    alert(alerttxt);return false;
    }
  else
    {
    return true;
    }
  }
}
function validate_form(thisform)
{
with (thisform)
  {
  if (validate_required(title,"Please fill title for content!")==false)
  {title.focus();return false;}
  
  if (validate_required(content,"Please fill content!")==false)
  {content.focus();return false;}
  }
}
</script>
<?php include('menu.php')?>

<div class="main_content">
  
    <div class="content_block">
        <h1>Add New Code</h1>
    
        
            <?php
if ($message != '') {
?>
<div class="message"><?php echo $message; ?></div>
<?php
}
?>

        <p>
      
      <form action="post.php" onsubmit="return validate_form(this)" method="post">
      <input type="hidden" name="action" value="addnew" />
Title:<br /><input type="text" name="title" class="text_field" value="" id="inputfield" />
<br />
Contet:<br /><textarea name="content"  rows="10" class="text_area"  id="inputfieldarea" ></textarea>
<br />
<input type="submit" class="text_button" value="Add New" class="addok" />
</form>
        </p>
    </div>
    
   
    
</div>

<?php include('footer.php')?>