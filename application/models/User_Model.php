<?php

class User_Model extends CI_Model
{
  public function all($con)
  {
    $this->db->select('u.*, r.role')
      ->from('user u')
      ->join('role r', 'u.role_id=r.id');
    if ($con == 'except-admin') {
      $this->db->where('u.role_id', 2);
    }
    return $this->db->get()->result();
  }

  public function store()
  {
    $data = [
      'name' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'nik' => $this->input->post('identity-code'),
      'image' => 'default-profile.png',
      'create_at' => date('Y-m-d'),
      'role_id' => 2,
      'is_active' => 1
    ];
    $this->db->insert('user', $data);
  }

  public function find($opt)
  {
    $this->db->select('*')
      ->from('user');
    if ($opt == 'auth') {
      $this->db->where('email', $this->input->post('email'));
    } else if ($opt == 'session') {
      $this->db->where('id', $this->session->userdata('id'));
    } else {
      $this->db->where('id', $opt);
    }
    return $this->db->get()->row_array();
  }

  public function find_user_by_session()
  {
    return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  }

  public function put($id)
  {
    $image_upload = $_FILES['image']['name'];
    if ($image_upload) {
      $config = [
        'upload_path' => './assets/img/profiles/',
        'allowed_types' => 'gif|jpg|png',
        'max_sizes' => '4092',
      ];

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('image')) {
        $new_image = $this->upload->data('file_name');
        $this->db->set('image', $new_image);
      } else {
        $this->session->set_flashdata('message', "<div class='alert alert-danger'>$this->upload->display_errors()</div>");
        redirect('DashboardController');
      }
    }

    $this->db->set([
      'name' => $this->input->post('name'),
      'update_at' => date('Y-m-d')
    ]);
    $this->db->where('id', $id)->update('user');
  }

  public function find_all_activity()
  {
    $this->db->select('*')
      ->from('data-activity')
      ->where('user_id', $this->session->userdata('id'))
      ->order_by('id', 'DESC');

    return $this->db->get()->result_array();
  }

  public function month_activity()
  {
    $this->db->select('*')
      ->from('data-activity')
      ->where('user_id', $this->session->userdata('id'))
      ->where('MONTH(date)', date('m'))
      ->order_by('date', 'DESC');

    return $this->db->get()->result_array();
  }

  public function year_activity()
  {
    $this->db->select('*')
      ->from('data-activity')
      ->where('user_id', $this->session->userdata('id'))
      ->where('YEAR(date)', date('Y'))
      ->order_by('date', 'DESC');

    return $this->db->get()->result_array();
  }

  public function put_new_password()
  {
    $this->db->set('password', password_hash($this->input->post('new-password'), PASSWORD_DEFAULT))
      ->where('id', $this->session->userdata('id'));
    $this->db->update('user');
  }

  public function add_activity()
  {
    $data = [
      'user_id' => $this->session->userdata('id'),
      'destination' => $this->input->post('destination'),
      'location' => $this->input->post('location'),
      'date' => date('Y-m-d'),
      'time' => date('H:i:s', time() + 60 * 60 * 7)
    ];
    $this->db->insert('data-activity', $data);
  }
}
