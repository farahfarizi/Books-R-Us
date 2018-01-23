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

<!--PHP code starts here -->
<?php

ini_set(SMTP,"mail.deakin.edu.au");

/* Set oracle user login and password info */
$dbuser = "ffarizi"; /* your deakin login */
$dbpass = "sman21jakarta"; /* your oracle access password */
$db = "SSID";

$connect = oci_connect($dbuser, $dbpass, $db);

if (!$connect) {
echo "An error occurred connecting to the database";
exit;
}

/*Specifying email this code is inactive as the mail is not exist*/
$mail = "contact@BooksRUS.com.au";
$from = $_REQUEST['email'] ;
$subject = $_REQUEST['mailsubject'] ;
$message = $_REQUEST['message'] ;
$name = $_REQUEST['fullname'] ;

/*Initialisation for values that is going to be stored in database*/
$Mail_ = $_POST['email'];
$Name_ = $_POST['fullname'];
$Subject_ =$_POST['mailsubject'];
$Message_ =$_POST ['message'];

$fromfield = "From: " . $from;
mail ($mail, $subject, $message, $fromfield);

/* build sql statement using form data */
$query = "SELECT * FROM Mail";

// get the max ID in plants table and allocate $ID+1 for the new record
$max_id_stmt = "SELECT max(ID) FROM Mail ";

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
$sql = "INSERT INTO Mail (ID,Sender_Mail, Sender_Name, Subject, Message) VALUES ($ID, '$Mail_', '$Name_', '$Subject_', '$Message_')";

// Add the data to the database as a new record
$stmt = oci_parse($connect, $sql);

//CHECK ERROR//
if(!$stmt) {
echo "An error occurred in parsing the sql string.\n"; 
exit; 
} 

oci_execute($stmt);
echo ("<h1>Your enquiries is sent to our mailbox as requested!</h1>");
echo ("<h1>Please allow 3-5 working days for us to process your question</h1>");



?>


</div>

<!-- PUT YOUR FOOTER HERE -->
<div class="atthebottom" id="footer">
	<p>©Deakin University, School of Information Technology. This web page has been developed as a student assignment for the unit SIT104: Introduction to Web Development. Therefore it is not part of the University's authorised web site. DO NOT USE THE INFORMATION CONTAINED ON THIS WEB PAGE IN ANY WAY.</p>
</div>
</body>


</html>