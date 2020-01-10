<?php
	session_start();
  require'db.php';
  require"cwcconf.php";
  require "vendor/autoload.php";
  require "vendor/phpmailer/phpmailer/src/PHPMailer.php";

  // use ElasticEmailClient\ElasticClient as Client;
  // use ElasticEmailClient\ApiConfiguration as Configuration; 
  
  $mail = new PHPMailer\PHPMailer\PHPMailer();

  
  $file = fopen("log.txt", "w"); //url fopen should be allowed for this to occur
  $txt .= file_get_contents('php://input')  . '\r\n';
  $txt .= json_encode($_GET)  . '\r\n';
  file_put_contents($file,$txt);
  fclose($file);

  $val           = $vid;
  $val1          = $_GET['id'];
  $val2          = $_GET['ivm'];
  $val3          = $_GET['qwh'];
  $val4          = $_GET['afd'];
  $val5          = $_GET['poi'];
  $val6          = $_GET['uyt'];
  $val7          = $_GET['ifd'];
 	

	$ipnUrl = "https://www.ipayafrica.com/ipn?vendor=".$val."&id=".$val1."&ivm=".$val2."&qwh=".$val3."&afd=".$val4."&poi=".$val5."&uyt=".$val6."&ifd=".$val7;
		
  switch ($status) {
    case 'aei7p7yrx4ae34':
      $state = "successful";
      $data = file_get_contents('php://input');
      break;	

    case 'fe2707etr5s4wq':
      $state = "Transaction failed";
      break;

    case 'bdi6p2yy76etrs':
      $state = "Transaction pending";
      break;

    case 'dtfi4p7yty45wq':
      $state = "The amount you paid is insufficient";
      break;

    case 'eq3i7p5yt7645e':
      $state = "You have paid more.";
      break;

    case 'cr5i3pgy9867e1':
      $state = " Transaction already completed.";
      break;
    
    default:
      $state = "Unxpected result";
      break;
  }

  if ($_SESSION['updatedOrders'] && $_SESSION['userPresent']) {
    // $configuration = new Configuration([
    //   'apiUrl' => 'https://api.elasticemail.com',
    //   'apiKey' => '7a728955-324f-4a14-bff3-44399debd516'
    //   ]);
    
    
    //   $client = new Client($configuration);
    //   try {
    //     $resp = $client->EEemail->Send(
    //     “Subject”,
    //     “info@slashdotlabs.com”,
    //     “Plain text email content”,
    //     “HTML email content”,

    //     );
    //   } catch (Exception $e) {
    //     throw new \Exception(e);
    //   };
    
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.elasticemail.com/v2/email/send");
    curl_setopt($ch, CURLOPT_POST, 1);
    
    $post_data['from'] = "support@ipayafrica.com";
    $post_data['fromName'] = "Slash Dot Labs Limited ";
    $post_data['apikey'] = '7a728955-324f-4a14-bff3-44399debd516';
    $post_data['subject'] = "Payment Complete - Slash Dot Labs Ltd.";
    $post_data['to'] = $tokenemail;
    $post_data['bodyHtml'] = "Dear customer, your order was successfully completed";

    curl_setopt($CH, CURLOPT_POSTFIELDS, $post_data);

    $mail->SetFrom("info@slashdotlabs.com","Slash Dot Labs Ltd.", 0);

    $mail->addAddress($tokenemail, "$fname $lname");

    $mail->addReplyTo("info@slashdotlabs.com", "Reply");

    $mail->addCC("accounts@ipayafrica.com");

    $mail->Subject = "CPanel Credentials";

    $mail->isHTML(true);
    $mail->Body = "
      <p>Thank you for choosing Slash Dot Labs. The credentials to your hosting panel are provided below.</p>
      <hr/>
      <p>Username: </p>
      <p>Password: </p>
      <br/>
      <p>Should you have any questions, do not hesitate to contact us at info@slashdotlabs.com</p>

    ";

    if(!$mail->send()) {
      echo "Mailer Error: ".$mail->ErrorInfo;
    } else {
      echo "Message successfully sent";
    }

	  $_SESSION['loggedIn'] = TRUE;
    unset($_SESSION['numberofitems']);
    header("Refresh: 3; url=https://beta.slashdotlabsprojects.com/cwhoiscart/dashboard.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<div class="container">
<?php
	//var_dump($_GET);
	// var_dump($_SESSION);
?>
<div class="row">
<?php
// PASS USER DETAILS TO TABLE IF USER DOESN'T ALREADY EXIST
// RETRIEVE USER DETAILS i.e. USER ID
// PASS ORDER DETAILS TO DB, txncode FROM IPAY PARAMS AS OrderId

if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $fname = $_SESSION['fname'];
  $lname = $_SESSION['lname'];
  $password = $_SESSION['password'];
  $pass_hash = md5($password);
  $phone = $_SESSION['tel'];
  $address = $_SESSION['str1'];
  $city = $_SESSION['city'];
  $country = $_SESSION['country'];
  $organisation = $_SESSION['org'];

  $email= mysqli_real_escape_string($db, $email);
  $fname= mysqli_real_escape_string($db, $fname);
  $lname= mysqli_real_escape_string($db, $lname);
  $pass_hash= mysqli_real_escape_string($db, $pass_hash);
  $phone = mysqli_real_escape_string($db, $phone);
  $address= mysqli_real_escape_string($db, $address);
  $city= mysqli_real_escape_string($db, $city);
  $country= mysqli_real_escape_string($db, $country);
  $organisation= mysqli_real_escape_string($db, $organisation);

    //Check if the user already exist
  $sql = "SELECT * FROM domaincart_user WHERE email='$email'";;
  $result  =  $db->query($sql);

  if (mysqli_num_rows($result) > 0) {
      // If user already exists
    print "<h3>Welcome back ".$fname." ".$lname."</h3>";
    $row = $result->fetch_assoc();
    $_SESSION['email'] = $row["email"];
    $_SESSION['userid'] = $row["UserID"];
    $_SESSION['fname'] = $row["fname"];
    $_SESSION['lname'] = $row["lname"];
    $_SESSION['dregistered'] = $row["dregistered"];
    $_SESSION['address'] = $row["address"];
    $_SESSION['city'] = $row["city"];
    $_SESSION['country'] = $row["country"];
    $_SESSION['phone'] = $row["phone"];
    $_SESSION['org'] = $row["organisation"];
    $_SESSION['userPresent'] = TRUE;
  } else {
      // Add user to users table
    $query = $organisation == "" ?
      "INSERT INTO `domaincart_user` (UserID, dregistered, fname, lname, email, password, phone, address, city, country) VALUES (NULL, CURRENT_TIMESTAMP, '$fname', '$lname', '$email', '$pass_hash', '$phone', '$address', '$city', '$country')" :
      "INSERT INTO `domaincart_user` VALUES (NULL, CURRENT_TIMESTAMP, '$fname', '$lname', '$email', '$pass_hash', '$phone', '$address', '$city', '$country', '$organisation')";

    $results = mysqli_query($db, $query);

    if ($results) {
      print "<h5>Sign Up Complete. Confirm your registration via the email address you signed up with.</h5>";
      $_SESSION['newuser'] = TRUE;
      if ($_SESSION['newuser']) $_SESSION['userPresent'] = TRUE;
    } else {
      print "Could not complete your registration at this time.";
    }
    $_SESSION['userAdded'] = TRUE;
  }
}

  $hostingdesc = $_SESSION['carthosting'];
  $hostingarr = explode("(",$hostingdesc);
  $hostingplan = trim($hostingarr[0], " ");

  $nameservers = $_SESSION['cartdomain'];
  $currency = $_SESSION['curr'];

  $orderdate=date("Y-m-d h:i:s");
  $expirydate = date("Y-m-d h:i:s", strtotime('+1 years'));

  

  print "<h3>Status: $state</h3>";
  $getId = "SELECT UserID from `domaincart_user` WHERE email = '$email'";
  $result_id = mysqli_query($db, $getId);
  if ($result_id->num_rows > 0) {
    $row = $result_id->fetch_assoc();
    $userid = $row["UserID"];
    $_SESSION['userid'] = $userid;
    if ($userid) $_SESSION['userPresent'] = TRUE;
    // GET PLAN INFO
    $planinfo = "SELECT productid FROM `domaincart_hosting` WHERE products = '$hostingplan'";
    // var_dump($planinfo);
    $result_plan = mysqli_query($db, $planinfo);
    // var_dump($result_plan);
    if ($result_plan->num_rows > 0) {
      $res_row = $result_plan->fetch_assoc();
      $productid = $res_row["productid"];
    }
    $order_query = "INSERT INTO `domaincart_orders` VALUES ('$txncd', '$userid', '$productid', '$nameservers', $mc, '$currency', '$orderdate', '$expirydate')";
    // var_dump($order_query);
    $order_results =  mysqli_query($db, $order_query);
    if ($order_results === TRUE) {
      print"Orders updated";
      $_SESSION['updatedOrders'] = TRUE;
    };
  }


?>
<div class="col">
  <h5>Transaction Details</h5>
  <table>
    <tr>
      <td>Vendor Name</td>
      <td>Slash Dot Labs Ltd.</td>
    </tr>
    <tr>
      <td>Transaction N<sup>o</sup></td>
      <td><?php echo $txncd;?></td>
    </tr>
    <tr>
      <td>Client</td>
      <td><?php echo  $msisdn_id;?></td>
    </tr>
    <tr>
      <td>Contacts</td>
      <td><?php echo $msisdn_idnum ;?></td>
      <td><?php echo $tokenemail?></td>
    </tr>
    <tr>
      <td>Paid Via</td>
      <td><?php echo $channel;?></td>
    </tr>
    <tr>
      <td>Card Details</td>
      <td><?php echo  $cardmask;?></td>
    </tr>
  </table>

</div>
</div>
<div class="row">
	<div class="col-sm-12">
      <p>Registration completed. If you are not redirected in a few seconds, referesh the page.
      </p>
  </div>
</div>
</div>
</body>
</html>
