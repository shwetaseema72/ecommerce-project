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
<?php
session_id();
session_start();
//connect to the database
$connect = mysql_connect("localhost", "root", "") or
die ("Hey loser, check your server connection.");
mysql_select_db ("ecommerce");
?>


<TITLE>Here is Your Shopping Cart!</TITLE>


<div align="center">
You currently have
<?php
$sessid = session_id();
//display number of products in cart
$query = "SELECT * from carttemp WHERE sess = '$sessid'";
$results = mysql_query($query)
or die (mysql_query());
$rows = mysql_num_rows($results);
echo $rows;
?>
product(s) in your cart.<br>
<table border="1" align="center" cellpadding="5">
<tr>
<td>Quantity</td>
<td>Item Image</td>
<td>Item Name</td>
<td>Price Each</td>
<td>Extended Price</td>


<td></td>
<td></td>
</tr>
<?php
while ($row = mysql_fetch_array($results)) {
extract ($row);
$prod = "SELECT * FROM products WHERE prodnum ='$prodnum'";
$prod2 = mysql_query($prod);
$prod3 = mysql_fetch_array($prod2);
extract ($prod3);
echo "<td><form method = 'POST' action='change.php'>
<input type='hidden' name='prodnum'
value='$prodnum'>
<input type='hidden' name='sessid'
value='$sessid'>
<input type='hidden' name='hidden'
value='$hidden'>
<input type='text' name='qty' size='2'
value='$quan'>";
echo "</td>";
echo "<td>";
echo "<a href = 'getprod.php?prodid=" .
$prodnum ."'>";
echo "<img src=$img width=80px height=80px> </td></a>";
echo "<td>";
echo "<a href = 'getprod.php?prodid=" .
$prodnum ."'>";
echo $name;
echo "</td></a>";
echo "<td align='right'>";
echo $price;
echo "</td>";
echo "<td align='right'>";
//get extended price
$extprice = number_format($price * $quan, 2);
echo $extprice;
echo "</td>";
echo "<td>";
echo "<input type='submit' name='Submit'
value='Change Qty'>
</form></td>";
echo "<td>";
echo "<form method = 'POST' action='delete.php'>
<input type='hidden' name='prodnum'
value='$prodnum'>
<input type='hidden' name='qty' value='$quan'>
<input type='hidden' name='hidden'
value='$hidden'>
<input type='hidden' name='sessid'
value='$sessid'>";
echo "<input type='submit' name='Submit'
value='Delete Item'>
</form></td>";
echo "</tr>";

//add extended price to total
if(isset($_POST['total']))
$total = $extprice + $total;
}
?>
<tr>
<td colspan='4' align='right'>Your total before shipping is:</td>
<td align='right'> <?php 
if(isset($_POST['total']))
echo number_format($total, 2) ?></td>
<td></td>
<td></td>
</tr>
</table>
<form method="POST" action="checkout.php">
<input type='submit' name='Submit' value='Proceed to Checkout'>
</form>
<a href="product.php">Go back to the main page</a>
</div>
</BODY>
</HTML>
