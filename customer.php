<?php
//customer.php

$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))  //method for validating email field
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["subject"]))
 {
  $error .= '<p><label class="text-danger">Subject is required</label></p>';
 }
 else
 {
  $subject = clean_text($_POST["subject"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }

 if($error == '')
 {
  $file_open = fopen("contact_data.txt", "a");
  $no_rows = count(file("contact_data.txt"));
  
  if($no_rows > 1)
  {
   $no_rows = ($no_rows-1)+1;
  }
  $count=($no_rows/6)+1;
  $form_data= "Customer ".(int)$count."\r\n  Name: ".$name."\r\n Email: ".$email."\r\n City: ".$subject."\r\n Address: ".$message."\r\n ______________________ \r\n";
  fwrite($file_open,$form_data);
  fclose($file_open);
  


//WE COULD ALSO USE A CSV FILE TO PUT CONTENTS OF THE FIELD ALTERNATIVELY
 /* $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'subject' => $subject,
   'message' => $message
  );
  fputcsv($file_open, $form_data);*/

  //  To redirect form on a particular page
     header("Location:pay.php");
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Purchase details</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                  <h1>Please fill in your details</h1>
              </div>
            </div>				
    
      
            <div class="wrapper animated bounceInLeft">
      <div class="company-info">
        <h3>Customer Form</h3>
        <ul>
          <li><i class="fa fa-road"></i> Thessaloniki, Greece</li>
          <li><i class="fa fa-phone"></i> (+30) 6953461835</li>
          <li><i class="fa fa-envelope"></i> cafe@apallou.com</li>
        </ul>
      </div>
      <div class="contact"> 
      
  
   
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
     <h3>Contact Form</h3>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
     </div>
     <div class="form-group">
      <label>City</label>
      <input type="text" name="subject" class="form-control" placeholder="Enter City" value="<?php echo $subject; ?>" />
     </div>
     <div class="form-group">
      <label>Address</label>
      <textarea name="message" rows="2" class="form-control" placeholder="Enter Address"><?php echo $message; ?></textarea>
     </div>
     <div class="form-group">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
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
