<?php

try{
	ini_set('soap.wsdl_cache_enabled',0);
	ini_set('soap.wsdl_cache_ttl',0);
  $sClient = new SoapClient('http://localhost/dz/4/primjer_1/hello.wsdl',
							array('cache_wsdl'=>WSDL_CACHE_NONE)
							);
  //$sClient = new SoapClient('hello.wsdl');
  
   $params = "Ivan";
  $response = $sClient->doHello($params);
  //print_r($response);
  
  //var_dump($x->__getLastResponseHeaders());
	//var_dump($sClient->__getLastResponse());
$sClient->__getLastResponse();
  
  var_dump($response);
  
  
  
  
} catch(SoapFault $e){
  var_dump($e);
  echo $e;
}
{
    print($sClient->__getLastResponse());
}
?>