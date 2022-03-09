<?php

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('user/index', [
      'title' => 'Dashboard',
      'user' => $this->User->find('session'),
      'activity' => $this->Activity->find_all_activity_by_user_id('all', $this->session->userdata('id')),
      'month' => $this->Activity->find_all_activity_by_user_id('month', date('m')),
      'year' => $this->Activity->find_all_activity_by_user_id('year', date('Y')),
    ]);
  }

  public function see_activity()
  {
    $this->load->view('user/see-activity', [
      'title' => 'Dashboard | Data Activity',
      'user' => $this->User->find('session'),
      'activity' => $this->User->find_all_activity(),
    ]);
  }

  public function add_activity()
  {
    $this->form_validation->set_rules('destination', 'Destination', 'required|trim');
    $this->form_validation->set_rules('location', 'Location', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('user/add-activity', [
        'title' => 'Add Activity',
        'user' => $this->User->find('session')
      ]);
    } else {
      $this->User->add_activity();
      $this->session->set_flashdata('message', '<div class="alert alert-success">Success to Add new History!</div>');
      redirect('user/see_activity');
    }
  }
}
