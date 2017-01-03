<?php 
class CustomSoap extends SoapClient {
  protected function callCurl($url, $data) {
     $handle = curl_init();
     curl_setopt($handle, CURLOPT_URL, $url);
     curl_setopt($handle, CURLOPT_HTTPHEADER, Array('Content-Type: text/xml'));
     curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
     curl_setopt($handle, CURLOPT_SSLVERSION, 3);
     $response = curl_exec($handle);
     if (empty($response)) {
       throw new SoapFault('CURL error: '.curl_error($handle), curl_errno($handle));
     }
     curl_close($handle);
     return $response;
   }
   public function __doRequest($request, $location, $action, $version, $one_way = 0) {
       return $this->callCurl($location, $request);
   }
 }