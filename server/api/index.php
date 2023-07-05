<?php
require_once('Message.php');
require_once('MessageDAO.php');

header('content-type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *"); // クロスオリジン許可

$db = new MessageDAO();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo json_encode($db->findAll(), JSON_UNESCAPED_UNICODE);
} elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['name']) && isset($_POST['message'])) {
        $db->create(new Message($_POST['name'], $_POST['message']));
    }
} elseif($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $db->deleteAll();
}



/*
データベース作成
$db->exec('CREATE TABLE message (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    message TEXT
  );');
*/
