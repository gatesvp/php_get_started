<?php
try {
  $mongo = new Mongo(); // default host:port
  $db = $mongo->example;
  $collection = $db->test;
  $collection->drop();

  $collection->insert(array('x' => 1));
  $collection->insert(array('x' => 2));
  $collection->insert(array('x' => 3));

  $results = $collection->find();

  #foreach($results as $r) { print_r($r); }

  while($results->hasNext()){
    $r = $results->getNext();
    print_r($r);
  }

}
catch(Exception $e) { 
  print($e->getMessage()); 
}
?>
