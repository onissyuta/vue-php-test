<?php
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
        $resultObj = array();
        while ($cols = $result->fetchArray()) { 
            array_push($resultObj, new Message($cols[0], $cols[1], $cols[2]));
        }
        return $resultObj;
    }

    public function deleteAll(){
        $this->db->exec('DELETE FROM message');
    }
}