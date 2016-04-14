<?php
require('/usr/local/www/hw2-creds.php');

try {

  $conn = new PDO('mysql:host=localhost;dbname=HW2', $db_user, $db_pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  function get_name($conn, $id){
    $stmt = $conn->prepare('SELECT * FROM Joshes WHERE id= :id');
    $stmt->execute(['id' => $id]);
    if($row = $stmt->fetch()){
      return $row['name'];
    } else {
      return 'No Match Found';
    }
  }

  function get_url($conn, $id){
    $stmt = $conn->prepare('SELECT * FROM Joshes WHERE id= :id');
    $stmt->execute(['id' => $id]);
    if($row = $stmt->fetch()){
      return $row['url'];
    } else {
      return 'No Match Found';
    }
  }

  function get_names($conn){
    $stmt = $conn->prepare('SELECT name FROM Joshes');
    $stmt->execute();
    $arr = [];
    while($row = $stmt->fetch()){
      $arr[] = $row['name'];
    }
    return $arr;
  }

  function get_urls($conn){
    $stmt = $conn->prepare('SELECT url FROM Joshes');
    $stmt->execute();
    $arr = [];
    while($row = $stmt->fetch()){
      $arr[] = $row['url'];
    }
    return $arr;
  }

  function get_pix_count($conn){
    $stmt = $conn->prepare('SELECT COUNT(*) FROM Joshes');
    $stmt->execute();
    return $stmt->fetchColumn();
  }

  $reply = [
    'num_selections' => get_pix_count($conn),
    'names' => get_names($conn),
    'urls' => get_urls($conn)
  ];

  echo json_encode($reply);

} catch (PDOException $e) {
  echo 'ERROR ', $e->getMessage();
}
