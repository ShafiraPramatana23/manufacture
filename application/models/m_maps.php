<?php
class M_maps extends CI_Model
{
  //---------------------------------------------

  // public function get_rs()
  // {
  //   $sql = "select * from rs";
  //   $query = $this->db->query($sql);
  //   return $query->result_array();
  // }

  public function getcity()
  {
    $sql = "select * from city c where c.id_city in (select id_city from manufacture)";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  public function getcategory()
  {
    $sql = "select * from category";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  public function getmanufacture($category, $city, $popularity, $employee, $distanceMin, $distanceMax, $salaryMin, $salaryMax)
  {
    $sql = "select * from manufacture m 
    inner join city c on m.id_city = c.id_city
    inner join category cat on m.id_category = cat.id_category
    left join photo p on m.id_photo = p.id_photo
    where m.id_manufacture <> 0";

    if ($category != 0) {
      $sql = $sql . " and m.id_category = " . $category;
    }

    if ($city != 0) {
      $sql = $sql . " and m.id_city = " . $city;
    }

    if ($popularity != 0) {
      $sql = $sql . " and m.rating >= " . $popularity;
    }

    if ($employee != 0) {
      if ($employee != 2000)
        $sql = $sql . " and m.employee < " . $employee;
      else
        $sql = $sql . " and m.employee > " . $employee;
    }

    if ($salaryMin == 0 && $salaryMax == 0) {
      $sql = $sql;
    } else {
      if ($salaryMax == 0) {
        $sql = $sql . " and m.salary > " . $salaryMin;
      } elseif ($salaryMin == 0) {
        $sql = $sql . " and m.salary < " . $salaryMax;
      } else {
        $sql = $sql . " and m.salary > " . $salaryMin . " and m.salary < " . $salaryMax;
      }
    }

    if ($distanceMin == 0 && $distanceMax == 0) {
      $sql = $sql;
    } else {
      if ($distanceMax == 0) {
        $sql = $sql . " and m.distance > " . $distanceMin;
      } elseif ($distanceMin == 0) {
        $sql = $sql . " and m.distance < " . $distanceMax;
      } else {
        $sql = $sql . " and m.distance > " . $distanceMin . " and m.distance < " . $distanceMax;
      }
    }

    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function getDetail($id)
  {
    $sql = "select * from manufacture m 
    inner join city c on m.id_city = c.id_city
    inner join category cat on m.id_category = cat.id_category
    left join photo p on m.id_photo = p.id_photo
    where m.id_manufacture = " . $id;

    $query = $this->db->query($sql);
    return $query->result_array();
  }
}
