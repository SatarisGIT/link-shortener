<?php

$scriptLocation = str_replace("index.php", "", $_SERVER["PHP_SELF"]);
$request = str_replace($scriptLocation, "",  $_SERVER["REQUEST_URI"]);
$file = 'links.json';

function linkNotFound() {
     echo "Link not found.";

     exit;
}


if (file_exists($file)) {

     $jsonFile = file_get_contents($file);
     $jsonData = json_decode($jsonFile);

     if(isset($jsonData->$request)) {

          $linkToRedirect = $jsonData->$request;

          if(is_string($linkToRedirect)) {
      
               header('Location: '.$linkToRedirect);

          } else {
               linkNotFound();
          }

     } else {
          linkNotFound();
     }

     exit;
}

?>