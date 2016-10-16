<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>easycart>products</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
</head>
<body id="top">
<div class="wrapper col1">
  <div id="header">
    <div class="fl_left">
      <h1><a href="#">easycart</a></h1>
      <p>online shopping</p>
    </div>
    <div class="fl_right"><a href="#"><img src="images/soni.jpg" alt="" /></a></div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
         <li><a href="index.php">Home</a></li>
        <li><a href="style-demo.php">Style Demo</a></li>
        <li class="active"><a href="product.php">products</a></li>
		<li><a href="services.php">services</a></li>
		<li><a href="contactus.php">contactus</a></li>
        <li><a href="#">DropDown</a>
          </ul>
		  <ul>
            <li><a href="#">men</a></li>
            <li><a href="#">women</a></li>
            <li><a href="#">kids</a></li>
          </ul>
        </li>
        <li class="last"><a href="#">A Long Link Text</a></li>
      </ul>
    </div>
    <div id="search">
      <form action="#" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" value="Search Our Website&hellip;"  onfocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;" />
          <input type="submit" name="go" id="go" value="Search" />
        </fieldset>
      </form>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->

<div class="wrapper col3">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="#">Home</a></li>
      <li>&#187;</li>
      <li><a href="#">Grand Parent</a></li>
      <li>&#187;</li>
      <li><a href="#">Parent</a></li>
      <li>&#187;</li>
      <li class="current"><a href="#">Child</a></li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<form>
<div id="breadcrumb">
<div class="fl_right"
<div id="breadcrumb">
<h3> <font size="+3"><font color="#FFCC33">The easycart </font></font></h3>
<font size="+2">Easycart is the best site i have gone through on net.I am very satisfied with the services they provide</font><br><br>
<h3><font size="+2">you can view products by clicking the following products link </font></h3>
<ul>
<li><font size="+2"><font color="#FFFFFF"><a href="index.html" class="active">home</a></font></font></li></br>
<li><font size="+2"><font color="#FFFFFF"><a href="aboutus.php">about us</a></font></font></li></br>
<li><font size="+2"><font color="#FFFFFF"><a href="services.php">services</a></font></font></li></br><img src="images/casual-dress-for-women-36.jpg" />
<li><font size="+2"><font color="#FFFFFF"><a href="product.php">products</a></font></font></li></br>
<li><font size="+2"><font color="#FFFFFF"><a href="contactus.php">contact Us</a></font></font></li></br>
</ul>
</div>

</form>
<?php
//connect to the database - either include a connection variable file or
//type the following lines:
$connect = mysql_connect("localhost", "root", "") or
die ("Hey loser, check your server connection.");
mysql_select_db ("ecommerce");
$query = "INSERT INTO products VALUES 
('00001','the red high heels.',
Our heels are high quality and super fine.',
1117.95, '2003-08-01'),
('00002','red pencil heels',
'Let the world know you are a proud supporter of the
CBA Web site with this colorful heels.',
1115.95, '2003-08-01'),
('00003', 'the dark queen',
'With the CBA logo looking back at you over your
walk, you\'re sure to have a great
start to your day. Our heels are comfortabler\r\nsafe.',
800.95, '2003-08-01'),
('00004', 'the pink princess',
'We have a complete selection of colors and sizes for you
to choose from. the heels are is sleek, stylish, and
won\'t hinder your crime-fighting or evil scheming abilities.
We also offer your choice in monogrammed letter applique.',
1199.95, '2003-08-01'),
('00005', 'trendy suit',
'This suit will get you out of the tightest
places. Specially designed for comfort and fashion.',
1139.95, '2003-08-01'),
('00006', 'the flawless dress',
''this will charm your personality\r\n throughout the city.',
199.95, '2003-08-01')";
$result = mysql_query($query)
or die(mysql_error());
echo "Products added successfully!";

