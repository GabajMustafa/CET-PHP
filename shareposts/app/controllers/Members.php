<?php
  class Members extends Controller{

    public function __construct(){
        $this->userModel = $this->model('Member');
    }

    // Load All Posts
    public function list(){
      

      $data = $this->userModel->getMemebrs();
      
      $this->view('members/list', $data);
    }


  }