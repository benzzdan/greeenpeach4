<?php

class webhook extends oxUBase {

  public function render(){
    //get API data

    $body = @file_get_contents('php://input');
    $data = json_decode($body);
    http_response_code(200); // Return 200 OK

    if ($data->type == 'charge.paid'){
      // $msg = "Tu pago ha sido comprobado.";
      // mail("bensondaniel664@gmail.com","Pago confirmado",$msg);
      http_response_code(777);
    }
  }

}
