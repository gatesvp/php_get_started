<?php
try {
  $mongo = new Mongo(); // default host:port
  $db = $mongo->example;
  $collection = $db->test;
  $collection->drop();

  $collection->insert(array('x' => 1));
  $collection->insert(array('x' => 2));
  $collection->insert(array('x' => 3));

  print($collection->find()->count()."\n");  // 3
  foreach($collection->find()->limit(1) as $doc){
    print_r($doc);
  }  // x=>1
  foreach($collection->find()->skip(1)->limit(1) as $doc){
    print_r($doc);
  }// x=>2

}
catch(Exception $e) { 
  print($e->getMessage()); 
}
?>
