<?php
class MessageDAO {
    private $db = null;

    function __construct(){
        $this->db = new SQLite3('sqlite.db');
    }

    function __destruct(){
        $this->db->close();
    }

    public function create($name, $message){
        $pstmt = $this->db->prepare('INSERT INTO message (name, message) VALUES (:name, :message)');
        $pstmt->bindValue(':name', $name);
        $pstmt->bindValue(':message', $message);
        $pstmt->execute();
    }

    public function findAll(){
        $result = $this->db->query('SELECT * FROM message');
        $row = array();
        $i = 0;
        while ($cols = $result->fetchArray()) { 
            $row[$i]['id'] = $cols['id'];
            $row[$i]['name'] = $cols['name'];
            $row[$i]['message'] = $cols['message'];
            $i++;
        }
        return $row;
    }

    public function deleteAll(){
        $this->db->exec('DELETE FROM message');
    }
}