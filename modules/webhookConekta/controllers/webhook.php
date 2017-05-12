<?php

class webhook extends oxUBase {

  public function render(){
    //get API data

    $body = @file_get_contents('php://input');
    $data = json_decode($body);
    http_response_code(200); // Return 200 OK

    if ($data->type == 'charge.paid'){
      $payment_method = $data->charges->data->object->payment_method->type;

      $msg = "Tu pago ha sido comprobado.";
      $subject = $data->charges->data->object->payment_method->type;
      $to = "bensondaniel664@gmail.com";
      $nombre = "Daniel";
      $email = "bensondaniel664@gmail.com";
      $oEmail = oxNew('oxEmail');
      $oEmail->setBody($msg);
      $oEmail->setSubject($subject);
      $oEmail->setRecipient($to,'Benson');
      $oEmail->setReplyTo($email, $nombre);
      $oEmail->send();

    }
  }

}
