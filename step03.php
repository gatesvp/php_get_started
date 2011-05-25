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

  // Basic query
  $query = array( '_id' => 'gates');
  $result = $collection->findOne($query);
  print($result['_id']."\n");

  // Query on array
  $query = array( 'friends' => 'alvin');
  $result = $collection->findOne($query);
  print($result['_id']."\n");

  // Query on sub-document
  $query = array( 'contact.twitter' => '@gatesvp');
  $result = $collection->findOne($query);
  print($result['_id']."\n");
}
catch(Exception $e) { 
  print($e->getMessage()); 
}
?>
