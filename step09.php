<?php
try {
  $mongo = new Mongo(); // default host:port
  $db = $mongo->example;
  $collection = $db->test;
  $collection->drop();

  $query = array('_id' => 'gates');
  $update = array('$inc' => array('followers' => 1));
  $options = array('upsert' => true);
  $collection->update($query, $update, $options);

  $results = $collection->find();
  foreach($results as $r) { print_r($r); }

}
catch(Exception $e) { 
  print($e->getMessage()); 
}
?>
