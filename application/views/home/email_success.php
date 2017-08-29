<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>Thanks for booking event (<?php echo  str_replace("'",' ',$events->ev_title);?>). </p>
<h2>Your Ticket  No is :<?php  echo $events->ticket_no;  ?></h2>
<br>
 <h3>Booking Information</h3>
<table class="table table-hover">
  <tr><td>First Name:</td><td><?php echo $events->first_name;  ?></td></tr>
  <tr><td>Last Name:</td><td><?php echo $events->last_name;  ?></td></tr>
  <tr><td>Email:</td><td><?php echo $events->email;  ?></td></tr>
   <tr><td>Gender:</td><td><?php echo $events->gender;  ?></td></tr>
  <tr><td>Address:</td><td><?php echo $events->address;  ?></td></tr>
  <tr><td>State:</td><td><?php echo $events->state;  ?></td></tr>
  <tr><td>Country:</td><td><?php echo $events->country;  ?></td></tr>
  <tr><td>Phone No:</td><td><?php echo $events->phone;  ?></td></tr>
  <tr><td>Amount:</td><td>&#8358;<?php echo $events->ev_amount;  ?></td></tr>
  <tr><td>Payment Status:</td><td><?php echo $events->payment_status;  ?></td></tr>
  </table>
</body>
</html>