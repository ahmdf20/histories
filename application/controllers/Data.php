<?php

class Data extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function data_activity()
  {
    $query = '';
    $output = '';
    $id = $this->input->post('id');

    if ($this->input->post('query')) {
      $query = $this->input->post('query');
    }
    $data = $this->Activity->load_data_activity($id, $query);
    // var_dump($data);
    foreach ($data as $key => $data) {
      $i = $key + 1;
      $url = base_url('data/update_checkout/' . $data->id);
      $output .= "
      <tr title='$data->location'>
        <td>$i</td>
        <td>$data->destination</td>
        <td>$data->checkin_date | $data->checkin_time</td>
        <td>$data->checkout_date | $data->checkout_time</td>
        <td>$data->temperature&deg;C</td>
        <td>$data->date_diff day - $data->duration</td>
        <td>
          <a href='$url' class='btn btn-sm btn-warning'>Check Out</a>
        </td>
      </tr>";
    }
    echo $output;
  }

  public function data_users()
  {
    $output = '';
    $data = $this->User->all('except-admin');
    foreach ($data as $key => $data) {
      $i = $key + 1;
      $status = ($data->is_active == 1 ? 'ni ni-check-bold text-success' : 'ni ni-fat-remove text-danger');
      $url = base_url('admin/user_activity/' . $data->id);
      $output .= "
      <tr>
        <td>$i</td>
        <td>$data->name</td>
        <td>$data->create_at</td>
        <td>$data->update_at</td>
        <td><i class='$status'></i></td>
        <td>
        <a href='$url' class='btn btn-sm btn-primary'>Detail</a>
        </td>
      </tr>";
    }
    echo $output;
  }

  public function data_menus()
  {
    $output = '';
    $data = $this->Menu->all_menus();
    foreach ($data as $key => $data) {
      $i = $key + 1;
      $output .= "
      <tr>
        <td>$i</td>
        <td>$data->menu</td>
        <td>
        <a href='#' class='btn btn-sm btn-warning'>Edit</a>
        <a href='#' class='btn btn-sm btn-danger'>Hasus</a>
        </td>
      </tr>
      ";
    }
    echo $output;
  }

  public function data_access_menus()
  {
    $output = '';
    $data = $this->Menu->all_access_menus();
    foreach ($data as $key => $data) {
      $i = $key + 1;
      $output .= "
      <tr>
        <td>$i</td>
        <td>$data->menu</td>
        <td>$data->role</td>
        <td>
        <a href='#' class='btn btn-sm btn-warning'>Edit</a>
        <a href='#' class='btn btn-sm btn-danger'>Hasus</a>
        </td>
      </tr>
      ";
    }
    echo $output;
  }

  public function data_sub_menus()
  {
    $output = '';
    $data = $this->Menu->all_sub_menus();
    foreach ($data as $key => $data) {
      $i = $key + 1;
      $status = ($data->is_active == 1 ? 'ni ni-check-bold text-success' : 'ni ni-fat-remove text-danger');
      $output .= "
      <tr>
        <td>$i</td>
        <td>$data->menu</td>
        <td>$data->title</td>
        <td>$data->url</td>
        <td>$data->icon</td>
        <td><i class='$status'></i></td>
        <td>
        <a href='#' class='btn btn-sm btn-warning'>Edit</a>
        <a href='#' class='btn btn-sm btn-danger'>Hasus</a>
        </td>
      </tr>
      ";
    }
    echo $output;
  }

  public function update_checkout($id)
  {
    $this->Activity->put_checkout($id);
    redirect('user/see_activity');
  }
}
