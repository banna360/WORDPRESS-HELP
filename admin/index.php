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
?>
<?php include('header.php')?>
<?php include('menu.php')?>
<div class="main_content">
    <div class="content_block">
        <h1>Welcome to WP HELP admin panel</h1>
        <p><span class="text_bold">Domain : </span>wphelp.banna360.com</p>
        <p><span class="text_bold">User Name :  </span>admin</p>
        <p><span class="text_bold">Email :  </span>hello@banna360.com</p>
    </div>
    
    <div class="content_block">
        <h1>About</h1>
        <p>
       WP Help is a Sweans web team initiative project to collect various type of code used with different cases and scenarios. The project is run on a AS IS nature any one can contribute and use them whatever it may be.
        </p>
    </div>
    
     <div class="content_block">
        <h1>NOTICE:</h1>
        <p>
     Be carefull while using delete feature. There is no rollback at any point (:
        </p>
    </div>
    
    <div class="content_block">
        <h1>CoDe  is poetry :)</h1>
        <p>
      We acknowledge the project to great developers ever inspired us on life and code:)
        </p>
    </div>
    
     <div class="content_block">
        <h1>Contributors :)</h1>
        <p>
     Banna,Aboobacker,Anjana,Jauhara,Binoy,Suprana<br />
     ~Dsn* Inspired From Facebook, Special Thanks to Mark, MA.TT, James Lim, Keir, Shelly, Hoxxy, MMTE, MacVei, drhimadiri
        </p>
    </div>
       
       
    
    
</div>

<?php include('footer.php')?>