<?php include('admin/function.php'); 
$search = $_GET["search"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WP-Help Ver 2.0</title>
<link href="admin/styles/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="maincontainer">
	<div class="header">
  
    <div class="header_main">
    <a href="index.php" class="logo"></a>
    
    <div class="search_box">
    <form action="search.php" method="get" id="searchform">
<input type="text" name="search" class="search_field" value="Search for a topic..." onclick="if(this.value=='Search for a topic...')this.value='';" onblur="if(this.value=='')this.value='Search for a topic...';">
      <input type="submit" value="Search" class="nav_search_button">
	</form>
    
    </div>
    </div>
    
    </div>
	<div class="page"> 
    <div class="page_main">
    
   <div class="heading">Search results...</div>
  <?php
	
	my_connect();
$query= mysql_query("SELECT * FROM wphelp WHERE title LIKE '$search'");?>
 <div class="coddiv_list">
   <div class="index_list">
   <ul>
<?php while($row = mysql_fetch_array($query))

  	{ ?>
  
   
   <li><a href="#<?php echo stripslashes($row['title']); ?>"><?php echo stripslashes($row['title']); ?></a></li>
  
 	<?php } ?> 
    </ul>
   </div>
   </div>
        <?php
		my_connect();
$query= mysql_query("select * from wphelp");
$cnt=1;
while($row = mysql_fetch_array($query))

  {?>
  
  
  <?php
  echo '<div class="heading">';?>
  
  <a name="<?php echo stripslashes($row['title']); ?>"></a>
  <?php echo stripslashes($row['title']);
  echo '</div>';
  ?>
  	<div class="banna">
  	<?php 
  	echo '<div class="coddiv">';
	echo '<div class="entry_number">' . $cnt . '</div>';
  	echo highlight_string(stripslashes($row['content']),TRUE);
  	echo '</div>';
	?>
    </div>
 	 <?php
 	 echo "<br />";
	 $cnt++;
 	 }
	?>

		
       
      </div>		
</div>
<div class="footer_main">
<div class="footer">
&copy; Some rights reserved 2011-2018 | dEvd By <a href="http://banna360.com" target="_blank">Banna</a>
<p>
~Dsn* Inspired From Facebook, Special Thanks to Aboobacker,Anjana,Jauhara,Renith,Suparna,Prajita,Binoy,Manjusha,Jincy,Roshna,Mark, MA.TT,James Lim,Keir,Shelly,Hoxxy,MMTE, MacVei,drhimadiri ,RAA,Riya,Shabi
</p>

</div>

  </div>
  </div>
</div>
</body>
</html>