<?php
class Match_model extends CI_Model{
  public function accom_list($user_id){
    $this->db->select('
        accom_details.accom_fees,
        accom_details.num_roommates,
        accom_details.location,
        accom_details.stay_duration,
        users.id as user_id,
        users.firstname as user_firstname,
        users.lastname as user_lastname,
        users.program as user_program,
        users.semester as user_semester');

    $this->db->from('accom_details');
    $this->db->join('users', 'users.id = accom_details.user_id','LEFT');
    $this->db->where('users.id != ', $user_id);

    $data = $this->db->get();
    if($data->num_rows() < 1){
        return FALSE;
    }
    return $data->result();
  }

  public function match_details($user_id){
    $this->db->select('
        accom_details.accom_fees,
        accom_details.num_roommates,
        accom_details.location,
        accom_details.stay_duration,
        users.id as user_id,
        users.firstname as user_firstname,
        users.lastname as user_lastname,
        users.program as user_program,
        users.semester as user_semester,
        users.email as user_email,
        users.phone as user_phone');

    $this->db->from('accom_details');
    $this->db->join('users', 'users.id = accom_details.user_id','LEFT');
    $this->db->where('users.id', $user_id);

    $data = $this->db->get();
    return $data->result();
  }
}
