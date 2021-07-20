<?php
class M_maps extends CI_Model
{
  //---------------------------------------------

  public function get_rs()
  {
    $sql = "select * from rs";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
}
