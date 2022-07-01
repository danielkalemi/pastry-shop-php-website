<?php

//pay.php

$error = '';
$card = '';
$cvv='';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["card"]) || empty($_POST["cvv"]))
 {
  $error .= '<p><label class="text-danger">Fill in info!</label></p>';
 }
 else
 {
  $card = clean_text($_POST["card"]);
  $cvv = clean_text($_POST["cvv"]);
  if(!is_numeric($card) || !is_numeric($cvv))
  {
   $error .= '<p><label class="text-danger">Only numbers allowed</label></p>';
  }
 }

 if($error == '')
 {
  $file_open = fopen("pay_data.txt", "a");
  $no_rows = count(file("pay_data.txt"));
  
  if($no_rows > 1)
  {
   $no_rows = ($no_rows-1)+1;
  }
  $c = array ( "01" => 1, "02" => 2, "03" => 3,"04" => 4, "05" => 5, "06" => 6,"07" => 7, "08" => 8, "09" => 9,"10" => 10, "11" => 11, "12" => 12);
  $month = $_POST['month'];
  foreach ($month as $m) {
    $month1 = $month1 + $c[$m];
  }
 
  $c1 = array ( "2020" => 2020, "2021" => 2021, "2022" => 2022, "2023" => 2023, "2024" => 2024, "2025" => 2025);
  $year = $_POST['year'];
  foreach ($year as $y) {
    $year1 = $year1 + $c1[$y];
  }
  $count=($no_rows/6)+1;
  $form_data= "Payment ".(int)$count."\r\n Card Nr: ".$card."\r\n Exp. Card Date: ".$month1."/ ".$year1."\r\n CVV Nr: ".$cvv."\r\n\r\n ____________________ \r\n";
  fwrite($file_open,$form_data);
  fclose($file_open);
  //  To redirect form on a particular page
     header("Location:test.php");
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Those are APIs from Google and Cloudflare for fonts and animations imported for the CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Payment</title>
    
</head>
<body>
  
    
        <div id="wrapper">
            
                <div id="left">
                  
                  <div id="signin">
                      
                     <a href="index.html"><img src="images/logo1.png" alt="image" class="logo"></a>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
                    <?php echo $error; ?>
                      <div>
                        <p><br>
                        <label>CREDIT OR DEBIT CARD NUMBER</label>
                        <input type="text" name="card" class="text-input" id="email" value="<?php echo $card; ?>"> </p>
                      </div>
                      <div>
                        <label>EXP MONTH</label>
                          <select name="month[]">
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                            </select>
                          
                            <label>YEAR</label>
                            <select name="year[]">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                              </select><p>
                      </div>
                      <div>
                        <p>
                        <label>CVV</label>
                        <input type="password" name="cvv" class="text-input" id="pass" value="<?php echo $cvv; ?>"> </p>
                      </div>
                      <button type="submit" name="submit" class="primary-btn">PAY</button>
                    </form>
                    
                    <div class="or">
                      <hr class="bar">
                      <span>OR</span>
                      <hr class="bar">
                    </div>
                    <label>Changed your mind?</label>
                    <a href="recipes.html" class="secondary-btn">START ALL OVER</a>
                  </div>
                  <footer id="main-footer">
                    <p>Copyright &copy; 2019, Apallou All Rights Reserved</p>
                    <div>
                      <a href="#">terms of use</a> | <a href="#">Privacy Policy</a>
                    </div>
                  </footer>
                </div>
                
                <div id="right">
                  <div id="showcase">
                      
                    <div class="showcase-content">
                      <h1 class="showcase-text">
                        Join the community of <span class="colorchange">SWEETS!</span>
                      </h1>
                      <a href="https://www.facebook.com" class="secondary-btn">FACEBOOK PAGE</a>
                    </div>
                  </div>
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