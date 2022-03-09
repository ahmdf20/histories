<?php

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('menu/index', [
      'title' => 'Menu Management',
      'user' => $this->User->find('session')
    ]);
  }
}
