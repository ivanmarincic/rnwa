<?php # HelloClient.php
# Copyright (c) 2005 by Dr. Herong Yang

header('Content-Type:text/plain');

#
   $client = new SoapClient(null, array(
      'location' => "http://localhost/dz/4/primjer_2/HelloServer.php",
      'uri'      => "urn://www.herong.home/re",
      'trace'    => 1 ));

   //$return = $client->__soapCall("hello",array('parameters' => '3'));
    $return = $client->__soapCall("provjera",array('parameters' => 4));
  /*
  */
  //echo("\n<pre>Returning value of __soapCall() call: ".$return)."</pre>";

   //echo("\n<pre>Dumping request headers:\n"   .$client->__getLastRequestHeaders())."</pre>";

   echo("\nDumping request:\n".$client->__getLastRequest())."\n - - - -  - - -  - - -";

   //echo("\n<pre>Dumping response headers:\n"  .$client->__getLastResponseHeaders())."</pre>";
/*
*/
   echo("\nDumping response:\n".$client->__getLastResponse())."  \n- - - - - - - -  - -";
?>
