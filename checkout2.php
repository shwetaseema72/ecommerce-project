<?php
session_id();
session_start();
//connect to the database
$connect = mysql_connect("localhost", "root", "") or
die ("Hey loser, check your server connection.");
mysql_select_db ("ecommerce");
if ($_POST['same'] == 'on') {
$_POST['shipfirst'] = $_POST['firstname'];
$_POST['shiplast'] = $_POST['lastname'];
$_POST['shipadd1'] = $_POST['add1'];
$_POST['shipadd2'] = $_POST['add2'];
$_POST['shipcity'] = $_POST['city'];
$_POST['shipstate'] = $_POST['state'];
$_POST['shipzip'] = $_POST['zip'];
$_POST['shipphone'] = $_POST['phone'];
$_POST['shipemail'] = $_POST['email'];
}
?>
<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>easycart>checkout2</title>
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
    <div class="fl_right"><a href="#"><img src="images/itm_2013-06-23_00-26-30_1.jpg" alt="" /></a></div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
         <li class="active"><a href="index.html">Home</a></li>
        <li><a href="style-demo.html">Style Demo</a></li>
        <li><a href="products.html">products</a></li>
		<li><a href="services.html">services</a></li>
		<li><a href="contactus.html">contactus</a></li>
		<li><a href="aboutus.php">aboutus</a></li>
        <li><a href="#">DropDown</a>
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

<div id="text">
<h1>Billing and Shipping Information</h1>
<br /><br />

Step 1 - Please Enter Billing and Shipping Information<br>
<strong>Step 2 - Please Verify Accuracy and Make Any Necessary
Changes</strong><br>
Step 3 - Order Confirmation and Receipt<br>
<form method="post" action="checkout3.php">
<table width="300" border="1" align="left">
<tr>
<td colspan="2" bgcolor="#0000FF">
<div align="center"><font size="3" color="#FFFFFF">Billing
Information
</font></div>

</td>
</tr>
<tr>
<td width="50%">
<div align="right">First Name</div>
</td>
<td width="50%">
<input type="text" name="firstname" maxlength="15"
value="<?php echo $_POST['firstname']?> ">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">Last Name</div>
</td>
<td width="50%">
<input type="text" name="lastname" maxlength="50"
value="<?php echo $_POST['lastname']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">Billing Address</div>
</td>
<td width="50%">
<input type="text" name="add1" maxlength="50"
value="<?php echo $_POST['add1']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">Billing Address 2</div>
</td>
<td width="50%">
<input type="text" name="add2" maxlength="50"
value="<?php echo $_POST['add2']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">City</div>
</td>
<td width="50%">
<input type="text" name="city" maxlength="50"
value="<?php echo $_POST['city']?> ">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">State</div>
</td>
<td width="50%">
<input type="text" name="state" size="2" maxlength="2"
value="<?php echo $_POST['state']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">Zip</div>
</td>
<td width="50%">
<input type="text" name="zip" maxlength="5" size="5"
value="<?php echo $_POST['zip']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">Phone Number</div>
</td>
<td width="50%">
<input type="text" name="phone" size="12" maxlength="12"
value="<?php echo $_POST['phone']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">Fax Number</div>
</td>
<td width="50%">
<input type="text" name="fax" maxlength="12" size="12"
value="<?php echo $_POST['fax']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">E-Mail Address</div>
</td>
<td width="50%">
<input type="text" name="email" maxlength="50"
value="<?php echo $_POST['email']?>">
</td>
</tr>
</table>
<table width="300" border="1">
<tr bgcolor="#990000">
<td colspan="2">
<div align="center"><font size="3" color="#FFFFFF">Shipping
Information
</font></div>
</td>
</tr>
<tr>
<td width="50%">
<div align="right">Shipping Info same as Billing</div>
</td>
<td width="50%">







<input type="checkbox" name="same"></td>
</tr>
<tr>
<td width="50%">
<div align="right">First Name</div>
</td>
<td width="50%">
<input type="text" name="shipfirst" maxlength="15"
value="<?php echo $_POST['shipfirst']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">Last Name</div>
</td>
<td width="50%">
<input type="text" name="shiplast" maxlength="50"
value="<?php echo $_POST['shiplast']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">Billing Address</div>
</td>
<td width="50%">
<input type="text" name="shipadd1" maxlength="50"
value="<?php echo $_POST['shipadd1']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">Billing Address 2</div>
</td>
<td width="50%">
<input type="text" name="shipadd2" maxlength="50"
value="<?php echo $_POST['shipadd2']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">City</div>
</td>
<td width="50%">
<input type="text" name="shipcity" maxlength="50"
value="<?php echo $_POST['shipcity']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">State</div>
</td>
<td width="50%">
<input type="text" name="shipstate" size="12" maxlength="12"

value="<?php echo $_POST['shipstate']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">Zip</div>
</td>
<td width="50%">
<input type="text" name="shipzip" maxlength="12" size="12"
value="<?php echo $_POST['shipzip']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">Phone Number</div>
</td>
<td width="50%">
<input type="text" name="shipphone" size="12" maxlength="12"
value="<?php echo $_POST['shipphone']?>">
</td>
</tr>
<tr>
<td width="50%">
<div align="right">E-Mail Address</div>
</td>
<td width="50%">
<input type="text" name="shipemail" maxlength="50"
value="<?php echo $_POST['shipemail']?>">
</td>
</tr>
</table>

<br />
<br />

<h1>Products in your Cart</h1>
<table border="1" align="left" cellpadding="5">
<tr>
<td>Quantity</td>
<td>Item Image</td>
<td>Item Name</td>
<td>Price Each</td>
<td>Extended Price</td>
<td></td>
<td></td>
</tr>
<tr>
<?php
$sessid = session_id();
$query = "SELECT * FROM carttemp WHERE sess = '$sessid'";
$results = mysql_query($query)
or die (mysql_query());
while ($row = mysql_fetch_array($results)) {
extract ($row);
$prod = "SELECT * FROM products WHERE
prodnum = '$prodnum'";
$prod2 = mysql_query($prod);

$prod3 = mysql_fetch_array($prod2);
extract ($prod3);
echo "<td>";
echo $quan;
echo "</td>";
echo "<td>";
echo "<a href = 'getprod.php?prodid=" .$prodnum ."'>";
echo "<img src=$img width='80px' height='80px'></td></a>";
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
echo "<a href='add.php'>Make Changes to Cart</a>";
echo "</td>";
echo "</tr>";
//add extended price to total
$total = $extprice + $total;
}
?>
<tr>
<td colspan='4' align='right'>Your total before shipping is:</td>
<td align='right'> <?php if(isset($_POST['total']))
 echo number_format($total, 2) ?></td>
<td></td>
<td></td>
</tr>
</table>
<input type="hidden" name="total" value="<?php echo $total?>">
<p>
<input type="submit" name="Submit" value="Send Order —&gt;">
</p>
</form>

</div>

</div>
<!-- end main -->
<!-- footer -->
<div class="wrapper col5">
  <div id="footer">
    <div class="footbox twitter">
      <h2>Latest From Twitter</h2>
      <ul>
       <li><a href="#">shweta</a> hi this is shweta  1 day ago</li>
        <li><a href="#">savita</a> shoes are really awesome .gud experience. 1 day ago</li>
        <li><a href="#">khushboo</a> totally worth it.</li>
        <li><a href="#">ishita</a> i just lvd it. 1 day ago</li>
        <li><a href="#">banisha</a> thnku shweta. 1 day ago</li>
      </ul>
    </div>
    <div class="footbox flickr">
      <h2>Latest From Flickr</h2>
      <ul>
        <li><a href="#"><img src="images/1.jpg" alt="" /></a></li>
        <li><a href="#"><img src="images/2.jpg" alt="" /></a></li>
        <li><a href="#"><img src="images/5.jpg" alt="" /></a></li>
        <li><a href="#"><img src="images/4.jpg" alt="" /></a></li>
        <li><a href="#"><img src="images/601455_1407035102855190_2099265663_n.jpg" alt="" /></a></li>
        <li><a href="#"><img src="images/6.jpg" alt="" /></a></li>
      </ul>
      <br class="clear" />
    </div>
    <div class="footbox posts">
      <h2>Latest Blog Posts</h2>
      <ul>
        <li><a href="#">best site ever</a></li>
        <li><a href="#">shweta </a></li>
        <li><a href="#">khushboo</a></li>
        <li><a href="#">savita</a></li>
        <li><a href="#">nice site</a></li>
        <li><a href="#">good qaulity stuffs</a></li>
        <li><a href="#">happy ^_^</a></li>
        <li><a href="#">best deals</a></li>
        <li class="last"><a href="#">love your offers</a></li>
      </ul>
    </div>
    <div class="footbox banners last">
      <h2>Advertise Here</h2>
      <ul>
        <li><a href="#"><img src="images/demo/200x150.gif" alt="" /></a></li>
        <li><a href="#"><img src="images/demo/200x150.gif" alt="" /></a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col6">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2011 - All Rights Reserved - <a href="#">Domain Name</a></p>
    
    <br class="clear" />
  </div>
</div>
</body>
</html>