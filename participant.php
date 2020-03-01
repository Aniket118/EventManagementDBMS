<?php

require('db.php'); 
$stid1 = oci_parse($conn, "SELECT * FROM participant NATURAL JOIN events NATURAL JOIN event_type");
oci_execute($stid1);
$npart= oci_fetch_all($stid1, $part);

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="">
    <!-- Tabs Titles -->
      <H2> Participant Details</H2>

    <table class="table table-hover m-3">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile Number</th>
        <th>College</th>
        <th>Branch</th>
        <th>Event Title</th>
        <th>Event Price</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        for ($i = 0; $i < $npart; $i++) {
      ?>
      <tr>
        <td><?php echo $part['FULLNAME'][$i]; ?></td>
        <td><?php echo $part['EMAIL'][$i]; ?></td>
        <td><?php echo $part['MOBILE'][$i]; ?></td>
        <td><?php echo $part['COLLEGE'][$i]; ?></td>
        <td><?php echo $part['BRANCH'][$i]; ?></td>
        <td><?php echo $part['TYPE_TITLE'][$i]; ?></td>
        <td><?php echo $part['EVENT_PRICE'][$i]; ?></td>
      </tr>

    <?php } ?>
    </tbody>
  </table>

  </div>
</div>