<?php
try {
  $mongo = new Mongo(); // default host:port
  $db = $mongo->example;
  $collection = $db->test;

  $document = array('x' => 1);
  $collection->insert($document);

  print_r($document);
}
catch(Exception $e) { 
  print($e->getMessage()); 
}
?>
