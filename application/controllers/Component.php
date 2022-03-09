<?php

class Component extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }


  public function sidebar()
  {
    $menu = $this->Menu->menu();
    $output = '';
    $title = '';

    foreach ($menu->result() as $m) {
      $output .= "
      <hr class='my-3'>
          <h6 class='navbar-heading p-0 text-muted'>
            <span class='docs-normal'>$m->menu</span>
          </h6>";
      $submenu = $this->Menu->submenu($m->id);
      foreach ($submenu->result() as $sm) {
        $url = base_url($sm->url);
        $title = $this->input->post('title');
        $active = '';
        if ($sm->title == $title) {
          $active = "active";
        } else {
          $active = "";
        }
        $output .= "
        <ul class='navbar-nav'>
              <li class='nav-item'>
              <a class='nav-link $active' href='$url'>
                <i class='$sm->icon text-primary'></i>
                <span class='nav-link-text'>$sm->title</span>
              </a>    
              </li>
            </ul>
        ";
      }
    }

    echo $output;
  }
}
