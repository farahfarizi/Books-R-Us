<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
	<link href="sit104.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width= device-width,initial-scale =1">
<style>
    #cardnumber{
        display: inline-block;
        float: right;
    }
</style>
<script>

    function validate(){
        //INITIALISE VARIABLES
        var payment = document.getElementsByName("paymet");
        var c_number = document.forms["secondform"]["cardnumber_1"].value;
        var c_number_2 = document.forms["secondform"]["cardnumber_2"].value;
        var c_number_3 = document.forms["secondform"]["cardnumber_3"].value;
        var c_number_4 = document.forms["secondform"]["cardnumber_4"].value;
        var cvc = document.forms["secondform"]["cvcode"].value;
        var c_name = document.forms["secondform"]["nameOnCard"].value;
        var exp_month = document.forms["secondform"]["month"].value;
        var exp_year = document.forms["secondform"]["expiryyear"].value;
        var check = document.forms["secondform"]["agreement"].checked;

        //CARD TYPE VALIDATION
        if(payment[0].checked==false && payment[1].checked==false
            && payment[2].checked==false){
            alert("you must choose your card type!");
        return false;
        }


        //CARD NUMBER VALIDATION
        else if(c_number==""||c_number_2==""||c_number_3==""||c_number_4=="")
        {
            alert("you must fill your card number!");
            return false;
        }else if(c_number.length !=4 || c_number_2.length!=4 || c_number_3.length!=4 || c_number_4.length!=4){
            alert("your credit card number must be 4 digits in each section!");
            return false;
        }
        else if(isNaN(c_number)||isNaN(c_number_2)
            || isNaN(c_number_3) || isNaN(c_number_4)){
            alert("card number have to be numeric!");
            return false;
        }

        //CARD NAME VALIDATION
        else if(c_name==""){
            alert("card name must not be left empty!");
            return false;
        }

        //CVC VALIDATION
        else if(cvc==""){
            alert("CVC code must not be left empty!");
            return false;
        }else if(isNaN(cvc)){
            alert("CVC code must be numeric!");
            return false;
        }else if(cvc.length!=3){
         alert("CVC code must be 3 digits!");
            return false;   
        }

        //EXPIY MONTH VALIDATION
        else if((exp_month=="1"||exp_month=="2"
            ||exp_month=="3"||exp_month=="4"
            ||exp_month=="5"||exp_month=="6"
            ||exp_month=="7"||exp_month=="8"||exp_month=="9")&&exp_year=="2017"){
            alert("your card has expired! Please insert a valid card!");
            return false;

        }

        //CHECK TERMS AND CONDITION CHECKBOXES    
        else if(check == false){
            alert("You must agree with the term and condition!");
            return false;
        }

        //ALL VALIDATION FINISH WITHOUT ANY ERRORS
        else{
          
        return true;  
        }
      
    }
</script>
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
<!--END OF HEADER -->

<form name="secondform" onsubmit="return validate()" method="post" action="receipt.php">
<div class="forms">
	<div id="formtopper" style="text-align: center;"><h1>Payment</h1>



</div>

<div id="contactforminside">
<div >
<!-- PHP SCRIPT, USE SESSION TO GET THE VALUE FROM ORDERFORM1
PASSED IT ONTO THE NEXT PAGE FOR RECEIPT-->
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
$Book_ = $_POST['book'];
$Qty_ = $_POST['book_qty'];
$C_FirstName = $_POST['clientfirstname'];
$C_LastName = $_POST['clientlastname'];

/*http://php.net/manual/en/language.operators.string.php#60035*/
$C_FullName_ = "{$C_FirstName} {$C_LastName}";
$PhoneArea = $_POST['phonearea'];
$PhoneNum = $_POST['phonearea2'];
$Phone_ = "+{$PhoneArea} {$PhoneNum}";
$Email_= $_POST['email'];
$R_firstName = $_POST ['re_firstname'];
$R_lastname = $_POST['re_lastname'];
$R_FullName_ = "{$R_firstName} {$R_lastname}";
$addr_line1_ = $_POST['addressline1'];
$addr_line2_ = $_POST['addressline2'];
$City_ = $_POST['city'];
$State_ = $_POST['state'];
$Postcode_ = $_POST['postcode'];
$FloatQty = (float)$Qty_;
$Book_Name ="";
$Book_Price = "";
$calc="";


//$calc='';
/* GENERATE PRICE AND BOOK NAME AND TOTAL PRICE*/

if($Book_ == 1)
{
$Book_Name = "Clementine Rose and the Birthday Emergency";
$Book_Price = 12.99; 
$calc = ($Book_Price*$FloatQty);

}

elseif($Book_== 2){
$Book_Name = "Eat Real Food";
$Book_Price = 29.99; 
$calc = ($Book_Price*$FloatQty);

}



elseif($Book_ == 3){
$Book_Name = "Live Well on Less";
$Book_Price = 24.99; 
$calc = ($Book_Price*$FloatQty);

}

elseif($Book_ == 4){
$Book_Name = "My Life 
It's a Long Story";
$Book_Price =32.99; 
$calc = ($Book_Price*$FloatQty);

}


elseif($Book_ == 5){
$Book_Name = "Sword of Summer ";
$Book_Price = 19.99; 
$calc = ($Book_Price*$FloatQty);

}


elseif($Book_ == 6){
$Book_Name = "Middle School : 
Just My Rotten Luck";
$Book_Price = 15.99; 
$calc = ($Book_Price*$FloatQty);

}


elseif($Book_ == 7){
$Book_Name = "Modeling and Simulation for the Sciences";
$Book_Price = 132.75; 
$calc = ($Book_Price*$FloatQty);

}

elseif($Book_ == 8){
$Book_Name = "Fundamentals of Digital Logic with VHDL Design";
$Book_Price = 190.25; 
$calc = ($Book_Price*$FloatQty);

}

elseif($Book_ == 9){
$Book_Name = "Distributed Systems 
Principles and Paradigms";
$Book_Price = 197.80; 
$calc = ($Book_Price*$FloatQty);

}

$TotalPrice_ = $calc;


///SET SESSION VARIABLE////////
$_SESSION["book_title"]= $Book_Name;
$_SESSION["qty"]=$Qty_;
$_SESSION["cust_name"]=$C_FullName_;
$_SESSION["phone"]=$Phone_;
$_SESSION["email"]=$Email_;
$_SESSION["rec_name"]=$R_FullName_;
$_SESSION["addr_line1"]=$addr_line1_;
$_SESSION["addr_line2"]=$addr_line2_;
$_SESSION["city"]=$City_;
$_SESSION["state"]=$State_;
$_SESSION["postcode"]=$Postcode_;
$_SESSION["qty"]=$Qty_;
$_SESSION["total"]=$TotalPrice_;

//ECHO STATEMENT TO SHOW SOME VARIABLES VALUES
echo ("<h1> Order: $Book_Name</h1>");
echo ("<h1> Quantity: $Qty_</h1>");

echo ("<h1> Total Price: $ $TotalPrice_</h1>");




?></div>


<h1 ">Billing Information<br><br></h1>
<div style="margin-left: 200px;">
<h1 style="margin-top: -20px;">Card type

<div style="margin-left: 250px; margin-top: -20px;"><br>	<div style="margin-left: -250px; margin-top: 5px;"><input type="radio" name="paymet" id="payment1" value="master"> 
<img src="mastercard.png" style="margin-right: 25px;">
<input type="radio" name="paymet" id="payment2" value="visa"><img src="visalogo.png" style="margin-right: 25px;">
<input type="radio" name="paymet" id="payment3" value="amex"> <img src="amex.png"></div>
</div>


</h1>


<h1 style="margin-top: -20px;"><br>Card number<br> 
<div style="margin-top: 2px;">

<input type="text" name="cardnumber_1"  size="5" placeholder="xxxx" id="cardnumber" style="float: left; margin-right: 10px;" maxlength="4">

<input type="text" name="cardnumber_2" size="5" placeholder="xxxx" id="cardnumber" style="float: left; margin-right: 10px" maxlength="4"> 

<input type="text" name="cardnumber_3" size="5" placeholder="xxxx" id="cardnumber" style="float: left; margin-right: 10px" maxlength="4"> 

<input type="text" name="cardnumber_4" size="5" placeholder="xxxx" id="cardnumber" style="float: left;" maxlength="4"> <br></div>
</h1>
<h1>Name on card <br>
<input type="text" name="nameOnCard" class="entryfield" size="60" style="float: left;"> <br></h1>


<h1><div style="display: inline; margin-right: 150px;">Expiration date</div>
<div style="display: inline;">CV code</div> 
<br>
<div style="float: left; margin-top: 2px;">
    
    <select name="month" style=" display: inline; float: left;">
       <option value="1">January</option>
    <option value="2">February</option>
    <option value="3">March</option>
    <option value="4">April</option>
    <option value="5">May</option>
    <option value="6">June</option>
    <option value="7">July</option>
    <option value="8">August</option>
    <option value="9">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
</select>

<select name="expiryyear" style="margin-right: 150px; float: left; display: inline; margin-left: 2px;">
       <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
</select>
<input type="text" name="cvcode" size="5" maxlength="3" style="float: left;display: inline;">
</div>


 </h1>

<h1 style="margin-top: 20px;"><br>I agree with the term and conditions <input type="checkbox" name="agreement" id="agreement" value="agree"> </h1>

</div>

<h1 style="margin-right: 5px; margin-left: 550px; margin-top: -100px;" >
<input type="submit" value ="Proceed" style="background-color: #40352B"; id="submitenquiries" >
</h1>
</div>


</div>
</form>
<!-- PUT YOUR FOOTER HERE -->
<div class="atthebottom" id="footer">
	<p>©Deakin University, School of Information Technology. This web page has been developed as a student assignment for the unit SIT104: Introduction to Web Development. Therefore it is not part of the University's authorised web site. DO NOT USE THE INFORMATION CONTAINED ON THIS WEB PAGE IN ANY WAY.</p>
</div>
</body>
</html>