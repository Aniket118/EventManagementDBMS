<?php
// Connection to Oracle Database

$conn = oci_connect("system", "123", 'XE');
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}

?>