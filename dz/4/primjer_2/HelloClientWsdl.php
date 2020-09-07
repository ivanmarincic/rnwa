<?php # HelloClientWsdl.php
# Copyright (c) 2005 by Dr. Herong Yang
#
header ("Content-Type: text/plain");
   $client = new SoapClient("http://localhost/dz/4/primjer_2/Hello.wsdl",
      array('soap_version' => SOAP_1_2,'trace' => 1 ));

   echo("\n<pre>Dumping client object functions:\n");
   var_dump($client->__getFunctions());

   $return = $client->__soapCall("hello",array("world"));
   echo("\nReturning value of __soapCall() call: ".$return);

#   $return = $client->hello("world");
#   echo("\nReturning value: ".$return);

   echo("\nDumping request headers:\n"
      .$client->__getLastRequestHeaders());

   echo("\nDumping request:\n".$client->__getLastRequest());

   echo("\nDumping response headers:\n"
      .$client->__getLastResponseHeaders());

   echo("\nDumping response:\n".$client->__getLastResponse())."</pre>";
?>
