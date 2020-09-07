<?php # HelloClient12.php
# Copyright (c) 2005 by Dr. Herong Yang
#
   $client = new SoapClient(null, array(
      'location' => "http://localhost/dz/4/primjer_2/HelloServer12.php",
      'uri'      => "urn://neretva.fsr.ba/hello",
      'soap_version' => SOAP_1_2,
      'trace'    => 1 ));

   $return = $client->__soapCall("hello",array("world"));
   echo "<pre>";
   echo("\nReturning value of __soapCall() call: ".$return);

   echo("\nDumping request headers:\n" 
      .$client->__getLastRequestHeaders());

   echo("\nDumping request:\n".$client->__getLastRequest());

   echo("\nDumping response headers:\n"
      .$client->__getLastResponseHeaders());

   echo("\nDumping response:\n".$client->__getLastResponse());
   
   echo "</pre>";
?>