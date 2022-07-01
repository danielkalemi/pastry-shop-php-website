<?php
//purchase.php
//initiating variables for the errors and the field of the form
$error = '';
$message = '';

//function to clean the field in the form
function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}
//VALIDATION PROCESS USING ERROR MESSAGES DISPLAYED INSIDE OF THE FORM INSTEAD OF DIE METHOD
if(isset($_POST["submit"]))
{
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Fill in special request!</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }
//IF THE ERROR VARIABLE IS EMPTY AFTER ALL THE TESTS FOR ERRORS THEN WE ARE FREE TO PROCEED
 if($error == '')
 {
  $file_open = fopen("purchase_data.txt", "a"); //OPEN A FILE IN APPEND MODE AS WE WILL NEED IT LATER ON
  $no_rows = count(file("purchase_data.txt"));
  
  if($no_rows > 1)  //KEEPING TRACK OF USED LINES ON THE .TXT FILE
  {
   $no_rows = ($no_rows-1)+1;
  }
  $c = array ( "small" => 10, "medium" => 15, "big" => 20);  
  $size = $_POST['size'];
  $total = 0;
  foreach ($size as $s) {
    $total = $total + $c[$s];  //PASSING THE VALUES OF THE OPTION FIELD, TO AN ARRAY AND THEN TO A VARIABLE FOR CALCULATIONS
  }
  $c1 = array ( "1" => 1, "2" => 2, "3" => 3, "4" => 4, "5" => 5);
  $amount = $_POST['amount'];
  foreach ($amount as $a) {  //DOING THE SAME WITH THE OTHER OPTION FIELD
    $total = $total * $c1[$a]; //COMBINIG THEM TOGETHER
  }

  if ($_POST['deliver'] == 'fast')
  {
    $total = $total+2;  //CHEKING WETHER THE CUSTOMER WANTS FAST DELIVERY OR NOT
  }
  else
  {
    $total = $total+0;
  }
  $count=($no_rows/6)+1;
  //PASSING THE VALUES TO THE .txt file
  $form_data= "Purchase ".(int)$count."\r\n Request: ".$message."\r\n Total: ".$total." Dollars \r\n\r\n\r\n ______________________ \r\n";
  fwrite($file_open,$form_data);
  fclose($file_open); //closing the file after we finish
  //  To redirect form on a particular page
     header("Location:customer.php");
 }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apallou Form</title>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" />
  <link rel="stylesheet" href="css/style.css">

</head>

<body>  
   <div class="pimg5"> 
        <div class="containerRec">

            <nav class="sticky">

                <!--The logo serves as a back button to the main page "index.html"-->
                <a href="index.html"><img src="images/logo1.png" alt="image" class="logo"></a>
                <!--I include on the class the "animated slideInDown" to animate the menu when we open first it (imported API)-->
                <ul class="main-nav animated slideInDown ,border" id="check-class">
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="recipes.html">BUY</a></li>
                    <li><a href="contact.html">CUSTOMER</a></li>
                    <li><a href="direction.html">Directions</a></li>
                    <li><a href="login.html">PAY</a></li>
                </ul>
                <a href="#" class="mobile-icon"  onclick="slideshow()"> <i class="fa fa-bars"></i> </a>
              
            </nav>
            
            
              </div>
              <div class="typewriter">
                  <h1>Please fill in delivery info</h1>
              </div>
            </div>				
    <div class="wrapper animated bounceInLeft">
      <div class="company-info">
        <h3>Purchase Form</h3>
        <ul>
          <li><i class="fa fa-road"></i> Thessaloniki, Greece</li>
          <li><i class="fa fa-phone"></i> (+30) 6953461835</li>
          <li><i class="fa fa-envelope"></i> cafe@apallou.com</li>
        </ul>
      </div>
      <div class="contact"> 
      
        
  
<form name="ContactForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
     <?php echo $error; ?>
    <p><br>
     <p><label>Special Offer</label>
      <select type="text" value="" id="help" name="size[]">
          <option value="small">Small $10</option>
          <option value="medium">Medium $15</option>
          <option value="big">Big $20</option>
          
      </select></p>
    <p> 
    <label>How many would you like to order?</label>
      <select type="text" value="" id="help" name="amount[]">
      <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          
      </select>
    </p>
    <p class="full">
      <label>Any special requests?</label>
      <textarea name="message" rows="5" id="comment" placeholder="Enter Message" value="<?php echo $message; ?>"></textarea>
    </p>
    <input type="radio" name="deliver" value="fast"> Fast Delivery (+ $2) <br>
		<input type="radio" name="deliver" value="standard"> Standard Shipping (Free) <p>
    <p class="full">
    <button type="submit" name="submit" value="Submit">Continue</button><p>
	
</form>  
      </div>
      
    </div>
    <footer class="free">
        <h2>Get In Touch</h2>
        <p>Email Come by or Order Online</p>
        <p>Email:
          <strong>contact@appalou.com</strong>
        </p>
        <p>Phone:
          <strong>(+30) 555-5555</strong>
        </p>
        <br>
        <div class="footer-icons">
    
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
    
          </div>
      </footer>
  
</body>
</html>