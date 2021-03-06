<?php

class webhook extends oxUBase {

  public function render(){
    //get API data

    $body = @file_get_contents('php://input');
    $data = json_decode($body);
    http_response_code(200); // Return 200 OK

    if ($data->type == 'charge.paid'){
      $payment_method = $data->charges->data->object->payment_method->type;
      $amount = $data->data->object->amount / 100;
      $msg = "Hemos recibido tu pago, en breve te enviaremos tu pedido<br>
      ¡Gracias por tu compra en Green Peach Super Foods!<br>
      Tu pedido fue por:  <strong>$" . (float)$amount . " MXN</strong>";
      $subject = $payment_method . "Pago en OXXO comprobado - Green Peach";
      $to = "ventas@greenpeach.mx";
      $nombre = "Daniel";
      $email = "ventas@greenpeach.mx";
      $oEmail = oxNew('oxEmail');
      $oEmail->setBody($msg);
      $oEmail->setSubject($subject);
      $oEmail->setRecipient($to,'Benson');
      $oEmail->setReplyTo($email, $nombre);
      $oEmail->send();
      // $payment_method = $data->charges->data->object->payment_method->type;
      //   $msg = "Tu pago ha sido comprobado.";
      //   mail("ventas@greenpeach.mx","Pago ". $payment_method ." confirmado",$msg);
    }
  }

}
