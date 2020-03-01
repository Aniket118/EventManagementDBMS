<?php 

if(isset($_POST['login'])) {
    $user = $_POST['email'];
    $pass = $_POST['pass'];

    require('db.php'); 
    $stid = oci_parse($conn, sprintf("SELECT * FROM users WHERE email='%s' AND pass='%s'", $user, $pass));
    oci_execute($stid);
    oci_fetch_all($stid, $row);

    if (oci_num_rows($stid) == 1) {
      
      header("Location: register.php");
      exit();
    }
    
    oci_free_statement($stid);
    oci_close($conn);

}
?>
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
      <H2> Event Management System</H2>

    <!-- Login Form -->
    <form method="post">
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="login">
      <input type="password" id="password" class="fadeIn third" name="pass" placeholder="password">
      <input type="submit" class="fadeIn fourth" name="login" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>