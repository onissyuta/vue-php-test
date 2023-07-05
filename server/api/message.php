<?php

$array = [
    'tokyo' => [
        '品川',
        '五反田',
        '三軒茶屋',
        '四谷'
    ],
    'kanagawa' => [
        '横浜',
        '相模原',
        '湘南',
        '鎌倉'
    ],
    'saitama' => [
        '所沢',
        '狭山',
        '川口',
        '浦和',
        '小手指',
        '飯能'
    ]
];


header('content-type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *"); // クロスオリジン許可

echo json_encode($array, JSON_UNESCAPED_UNICODE);


$db = new SQLite3('sqlite.db');
/*
$db->exec('CREATE TABLE message (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    message TEXT
  );');

$db->exec("INSERT INTO message (name, message) VALUES ('anonymous', 'テスト')");

$result = $db->query('SELECT * FROM message');
var_dump($result->fetchArray());
*/

// 



class message {
    private $id = "";
    private $name = "";
    private $message = "";

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getMessage(){
        return $this->message;
    }

    public function setMessage($message){
        $this->message = $message;
    }
}





$obj = new message();
$obj->setName("あああ");
var_dump($obj);



?>
