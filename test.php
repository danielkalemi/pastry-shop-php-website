<?php
// read file into string
$str = file('contact_data.txt') or die('ERROR: Cannot find file');

$str1 = file('purchase_data.txt') or die('ERROR: Cannot find file');

$str2 = file('pay_data.txt') or die('ERROR: Cannot find file');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		div.a {
  display: inline-block; /* the default for span */
  width: 30%;
  height: auto;
  padding: 30px;
  margin:15px;
  background-color: white;
  box-shadow: 0 10px 15px 0 #000;
}
	</style>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	
	<!--the "contain" class is used for the background color change with keyframes-->
  <div class="contain">
     <header class="indexHeader">
		 
				<!--The logo serves as a back button to the main page "index.html"-->
				
					<!--I include on the class the "animated slideInDown" to animate 
					the menu when we open it first (imported API). Additionally, the id is utilized by a javascript function-->
					<nav class="sticky">

							<!--The logo serves as a back button to the main page "index.html"-->
							<a href="index.html"><img src="images/logo1.png" alt="image" class="logo"></a>
							<!--I include on the class the "animated slideInDown" to animate the menu when we open first it (imported API)-->
							<ul class="main-nav animated slideInDown ,border" id="check-class">
									<li><a href="index.html">HOME</a></li>
                                    <li><a href="recipes.html">BUY</a></li>
                                    <li><a href="contact.php">CUSTOMER</a></li>
                                    <li><a href="dex.php">Directions</a></li>
							</ul>
							<a href="#" class="mobile-icon"  onclick="slideshow()"> <i class="fa fa-bars"></i> </a>
						
					</nav>
		          <div class="main-content-header">
			         <h1> Below there is a summary of the </h1>
				     <h1><span class="colorchange">"FILE CONTENTS"</span>.</h1>
					 <h1> Each customer will appear </h1>
					 <h1>chronologically </h1>
			         <br>
			  <a href="recipes.html" class="btn btn-full"> click to order more</a>
		         </div>
	 </header>
   
        <div class="a">
		<h2><b><u>Customer Info</u></b></h2>
		<p></p>
		<?php foreach ($str as $line) {
	    echo $line."<br>";
        }?>
       </div>
	   <div class="a">
	   <h2><b><u>Purchase Info</u></b></h2>
        <p></p>
		<?php foreach ($str1 as $line1) {
	    echo $line1."<br>";
        }?>
	   </div>
	   <div class="a">
	   <h2><b><u>Payment Info</u></b></h2>
		<p></p>
		<?php foreach ($str2 as $line2) {
	    echo $line2."<br>";
        }?>
       </div>
   </div>
   

		
	

</body>
</html>





