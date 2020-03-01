<?php 

require('db.php'); 
$stid1 = oci_parse($conn, "SELECT * FROM events");
oci_execute($stid1);
$nevents= oci_fetch_all($stid1, $events);

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sub = $_POST['sub'];
    $phno = $_POST['phno'];
    $college = $_POST['college'];
    $branch = $_POST['branch'];
    $event = $_POST['event'];

    require('db.php'); 
    $stid = oci_parse($conn, sprintf("INSERT INTO PARTICIPANT VALUES ('%s', '%s', %s, '%s', '%s', %s)", $name, $email, $phno, $college, $branch, $event));
    oci_execute($stid);
    oci_fetch_all($stid, $row);

    if (oci_num_rows($stid) == 1) {
      
      header("Location: participant.php");
      exit();
    }
    
    oci_free_statement($stid);
    oci_close($conn);

}
?>
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
      <H2> Register </H2>

    <!-- Login Form -->
    <form  class="form" method="post">
              <div class="form-group">
                <input type="text" name="name" class="form-control field-border" placeholder="Full Name" required>
              </div>
              <div class="form-group">
                <input type="text" name="email" class="form-control field-border" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                <input type="text" name="sub" class="form-control field-border" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <input type="text" name="phno" class="form-control field-border" placeholder="Phone Number" required>
              </div>
              <div class="form-group">
                <input type="text" name="college" class="form-control field-border" placeholder="College" required>
              </div>
              
              
                    <div class="form-control" style="margin-bottom:10px;">
                          <select class="" name="branch" id="inlineFormCustomSelect" required>
                          <option selected>Choose Branch...</option>
                          <option value="CS">Computer Science</option>
                          <option value="IT">Information Technology</option>
                          <option value="ECE">Electronics and Communication</option>
                        </select>
                    </div>
                  
                    <div class="form-control mt-3">
                          <select class="" name="event" id="inlineFormCustomSelect" required>
                          <option selected>Choose Event...</option>
                          <?php 
                          for ($i = 0; $i < $nevents; $i++) {
                          ?>
                          <option value="<?php echo $events['EVENT_ID'][$i]; ?>"><?php echo $events['EVENT_TITLE'][$i] ?></option>
                          <?php } ?>
                        </select>
                    
                    </div>
            
              <div class="form-group">
                <input value="Register" name="submit" type="submit" name="signup_button" class="btn btn-primary py-3 px-5 " required>
              </div>
            </form>

  </div>
</div>