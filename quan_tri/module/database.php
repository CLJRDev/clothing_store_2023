<?php
  function execute_command($sql, $params=NULL) {
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'shopthoitrang';
    $conn = new PDO("mysql:host={$server};dbname={$dbname}", $username, $password);
    $stmt = $conn->prepare($sql);
    if (isset($params))
      foreach ($params as $key => $value)
        $stmt->bindValue($key,$value,PDO::PARAM_STR);
    $stmt->execute();
  }
  function execute_query($sql, $params=NULL) {
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'shopthoitrang';
    $conn = new PDO("mysql:host={$server};dbname={$dbname}", $username, $password);
    $stmt = $conn->prepare($sql);
    if (isset($params))
      foreach ($params as $key => $value)
        $stmt->bindValue($key,$value,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
  }
?>