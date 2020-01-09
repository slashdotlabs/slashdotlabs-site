<?php 
	session_start();
	 include"cwcconf.php"; 
	require"login.php";
?>
<html>
<head>
   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="cwhoisstyles.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>cWhois Domain Cart</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body bgcolor="#FFFFFF">


 <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="col-md-2">
  <!-- Brand -->
    <a class="navbar-brand" href="#">
      <img src="logo_black-and-white-transparent-bg.png" style="width:120px;" title="Slash Dot Labs" alt="Slash Dot Labs">
    </a>
  </div>
  <div class="col-md-4">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://beta.slashdotlabsprojects.com/about/">ABOUT</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://beta.slashdotlabsprojects.com/services/">SERVICES</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://beta.slashdotlabsprojects.com/cwhoiscart/index.php">HOSTING</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://beta.slashdotlabsprojects.com/contact-2/">CONTACTS</a>
    </li>

  </ul>
  </div>
  <div class="col-md-6">
    <ul class="navbar-nav mr-auto">
              <li><?php
                if (isset($_SESSION['loggedIn'])) print "<a href='dashboard.php'><p class='text-center'>".$_SESSION['fname']."  ".$_SESSION['lname']."</p></a>";
              ?></li>
              <li>
                <?php
                  if (isset($_SESSION['loggedIn'])) print "<button><a href='logout.php'>Logout</a></button>";
                ?>
              </li>
        </ul>
          <?php
            if (!isset($_SESSION['loggedIn'])) {
            echo "  <form class='form-inline my-2 my-lg-0' method='post'>
                <div class='input-group'>
                  <input type='email' name='useremail' placeholder='Email' id='useremail' required class='form-control email-sign'/>
                </div>
                <div class='input-group'>
                  <input type='password' name='userpassword' placeholder='Password' id='userpassword' required class='form-control mr-sm-2 pass-domain'/>
                </div>
                <input id='login_btn' type='submit' value='Login' name='login' class='btn btn-outline-success my-2 my-sm-0' style='padding:8px;' />
              </form>";
              if (isset($_SESSION['wrongemail'])) echo '<br/><p>Incorrect Email<p>';
              if (isset($_SESSION['wrongpwd'])) echo '<br/><p>Incorrect Password<p>';
            }
          ?>
  </div>
</nav>

  <div class="container">
   <div class="row">
      <div class="col-md-12">

      </div>
      <div class="col-md-12">
         <?php include"cwhoiscart.php"; ?>
      </div>
    </div>
  </div>

<div class="footer top-footer">
  <div class="container">
   <div class="row">
    <br><br>
     <p class="social_media">
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-skype"></a>
        
     </p>
   </div>
 </div>
</div>
<div class="footer copyrights">
  <div class="container">
   <div class="row">
     <p>Slash Dot Labs Ltd &copy; <?php echo date("Y"); ?> All Rights Reserved</p>
   </div>
 </div>
</div>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>