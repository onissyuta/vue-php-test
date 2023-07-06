<?php
require_once('Message.php');
require_once('MessageDAO.php');

header('content-type: application/json; charset=utf-8');

// クロスオリジン許可（セキュリティ的には危険なので要検討）
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Methods: GET,POST,PUT,DELETE');


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
初回時のデータベース作成用
$db->exec('CREATE TABLE message (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    message TEXT
  );');
*/
