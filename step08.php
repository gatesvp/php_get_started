<?php
try {
  $mongo = new Mongo(); // default host:port
  $db = $mongo->example;
  $collection = $db->test;
  $collection->drop();

  $collection->insert(array('x' => 1));
  $collection->insert(array('x' => 1));
  $collection->insert(array('x' => 3));

  $query = array('x' => 1);
  $update = array('$inc' => array('x' => 1));
  $options = array('multiple' => true);
  $collection->update($query, $update, $options);

  $results = $collection->find();
  foreach($results as $r) { print_r($r); }

}
catch(Exception $e) { 
  print($e->getMessage()); 
}
?>
