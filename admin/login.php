<?php
// we must never forget to start the session
session_start();
$errorMessage = '';
if (isset($_POST['txtUserId']) && isset($_POST['txtPassword'])) {
// check if the user id and password combination is correct
if ($_POST['txtUserId'] === 'xxxx' && $_POST['txtPassword'] === 'xxxx') {
// the user id and password match,
// set the session
$_SESSION['basic_is_logged_in'] = true;

// after login we move to the main page
header('Location: index.php');
exit;
} else {
$errorMessage = 'Sorry, wrong user id / password';
}
}
?>
<?php include('header.php')?>

<div class="login_main">


<div class="login_form">
	<div class="form_bg">
    <h1><center>Master Administrator Login</center></h1>
    <?php
if ($errorMessage != '') {
?>
<div class="message"><?php echo $errorMessage; ?></div>
<?php
}

?>
    <form method="post" name="frmLogin" id="frmLogin">
    
    <p>Name : <input name="txtUserId" class="admin_name" type="text"  /></p>
    <p>Passoword : <input name="txtPassword" class="admin_pass" type="password" /></p>
 
    
    <input type="submit" name="btnLogin" class="admin_button" value="Login">
    </form>
    <div class="forgot"></div>
    </div>
</div>

</div>


<?php include('footer.php')?>
