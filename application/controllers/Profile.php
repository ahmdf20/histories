<?php

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('account/profile', [
        'title' => 'Profile',
        'user' => $this->User->find('session')
      ]);
    } else {
      $id = $this->session->userdata('id');
      $this->User->put($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Success to update data!</div>');
      redirect('profile');
    }
  }

  public function change_password()
  {
    $this->load->view('account/change-password', [
      'title' => 'Profile',
      'user' => $this->User->find('session')
    ]);
  }

  public function put_new_password()
  {
    $data = $this->User->find('session');
    $old = $this->input->post('old-password');
    if (!password_verify($old, $data['password'])) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Wrong old password!</div>');
      redirect('profile/change_password');
    } else {
      $this->User->put_new_password();
      $this->session->set_flashdata('message', '<div class="alert alert-success">Success to Change Password!</div>');
      redirect('profile');
    }
  }
}
