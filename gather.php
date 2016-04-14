<?php
require('db_access.php');

$image = 'nothing';
if(isset($_GET['joshMood'])){
  $image = get_url($conn, $_GET['joshMood']);
}

$reply = [
  'image' => $image,
];

echo json_encode($reply);
