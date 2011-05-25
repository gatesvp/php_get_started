<?php
try {
  $mongo = new Mongo(); // default host:port
  $db = $mongo->example;
  $collection = $db->test;
  $collection->drop();

  $document = array(
    'normal' => array('first','second'),
    'crazy' => array("0" => 'first', '1' => 'second'),
    'arrayObj' => new ArrayObject(array('first', 'second')),
    'object' => array('1' => 'first', '2' => 'second')
  );

  $collection->insert($document);

  $collection->update(array(), 
    array('$push' => array('crazy' => 'third'))
  ); // works

  $collection->update(array(), 
    array('$push' => array('normal' => 'third'))
  ); // works

  $collection->update(array(), 
    array('$push' => array('object' => 'third'))
  ); // works

  $collection->update(array(), 
    array('$push' => array('arrayObj' => 'third'))
  ); // works

  $results = $collection->find();
  foreach($results as $r) { print_r($r); }

}
catch(Exception $e) { 
  print($e->getMessage()); 
}
?>
