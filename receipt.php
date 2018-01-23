<?php
session_start();
?>

<!DOCTYPE html>
<html>


<head>
<link href="sit104.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width= device-width,initial-scale =1">
</head>


<body background="background.png" id="bg" alt"">
<!--PUT YOUR HEADER HERE -->
<div>
	<picture>
	<img src="logo.png" alt="logo" style="width:40%">
</picture>
<ul>
	<li><a href="home.html">Home</a></li>
	<li><a href="product.html">Product</a></li>
	<li><a href="faq.html">FAQ</a></li>
	<li><a href="contact.html">Contact</a></li>
	<li><a href="search.html">Search</a></li>

</ul>
</div>
<!-- HEADER END-->

<div id="formtopper" style="width: 50%; margin: 0 auto; margin-top: 10%; text-align: center;">
<h1> Payment successfull!</h1>
<div style="text-align: left; ">
	<?php


/* Set oracle user login and password info */
$dbuser = "ffarizi"; /* your deakin login */
$dbpass = "sman21jakarta"; /* your oracle access password */
$db = "SSID";
$connect = oci_connect($dbuser, $dbpass, $db);

if (!$connect) {
echo "An error occurred connecting to the database";
exit;
}

/* check the sql statement for errors and if errors report them */
$stmt = oci_parse($connect, $query);
//echo "SQL: $query<br>";
if(!$stmt) {
echo "An error occurred in parsing the sql string.\n";
exit;
}
/*Initialisation for values that is going to be stored in database*/
$CardType_ = $_POST['paymet'];
$CardNum1 = $_POST['cardnumber_1'];
$CardNum2 = $_POST['cardnumber_2'];
$CardNum3 = $_POST['cardnumber_3'];
$CardNum4 = $_POST['cardnumber_4'];
$CardNumber_ = "{$CardNum1}{$CardNum2}{$CardNum3}{$CardNum4}";
$NameOnCard_ = $_POST['nameOnCard'];
$Cvc_ = $_POST['cvcode'];
$ExpYr = $_POST['expiryyear'];
$ExpMth = $_POST['month'];
$ExpDate_ = "{$ExpYr}{$ExpMth}";

/////////GOT VALUE FROM SESSION/////
$Book_Name = $_SESSION["book_title"];
$Qty_=$_SESSION["qty"];
$C_FullName_=$_SESSION["cust_name"];
$Phone_=$_SESSION["phone"];
$Email_=$_SESSION["email"];
$R_FullName_=$_SESSION["rec_name"];
$addr_line1_=$_SESSION["addr_line1"];
$addr_line2_=$_SESSION["addr_line2"];
$City_=$_SESSION["city"];
$State_=$_SESSION["state"];
$Postcode_=$_SESSION["postcode"];
$Qty_=$_SESSION["qty"];
$TotalPrice_=$_SESSION["total"];


/* build sql statement using form data */
$query = "SELECT * FROM Customer";

// get the max ID in plants table and put the new record at the same row with the last record
$max_id_stmt = "SELECT max(ID) FROM Customer";


// check the sql statement for errors and if errors report them 
$stmt = oci_parse($connect, $max_id_stmt); 
if(!$stmt) {
  echo "An error occurred in parsing the sql string.\n"; 
  exit; 
}
oci_execute($stmt);
$ID =0;
 
 if(oci_fetch_array($stmt)) {
  $ID= oci_result($stmt,1); //return the data from column 1
}else {
  echo "An error occurred in retrieving plant id.\n"; 
  exit; 
}
$ID++;

// Create the SQL statement to add the data. Note: field value should be single quoted '' if VARCHAR2 type.
$sql = "INSERT INTO Customer (ID,BOOK, QTY, CUST_NAME, PHONE_NUMBER,
EMAIL,REC_NAME,ADDR_LINE1,ADDR_LINE2,CITY,STATE,POSTCODE,TOTAL_PAYMENT, CARDTYPE,CARD_NUMBER,CARD_NAME,CVC,EXP_DATE) 
VALUES ($ID, '$Book_Name','$Qty_', '$C_FullName_', '$Phone_', '$Email_',
'$R_FullName_','$addr_line1_','$addr_line2_','$City_','$State_','$Postcode_','$TotalPrice_','$CardType_', '$CardNumber_','$NameOnCard_', '$Cvc_', '$ExpDate_')";

// Add the data to the database as a new record
$stmt = oci_parse($connect, $sql);

//CHECK ERROR//
if(!$stmt) {
echo "An error occurred in parsing the sql string.\n"; 
exit; 
} 


oci_execute($stmt);


///ECHO STATEMENT

echo ("<h1> Your Order ID is: 000$ID</h1>");
echo ("<h1> Order: $Book_Name</h1>");
echo ("<h1> Total payment: $TotalPrice_</h1>");
echo ("<h1> Order is going to be send to:</h1>");

echo ("<h1> $R_FullName_</h1>");

echo ("<h1> $addr_line1_</h1>");

echo ("<h1> $addr_line2_</h1>");

echo ("<h1> $City_ $State_ $Postcode_</h1>");

echo ("<h1> Thank you for shopping !</h1>");




// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();



?>
</div>
</div>

<!-- PUT YOUR FOOTER HERE -->
<div class="atthebottom" id="footer">
	<p>©Deakin University, School of Information Technology. This web page has been developed as a student assignment for the unit SIT104: Introduction to Web Development. Therefore it is not part of the University's authorised web site. DO NOT USE THE INFORMATION CONTAINED ON THIS WEB PAGE IN ANY WAY.</p>
</div>
</body>


</html>