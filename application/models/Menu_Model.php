<?php

class Menu_Model extends CI_Model
{
  public function all_menus()
  {
    return $this->db->get('user_menu')->result();
  }

  public function all_access_menus()
  {
    $this->db->select('uam.*, r.role, um.menu')
      ->from('user_access_menu uam')
      ->join('user_menu um', 'uam.menu_id=um.id')
      ->join('role r', 'uam.role_id=r.id');
    return $this->db->get()->result();
  }

  public function all_sub_menus()
  {
    $this->db->select('usm.*, um.menu')
      ->from('user_sub_menu usm')
      ->join('user_menu um', 'usm.menu_id=um.id');
    return $this->db->get()->result();
  }

  public function menu()
  {
    $this->db->select('um.*')
      ->from('user_menu um')
      ->join('user_access_menu uam', 'um.id=uam.menu_id')
      ->where('uam.role_id', $this->session->userdata('role_id'));
    return $this->db->get();
  }

  public function submenu($id)
  {
    $this->db->select('usm.*')
      ->from('user_sub_menu usm')
      ->join('user_menu um', 'usm.menu_id=um.id')
      ->where('usm.menu_id', $id)
      ->where('usm.is_active', 1);
    return $this->db->get();
  }
}
