<!DOCTYPE html>
<html>
<head>
	<title>Delivery</title>
	<link href="sit104.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width= device-width,initial-scale =1">
	<style>
		#text_boxes{
			float: left;
			margin-top: 5px;
			margin-right: 10px;
			margin-left: 0px;


		}
		#formscroller{
			height: 70%;
			margin-bottom: 50px;
			overflow: scroll;
			overflow-x: hidden;
			

		}
	</style>

	<script>
		function validate(){

			/*Below is initialisation of form elements into variables*/
			var c_firstname = document.forms["firstform"]["clientfirstname"].value;
			var c_lastname = document.forms["firstform"]["clientlastname"].value;
			var phone_1 = document.forms["firstform"]["phonearea"].value;
			var phone_2 = document.forms["firstform"]["phonearea2"].value;
			var mail = document.forms["firstform"]["email"].value;
			var r_fname = document.forms["firstform"]["re_firstname"].value;
			var r_lname =  document.forms["firstform"]["re_lastname"].value;
			var addr_1 = document.forms["firstform"]["addressline1"].value;
			var addr_2 =  document.forms["firstform"]["addressline2"].value;
			var city =  document.forms["firstform"]["city"].value;
			var st =  document.forms["firstform"]["state"].value;
			var p_code =  document.forms["firstform"]["postcode"].value;
			var atpos = mail.indexOf("@");
			var dotpos = mail.lastIndexOf(".");
			 var book= document.forms["firstform"]["book"].value;
			 var book_qty = document.forms["firstform"]["book_qty"].value;

			
			  /* BOOK TITLE VALIDATION CODE */
			 if(book=="0"){
			 	alert("A book must be choosed!");
			 	return false;
			 }
			 else if(book_qty==""||book_qty<=0||isNaN(book_qty)){
			 	alert("A valid amount of book is not stated!");
			 	return false;
			 }
			/*CLIENT NAME VALIDATION CODE*/
			else if (c_firstname ==""
				|| c_lastname == "") {
				alert("client name must be filled");
				return false;
			}

			/*CLIENT PHONE VALIDATION CODE*/
			else if (phone_1==""|| phone_2==""){
					alert("phone numbers must be filled");
					return false;

			
			}else if(isNaN(phone_1)||isNaN(phone_2)){
				alert("phone number have to be numeric!");
				return false;
			}else if(phone_1.length!=2 || phone_2.length<=3){
					alert("phone area code has to be two digits and the number have to be at least 4 digits!");
					return false;
			}


			/*CLIENT MAIL VALIDATION CODE*/

			else if (mail==""){
					alert("email must be filled");
					return false;
			}
			else if (atpos<1 || dotpos<atpos+2 ||dotpos+2>=mail.length){
				alert ("email have to be in example@mail.com format!");
				return false;
			}


			/*RECIPIENT NAME VALIDATION CODE*/
			else if (r_fname=="" || r_lname ==""){
					alert("recipient name must be filled");
					return false;
			}


			/*ADDRESS VALIDATION CODE*/
			else if (addr_1=="" || addr_2 ==""){
					alert("Address must be filled");
					return false;
			}

			/*CITY VALIDATION CODE*/
			else if (city==""){
					alert("City must be filled");
					return false;
			}


			/*STATE NAME VALIDATION CODE*/
			else if (st==""){
					alert("State must be filled");
					return false;
			}


			/*POSTCODE VALIDATION CODE*/
			else if (p_code==""){
					alert("Postcode must be filled");
					return false;
			}else if(isNaN(p_code)){
				alert("Postcode must be numeric");
					return false;
			}else if(p_code.length<=2){
				alert("postcode has to be at least three digits!");
				return false;
			}

			

			/*VALIDATION SUCCESSFUL WITH USER INPUT ALL THE INFO CORRECTLY*/

			else{
				return true;

			 //window.location.assign("orderform2.html"); return false;
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

<form name="firstform" onsubmit="return validate()" method="post" action="orderform2.php">
	<div class="forms" >
	<div id="formtopper" style="text-align: center;"><h1>Delivery Details</h1>

</div>

<div id="formscroller">
	
	<div id="contactforminside" class="orderform_1">

<div style="margin-left: 40px;">
<h1 style="margin-left: -40px;">Order Details<br></h1>
<h1 style="margin-top: 20px;">Book to order<br>
 <select name="book">
 		<option value = 0>-- not selected --</option>
       <option value="1">Clementine Rose and the Birthday Emergency</option>
    <option value="2">Live Well on Less</option>
    <option value="3">Eat Real Food </option>
    <option value="4">My Life 
It's a Long Story</option>
    <option value="5">Sword of Summer </option>
    <option value="6">Middle School : 
Just My Rotten Luck</option>
    <option value="7">Modeling and Simulation for the Sciences</option>
    <option value="8">Fundamentals of Digital Logic with VHDL Design</option>
    <option value="9">Distributed Systems 
Principles and Paradigms</option>
   
</select>
<h1 style="margin-top: 20px;">Quantity<br>
<input type="text" name="book_qty" class="entryfield" size="5 " id="text_boxes" placeholder="0"><br><br>

</h1>

<h1></h1>


</div>
<div style="margin-left: 40px;">

<h1 style="margin-left: -40px;">Customer Details<br></h1>

<h1>Your full name<br> 
<input type="text" name="clientfirstname" class="entryfield" size="20 " id="text_boxes" placeholder="first name">
<input type="text" name="clientlastname" class="entryfield" size="20" placeholder="last name" id="text_boxes">



 <br></h1>

<h1 style="margin-top: 20px;">Your phone number
<br><input type="text" name="phonearea" class="entryfield" size="5" maxlength="2" id="text_boxes" placeholder="area code"> 
<input type="text" name="phonearea2" class="entryfield" size="20" id="text_boxes" maxlength="15" placeholder="has to be more than 3 digits"> <br></h1>
</h1>

<h1 style="margin-top: 20px;">Your email address<br><input type="text" id="text_boxes" name="email" class="entryfield" size="40" placeholder="ex: name@mail.com"> <br></h1>
<h1 style="margin-left: -40px;"><br>Delivery<br></h1>

<h1>Recipient's full name<br>

<input type="text" name="re_firstname" class="entryfield" size="20 " placeholder="first name" id="text_boxes">

<input type="text" name="re_lastname" class="entryfield" size="20" placeholder="last name" id="text_boxes"> <br></h1>

<h1 style="margin-top: 20px;">Address line 1<br><input type="text" name="addressline1" class="entryfield" size="90" id="text_boxes"> <br></h1>

<h1 style="margin-top: 20px;">Address line 2<br>
<input type="text" name="addressline2" class="entryfield" size="90" id="text_boxes"> <br></h1>

<h1>
<div style="display: inline-block; float: left; margin-top: 10px;">City</div> 

<div style="display: inline-block; margin-top: 10px; margin-left: 230px;">State</div>

<div style="display: inline-block; margin-top: 10px; margin-left: 223px;">Postcode</div>

<br><input type="text" style="display: inline; margin-top: 5px; margin-left: 0px;" name="city" class="entryfield" size="20" maxlength="15" id="text_boxes"><h1>

<input type="text" name="state" class="entryfield" maxlength="15" size="20"  style="float: left; margin-top: -8px; margin-left: 80px; display:inline-block;">   

<input type="text" name="postcode" class="entryfield" size="10" maxlength="4"  style="float: left;  margin-top: -23px; display:inline-block; margin-left: 540px;"> <br></h1>



<h1 style="margin-right: 5px; margin-left: 550px;">

<input type="submit" value ="Continue" style="background-color: #40352B"; id="submitenquiries" >
</h1>
<!--href="" -->
</div>
</div>
</div>



</div>
</form>


<!-- PUT YOUR FOOTER HERE -->
<div class="atthebottom" id="footer">
	<p>©Deakin University, School of Information Technology. This web page has been developed as a student assignment for the unit SIT104: Introduction to Web Development. Therefore it is not part of the University's authorised web site. DO NOT USE THE INFORMATION CONTAINED ON THIS WEB PAGE IN ANY WAY.</p>
</div>
</body>
</html>