<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>easycart>checkorder3</title>
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
<?php
//connect to the database - either include a connection variable file or
//type the following lines:
$connect = mysql_connect("localhost", "root", "") or
die ("Hey loser, check your server connection.");
mysql_select_db ("ecommerce");
//Let's make the variables easy to access in our queries
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$add1 = $_POST['add1'];
$add2 = $_POST['add2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];
$email = $_POST['email'];
$shipfirst = $_POST['shipfirst'];
$shiplast = $_POST['shiplast'];
$shipadd1 = $_POST['shipadd1'];
$shipadd2 = $_POST['shipadd2'];
$shipcity = $_POST['shipcity'];
$shipstate = $_POST['shipstate'];
$shipzip = $_POST['shipzip'];
$shipstate = $_POST['shipstate'];
$shipphone = $_POST['shipphone'];
$shipemail = $_POST['shipemail'];
$total = $_POST['total'];
$sessid = session_id();
$today = date("Y-m-d");
//1) Assign Customer Number to new Customer, or find existing customer number
$query = "SELECT * FROM customers WHERE
(firstname = '$firstname' AND lastname = '$lastname' AND add1 = '$add1' AND add2 = '$add2' AND city = '$city')";
$results = mysql_query($query)
or (mysql_error());
$rows = mysql_num_rows($results);
if ($rows < 1) {
//assign new custnum
$query2 = "INSERT INTO customers (
firstname, lastname, add1, add2, city, state, zip, phone, fax, email)
VALUES (
'$firstname',
'$lastname',
'$add1',
'$add2',
'$city',
'$state',
'$zip',
'$phone',
'$fax',
'$email')";
$insert = mysql_query($query2)
or (mysql_error());
$custid = mysql_insert_id();
}
//If custid exists, we want to make it equal to custnum
if($custid) $custnum = $custid;
//2) Insert Info into ordermain
//determine shipping costs based on order total (25% of total)
$shipping = $total * 0.25;
$query3 = "INSERT INTO ordermain (orderdate, custnum, subtotal,shipping, shipfirst, shiplast, shipadd1, shipadd2,shipcity, shipstate, shipzip, shipphone, shipemail)VALUES ('$today','$custnum','$total','$shipping','$shipfirst','$shiplast','$shipadd1','$shipadd2','$shipcity','$shipstate','$shipzip','$shipphone',
'$shipemail')";
$insert2 = mysql_query($query3)
or (mysql_error());
$orderid = mysql_insert_id();
//3) Insert Info into orderdet
//find the correct cart information being temporarily stored
$query = "SELECT * from carttemp WHERE sess='$sessid'";




$results = mysql_query($query)
or (mysql_error());
//put the data into the database one row at a time
while ($row = mysql_fetch_array($results)) {
extract ($row);
$query4 = "INSERT INTO orderdet (ordernum, qty, prodnum)
VALUES (
'$orderid',
'$quan','$prodnum')";
$insert4 = mysql_query($query4)
or (mysql_error());
}
//4)delete from temporary table
$query="DELETE FROM carttemp WHERE sess='$sessid'";
$delete = mysql_query($query);
//5)email confirmations to us and to the customer
/* recipients */
$to = "<" . $email .">";
/* subject */
$subject = "Order Confirmation";
/* message */
/* top of message */
$message = "
<html>
<head>
<title>Order Confirmation</title>
</head>
<body>
Here is a recap of your order:<br><br>
Order date:";
$message .= $today;
$message .= "
<br>
Order Number: ";
$message .= $orderid;
$message .= "
<table width='50%' border='0'>
<tr>
<td>
<p><font size='2'>Bill to:<br>";
$message .= $firstname;
$message .= " ";
$message .= $lastname;
$message .= "<br>";
$message .= $add1;
$message .= "<br>";
if ($add2) $message .= $add2 . "<br>";
$message .= $city . ", " . $state . " " . $zip;
$message .= "</p></td>
<td>
<p><font size='2'>Ship to:<br>";
$message .= $shipfirst . " " . $shiplast;
$message .= "<br>";
$message .= $shipadd1 . "<br>";
if ($shipadd2) $message .= $shipadd2 . "<br>";
$message .= $shipcity . ", " . $shipstate . " " . $shipzip;
$message .= "</font></p>
</td>
</tr>
</table>
<hr noshade width='250px' align='left'>
<table cellpadding='5'>
<tr>";
//grab the contents of the order and insert them
//into the message field
$query = "SELECT * from orderdet WHERE ordernum = '$orderid'";
$results = mysql_query($query)
or die (mysql_query());
while ($row = mysql_fetch_array($results)) {
extract ($row);
$prod = "SELECT * FROM products WHERE prodnum = '$prodnum'";
$prod2 = mysql_query($prod);
$prod3 = mysql_fetch_array($prod2);
extract ($prod3);
$message .= "<td><font size='2'>";
$message .= $quan;
$message .= "</font></td>";
$message .="<td><font size='2'>";
$message .= $name;
$message .= "</font></td>";
$message .= "<td align='right'><font size='2'>";
$message .= $price;
$message .= "</font></td>";
$message .= "<td align='right'><font size='2'>";
//get extended price
$extprice = number_format($price * $quan, 2);
$message .= $extprice;
$message .= "</font></td>";
$message .= "</tr>";
}
$message .= "<tr>
<td colspan='3' align='right'><font size='2'>
Your total before shipping is:</font>
</td>
<td align='right'><font size='2'>";
$message .= number_format($total, 2);
$message .= "</font>
</td>
</tr>
<tr>
<td colspan='3' align='right'><font size='2'>
Shipping Costs:</font>
</td>
<td align='right'><font size='2'>";
$message .= number_format($shipping, 2);
$message .= "</font>
</td>
</tr>
<tr>
<td colspan='3' align='right'><font size='2'>
Your final total is:</font>
</td>
<td align='right'><font size='2'> ";
$message .= number_format(($total + $shipping), 2);
$message .= "</font>
</td>
</tr>
</table>
</body>
</html>";
/* headers */
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: <storeemail@email.com>\r\n";
$headers .= "Cc: <storeemail@email.com>\r\n";
$headers .= "X-Mailer: PHP / ".phpversion()."\r\n";
/* mail it */
mail ($to, $subject, $message, $headers);
//6)show them their order & give them an order number

?>
Step 1 - Please Enter Billing and Shipping Information<br>
Step 2 - Please Verify Accuracy and Make Any Necessary Changes<br>
<strong>Step 3 - Order Confirmation and Receipt</strong><br><br>
Thank you for your order!<br><br>
Your order number is <?php echo $orderid ?>. Please print this page or retain
this number for your records.<br>
<br>
Here is a recap of your order:<br><br>
Order date: <?php echo $today ?><br>
<table width="50%" border="0">


<tr>
<td>
<p><font size="2">Bill to:<br>
<?php echo $firstname . "". $lastname ?><br>
<?php echo $add1 ?><br>
<?php if ($add2) echo $add2 . "<br>"?>
<?php echo $city . ", ". $state . "". $zip ?> </font></p>
</td>
<td>
<p><font size="2">Ship to:<br>
<?php echo $shipfirst . "". $shiplast ?><br>
<?php echo $shipadd1 ?><br>
<?php if ($shipadd2) echo $shipadd2 . "<br>"?>
<?php echo $shipcity . ", ". $shipstate . "". $shipzip ?> </font></p>
</td>
</tr>
</table>
<hr noshade width='250px' align='left'>
<table cellpadding="5">
<tr>
<?php
$query = "SELECT * from orderdet WHERE ordernum = '$orderid'";
$results = mysql_query($query)
or die (mysql_query());
while ($row = mysql_fetch_array($results)) {
extract ($row);
$prod = "SELECT * FROM products WHERE prodnum = '$prodnum'";
$prod2 = mysql_query($prod);
$prod3 = mysql_fetch_array($prod2);
extract ($prod3);
echo "<td><font size='2'>";
echo $quan;
echo "</font></td>";
echo "<td><font size='2'>";
echo $name;
echo "</font></td>";
echo "<td align='right'><font size='2'>";
echo $price;
echo "</font></td>";
echo "<td align='right'><font size='2'>";
//get extended price
$extprice = number_format($price * $quan, 2);
echo $extprice;
echo "</font></td>";
echo "</tr>";
}
?>
<tr>
<td colspan='3' align='right'><font size='2'>
Your total before shipping is:</font>
</td>
<td align='right'><font size='2'>
<?php echo number_format($total, 2) ?></font>
</td>
</tr>



<tr>
<td colspan='3' align='right'><font size='2'>
Shipping Costs:</font>
</td>
<td align='right'><font size='2'>
<?php echo number_format($shipping, 2) ?></font>
</td>
</tr>
<tr>
<td colspan='3' align='right'><font size='2'>
Your final total is:</font>
</td>
<td align='right'><font size='2'>
<?php echo number_format(($total + $shipping), 2) ?></font>
</td>
</tr>
</table>

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