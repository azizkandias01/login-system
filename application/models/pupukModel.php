<?php
defined('BASEPATH') or exit('No direct script access allowed');
class pupukModel extends CI_Model
{
    public function allPupuk()
    {
        $query = $this->db->query('select * from pupuk'); //mendapatkan seluruh data di table user

        return $query->result(); //mengembalikan nilai berupa array
    }
    public function getPupuk($id)
    {
        $this->db->distinct();
        $this->db->select("*");
        $this->db->from("pupuk");
        $this->db->where("id_pupuk", $id);
        return $data = $this->db->get()->result_array(); //mengembalikan nilai berupa array
    }
}
