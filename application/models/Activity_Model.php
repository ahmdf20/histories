<?php

class Activity_Model extends CI_Model
{
  public function all()
  {
    return $this->db->get('data-activity')->result();
  }

  public function find_by_date($opt, $con)
  {
    $this->db->select('*')
      ->from('data-activity');
    if ($opt == 'year-month') {
      $this->db->where('YEAR(date)', $con['year'])->where('MONTH(date)', $con['month']);
    } else if ($opt == 'year') {
      $this->db->where('YEAR(date)', $con['year']);
    } else {
      $this->db->where('MONTH(date)', $con['month']);
    }
    return $this->db->get()->result();
  }

  public function find_all_activity_by_user_id($opt, $con)
  {
    $this->db->select('*')
      ->from('data-activity');
    if ($opt == 'year') {
      $this->db->where('YEAR(date)', $con);
    } else if ($opt == 'month') {
      $this->db->where('MONTH(date)', $con);
    } else {
      $this->db->where('user_id', $con);
    }
    $this->db->order_by('date', 'DESC')
      ->order_by('time', 'DESC');
    return $this->db->get()->result();
  }

  public function load_data_activity($id, $query)
  {
    $this->db->select('*')
      ->from('data-activity da');
    if ($query != '') {
      $this->db->like('destination', $query)
        ->or_like('location', $query)
        ->or_like('date', $query)
        ->or_like('time', $query);
    }
    $this->db->where('user_id', $id)
      ->order_by('date', 'DESC')
      ->order_by('time', 'DESC');
    return $this->db->get()->result();
  }

  public function find_all_activity_by_session($query, $opt)
  {
    $this->db->select('*')
      ->from('data-activity da');
    if ($opt == "month") {
      $this->db->where('MONTH(date)', $query);
    } else {
      $this->db->where('YEAR(date)', $query);
    }
    $this->db->where('user_id', $this->session->userdata('id'))
      ->order_by('date', 'DESC')
      ->order_by('time', 'DESC');
    return $this->db->get()->result();
  }
}
