<?php

/**
 * Redirect to previous page if http referer is set. Otherwise to server root.
 */
 
if ( ! function_exists('redirect_back'))
{
    function redirect_back()
    {
        if(isset($_SERVER['HTTP_REFERER']))
        {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        else
        {
            header('Location: http://'.$_SERVER['SERVER_NAME']);
        }
        exit;
    }
}


if(!function_exists('debug')) {

    function debug($variable) {
        echo '<pre>';
        print_r($variable);
        var_dump($variable);
        echo '</pre>';
        die;
    }

}

if(!function_exists('formatDateToPHP')) {

    function formatDateToPHP($date) {

        $date = DateTime::createFromFormat("Y-m-d", $date);
        return $date->format("d/m/Y");
        
    }

}

if(!function_exists('formatDateToDB')) {

    function formatDateToDB($date) {

        $date = DateTime::createFromFormat("d/m/Y", $date);
        return $date->format("Y-m-d");
        
    }

}


if(!function_exists('formatDateTimeToPHP')) {

    function formatDateTimeToPHP($date) {

        $date = DateTime::createFromFormat("Y-m-d H:i:s", $date);
        return $date->format("d/m/Y H:i:s");
        
    }

}


if(!function_exists('formatDateTimeToDB')) {

    function formatDateTimeToDB($date) {

        $date = DateTime::createFromFormat("d/m/Y H:i:s", $date);
        return $date->format("Y-m-d H:i:s");
        
    }

}  


if(!function_exists('formatMoneyFCFA')) {

    function formatMoneyFCFA($montant) {

        return number_format($montant, 0, ' ', ' '). " F CFA";
        
    }

} 


if (!function_exists('truncate')) {   
    
    /**
     * Fonction tronquer une chaîne de caractère
     *
     * @param   string $string la chaîne de caractère à formater
     * @param   int $num le nombre de lettres
     * @return  string la chaîne formatée  
     */
    function truncate($string, $int) {

        if(strlen($string) > $int){
            $string = mb_substr($string, 0, $int, 'UTF-8')."..."; 

        } else {
            $user_password = substr($string, 0, $int);  
        }

        utf8_decode($string);
        return $string;
    }

}


if(!function_exists('sendSms')) {

  function sendSms($params, $token, $backup = false ) {

        static $content;

        if($backup == true){
            $url = 'https://api2.smsapi.com/sms.do';
        }else{
            $url = 'https://api.smsapi.com/sms.do';
        }

        $c = curl_init();
        curl_setopt( $c, CURLOPT_URL, $url );
        curl_setopt( $c, CURLOPT_POST, true );
        curl_setopt( $c, CURLOPT_POSTFIELDS, $params );
        curl_setopt( $c, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $c, CURLOPT_HTTPHEADER, array(
           "Authorization: Bearer $token"
        ));

        $content = curl_exec( $c );
        $http_status = curl_getinfo($c, CURLINFO_HTTP_CODE);

        if($http_status != 200 && $backup == false){
            $backup = true;
            sms_send($params, $token, $backup);
        }

        curl_close( $c );
        return $content;
  }

}


if(!function_exists('sendSms2')) {

  function sendSms2($params) {
    $data = array();
    $data["from"] = $params[0];
    $data["to"] = $params[1];
    $data["text"] = $params[2];
    $data = json_encode($data);

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://api.infobip.com/sms/1/text/single",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $data,
      CURLOPT_HTTPHEADER => array(
        "accept: application/json",
        "authorization: Basic Wm9lTWluaXN0cmllczpNNEImQTdDaA==",
        "content-type: application/json"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return array(false, $err);
    } else {
      return array(true, $response);
    }

  }

}


if(!function_exists('sendJSON')) {
/*
   * Retourne un document JSON
   * @param $success l'état de la response
   * @param $data les eventuelles données à renvoyer
   * @pram  $message le message à afficher
   * return void
  */
  function sendJSON($success, $data, $message = '') {
      $infos = array(
          'success' => $success,
          'message' => $message, 
          'data' => $data
      );

      header('Content-Type: application/json');
      echo json_encode($infos); 
      exit();
  }

}


