<?php
require('/usr/local/www/hw2-creds.php');

try {

  $conn = new PDO('mysql:host=localhost;dbname=HW2', $db_user, $db_pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  function get_url($conn, $id){
    $stmt = $conn->prepare('SELECT * FROM Joshes WHERE id= :id');
    $stmt->execute(['id' => $id]);
    if($row = $stmt->fetch()){
      return $row['url'];
    } else {
      return 'No Match Found';
    }
  }

  $image = 'nothing';
  if(isset($_GET['joshMood'])){
    $image = get_url($conn, $_GET['joshMood']);
  }

  $reply = [
    'image' => $image,
  ];

  echo json_encode($reply);

} catch (PDOException $e) {
  echo 'ERROR ', $e->getMessage();
}
