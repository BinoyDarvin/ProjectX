<?php

function db_query($query, $param = array(), $return = false){

  $con = new PDO("mysql:host=localhost;dbname=projectX","root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //if connection fails close
  if (!$con) {
    echo "Error : 800";
    exit;
  }

  $stmt = $con->prepare($query);
  $stmt->execute($param);
  //only if the query is select, we need return
  if ($return) {
    return $stmt->fetchAll();
  }

}








?>
