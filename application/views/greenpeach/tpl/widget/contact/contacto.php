<?php

if(isset($_POST['submit'])){
  $to = "ventas@greenpeach.mx"; // this is your Email address
  $from = $_POST['email']; // this is the sender's Email address
  $nombre = $_POST['nombre'];
  $tel = $_POST['tel'];
  $com = $_POST['comentario'];
  $message = $nombre . " " . " escribio lo siguiente:" . "\n\n" . $_POST['com'];

  $headers = "From:" . $from;
  $headers2 = "From:" . $to;
  mail($to,$subject,$message,$headers);
  //mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
  echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
  // You can also use header('Location: thank_you.php'); to redirect to another page.
  }

  ?>
