<?php
try {
  $mongo = new Mongo(); // default host:port
  $db = $mongo->example;
  $collection = $db->test;
  $collection->drop();

  $document = array( '_id' => 'gates',
    'name' => 'Gaëtan Voyer-Perrault',
    'friends' => array('bernie', 'alvin'),
    'followers' => 18,
    'contact' => array( 'twitter' => '@gatesvp',
      'email' => 'gates@10gen.com')
  );
  $collection->insert($document);

  $query = array( '_id' => 'gates');
  $fields = array( '_id' => 0, 'name' => 1, 'friends' => 1);
  $result = $collection->findOne($query, $fields);

  print_r($result);
}
catch(Exception $e) { 
  print($e->getMessage()); 
}
?>
