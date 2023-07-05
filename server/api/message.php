<?php
class Message {
    private $id = "";
    private $name = "";
    private $message = "";

    function __construct($id, $name, $message){
        $this->id = $id;
        $this->name = $name;
        $this->message = $message;
    }

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