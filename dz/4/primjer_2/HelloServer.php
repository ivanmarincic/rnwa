<?php # HelloServer.php
# Copyright (c) 2005 by Dr. Herong Yang, http://www.herongyang.com/
#
function hello($someone) {
   //return "Hello " . $someone . "!";

   return  $someone*$someone;
}

function provjera($provjera) {
//$rez='';
   //return "Hello " . $someone . "!";
   if ($provjera %2 == 0){
     $rez="parnibroj";
   }
     else {
       $rez="neparnibroj";
     }

   return  $rez;
}
   $server = new SoapServer(null,
      array('uri' => "urn://www.herong.home/req"));
   //$server->addFunction("hello");
   $server->addFunction(array("hello", "provjera"));
   $server->addFunction(SOAP_FUNCTIONS_ALL);
   $server->handle();
?>
