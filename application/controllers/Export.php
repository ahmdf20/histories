<?php

class Export extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function get_data_for_export()
  {
    $query = "";
    $output = "";
    $option = $this->input->post('option');
    if ($this->input->post('query')) {
      $query = $this->input->post('query');
    }
    $data = $this->Activity->find_all_activity_by_session($query, $option);
    foreach ($data as $key => $data) {
      $i = $key + 1;
      $output .= "
      <tr title='$data->location'>
        <td>$i</td>
        <td>$data->destination</td>
        <td>$data->date | $data->time</td>
        <td>$data->temperature&deg;C</td>
      </tr>";
    }
    echo $output;
  }
}
