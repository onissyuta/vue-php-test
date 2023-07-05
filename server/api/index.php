<?php
require_once('Message.php');
require_once('MessageDAO.php');

header('content-type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *"); // クロスオリジン許可




$db = new MessageDAO();
$db->create(new Message(null, "とくめい", "さようなら"));
var_dump($db->findAll());


/*
データベース作成
$db->exec('CREATE TABLE message (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    message TEXT
  );');
*/

?>
