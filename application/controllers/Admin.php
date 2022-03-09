<?php

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library(['form_validation']);
    $this->load->helper(['url', 'form']);
    $this->load->model(['User']);
  }

  public function index()
  {
    $this->load->view('admin/index', [
      'title' => 'Dashboard',
      'user' => $this->User->find('session'),
      'users' => $this->User->all('all'),
      'histories' => $this->Activity->all(),
      'month_history' => $this->Activity->find_by_date('year-month', ['year' => date('Y'), 'month' => date('m')]),
      'year_history' => $this->Activity->find_by_date('year', ['year' => date('Y')])
    ]);
  }

  public function users()
  {
    $this->load->view('admin/users', [
      'title' => 'Users',
      'user' => $this->User->find('session'),
      'users' => $this->User->all('all')
    ]);
  }

  public function user_activity($id)
  {
    $this->load->view('admin/user-activity', [
      'title' => 'User Activities',
      'user' => $this->User->find('session'),
      'user_activity' => $this->User->find($id),
    ]);
  }
}
