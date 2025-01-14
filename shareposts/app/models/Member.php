<?php
  class Member {
    
    public $data = [];

    public function __construct(){
        $this->data = [
            'Members' => "Welcome to our Website!"
        ];
    }

    public function getMemebrs() {

        return $this->data;

    }

 
  }