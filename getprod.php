<?php
session_start();
//connect to the database - either include a connection variable file or
//type the following lines:?>

<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>easycart>getprod</title>
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
<h1>Products Info</h1>
<div align='center'>
<?php
$connect = mysql_connect("localhost", "root", "") or
die ("Hey loser, check your server connection.");
mysql_select_db ("ecommerce");
$prodid=$_REQUEST['prodid'];
$query = "SELECT * FROM products WHERE prodnum='$prodid'";
$results = mysql_query($query)
or die(mysql_error());
$row = mysql_fetch_array($results);
extract($row);
?>
<div align='center'>
<table width='500' cellpadding = '5'>
<tr>
<?php
echo "<td><img src=$img width='80px' height='80px'> </td>";
echo "<td>";
echo "<strong>";
echo $name;
echo "</strong><br>";
echo $proddesc;
echo "<br>";
echo "Product Number: ";
echo $prodnum;
echo "<br>Price: ";
echo $price;
echo "</td>";
?>
</tr>
<tr>
<td>
</td>
<td><form method="POST" action="add.php">
Quantity:
<input type="text" name="qty" size="2">
<input type="hidden" name="prodnum" value="<?php echo $prodnum ?>">
<input type="submit" name="Submit" value="Add to cart">
</form>
<form method = "POST" action="cart.php">
<input type="submit" name="Submit" value="View cart">
</form>
</td>
</tr>
</table>
<a href="product.php">Go back to the main page</a>
</div>
</div>


</div>

</div>
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