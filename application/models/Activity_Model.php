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
      $this->db->where('YEAR(checkin_date)', $con['year'])->where('MONTH(checkin_date)', $con['month']);
    } else if ($opt == 'year') {
      $this->db->where('YEAR(checkin_date)', $con['year']);
    } else {
      $this->db->where('MONTH(checkin_date)', $con['month']);
    }
    return $this->db->get()->result();
  }

  public function find_all_activity_by_user_id($opt, $con)
  {
    $this->db->select('*')
      ->from('data-activity');
    if ($opt == 'year') {
      $this->db->where('YEAR(checkin_date)', $con);
    } else if ($opt == 'month') {
      $this->db->where('MONTH(checkin_date)', $con);
    } else {
      $this->db->where('user_id', $con);
    }
    $this->db->order_by('checkin_date', 'DESC')
      ->order_by('checkin_time', 'DESC');
    return $this->db->get()->result();
  }

  public function load_data_activity($id, $query)
  {
    $this->db->select('*, TIMEDIFF(checkout_time, checkin_time) as duration, DATEDIFF(checkout_date, checkin_date) as date_diff')
      ->from('data-activity da');
    if ($query != '') {
      $this->db->like('destination', $query)
        ->or_like('location', $query)
        ->or_like('checkin_date', $query)
        ->or_like('checkin_time', $query);
    }
    $this->db->where('user_id', $id)
      ->order_by('checkin_date', 'DESC')
      ->order_by('checkin_time', 'DESC');
    return $this->db->get()->result();
  }

  public function find_all_activity_by_session($query, $opt)
  {
    $this->db->select('*')
      ->from('data-activity da');
    if ($opt == "month") {
      $this->db->where('MONTH(checkin_date)', $query);
    } else {
      $this->db->where('YEAR(checkin_date)', $query);
    }
    $this->db->where('user_id', $this->session->userdata('id'))
      ->order_by('checkin_date', 'DESC')
      ->order_by('checkin_time', 'DESC');
    return $this->db->get()->result();
  }

  public function put_checkout($id)
  {
    $data = [
      'checkout_date' => date('Y-m-d'),
      'checkout_time' => date('H:i:s')
    ];

    $this->db->where('id', $id);
    $this->db->update('data-activity', $data);
  }
}
