<?php

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function blocked()
  {
    echo "Is Blocked 404";
  }

  public function index()
  {
    $this->load->view('auth/login', [
      'title' => 'Login',
    ]);
  }

  public function register()
  {
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
    $this->form_validation->set_rules('identity-code', 'Identity Code', 'required|trim|is_unique[user.nik]');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');
    $this->form_validation->set_rules('repeat-password', 'Repeat Password', 'required|trim|matches[password]');

    if ($this->form_validation->run() == false) {
      $this->load->view('auth/register', [
        'title' => 'Register'
      ]);
    } else {
      $this->User->store();
      $this->session->set_flashdata('message', '<div class="alert alert-success">Success to create account!</div>');
      redirect('auth');
    }
  }

  public function credential()
  {
    $user = $this->User->find('auth');

    if ($user) {
      if (password_verify($this->input->post('password'), $user['password'])) {
        if ($user['is_active'] == 1) {
          $data = [
            'id' => $user['id'],
            'email' => $user['email'],
            'role_id' => $user['role_id'],
          ];
          $this->session->set_userdata($data);
          redirect('profile');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-warning">Account didnt activated yet!</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-warning">Wrong password!</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning">Account cannot find!</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata(['id', 'email', 'role_id']);
    $this->session->set_flashdata('message', '<div class="alert alert-success">Success to logout!</div>');
    redirect('auth');
  }
}
