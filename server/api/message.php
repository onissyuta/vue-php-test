<?php
header('content-type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *"); // クロスオリジン許可

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


class Message {
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


class MessageDAO {
    private $db = null;

    // コンストラクタ
    function __construct(){
        $this->db = new SQLite3('sqlite.db');
    }

    // デストラクタ
    function __destruct(){
        $this->db->close(); // 接続を閉じる
    }


    public function create($obj){
        $pstmt = $this->db->prepare('INSERT INTO message (name, message) VALUES (:name, :message)');
        $pstmt->bindValue(':name', $obj->getName());
        $pstmt->bindValue(':message', $obj->getMessage());
        $pstmt->execute();
    }


    public function findAll(){
        $result = $this->db->query('SELECT * FROM message');
        return $result->fetchArray();

    }

    public function findOneById($id){
        $pstmt = $this->db->prepare('SELECT * FROM message WHERE id = :id');
        $pstmt->bindValue(':name', $id);
        return $pstmt->execute();
    }


    public function deleteAll(){
        return $this->db->exec('DELETE * FROM message');
    }

}


/*

$obj = new message();
$obj->setName("あああ");
var_dump($obj);
*/

$db = new MessageDAO();
var_dump($db->findAll());
var_dump($db->findOneById(1));


?>
