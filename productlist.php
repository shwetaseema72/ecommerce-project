<?php
//connect to the database - either include a connection variable file or
//type the following lines:
$connect = mysql_connect("localhost", "root", "") or
die ("Hey loser, check your server connection.");
mysql_select_db ("ecommerce");
$query = "SELECT * FROM products";
$results = mysql_query($query)
or die(mysql_error());
?>
<HTML>
<HEAD>
<TITLE>Product List</TITLE>
</HEAD>
<BODY>
<table>
<tr>
<td width='10%'>Product Number</td>
<td width='20%'>Name</td>
<td width='50%'>Description</td>
<td width='10%'>Price</td>
<td width='10%'>Date Added</td>
</tr>
<tr>
<?php
while ($row = mysql_fetch_array($results)) {
extract ($row);
echo "<td width='10%'>";
echo $prodnum;
echo "</td><td width='20%'>";
echo $name;
echo "</td><td width='50%'>";
echo $proddesc;
echo "</td><td width='10%'>";
echo $price;
echo "</td><td width='10%'>";
echo $dateadded;
echo "</td></tr>";
}
?>
</table>
</BODY>
</HTML>