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

  // update our document
  $query = array( '_id' => 'gates' );
  $update = array(
    '$set' => array('name' => 'GVP', 
      'contact.website' => 'http://10gen.com/'),
    '$inc' => array('followers' => 1),
    '$push' => array('friends' => 'antoine'),
    '$unset' => array('contact.twitter' => 1)
  );
  $collection->update($query, $update);

  $query = array( '_id' => 'gates');
  $result = $collection->findOne($query);

  print_r($result);
}
catch(Exception $e) { 
  print($e->getMessage()); 
}
?>
