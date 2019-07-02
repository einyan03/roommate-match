<?php
class Profile_model extends CI_Model{

  //---------------------------user details------------------------------------//

  public function get_record($user_id){
    $query = $this->db->from('users');
    $this->db->where('id', $user_id);
    $data = $this->db->get();

    return $data->row();
  }

  public function edit_record($user_id, $data){
    $this->db->where('id', $user_id);
    $this->db->update('users', $data);
    return TRUE;
  }

  public function update_cred($user_id, $data){
    $this->db->where('id', $user_id);
    $this->db->update('users', $data);
    return TRUE;
  }
  //---------------------------match details------------------------------------//

  public function create_mprofile($user_id){
    $this->db->where('id', $user_id);
    $this->db->update('users', ['m_created' => 1]);

    $new_profile_insert = array(
      'accom_fees'        => $this->input->post('accomodation'),
      'num_roommates'     => $this->input->post('roommates'),
      'location'          => $this->input->post('location'),
      'stay_duration'     => $this->input->post('stay'),
      'user_id'           => $user_id
    );

    $insert = $this->db->insert('accom_details', $new_profile_insert);
    return $insert;
  }

  public function get_accomdetails($user_id){
    $query = $this->db->from('accom_details');
    $this->db->where('user_id', $user_id);
    $data = $this->db->get();

    return $data->row();
  }

  public function edit_mprofile($user_id, $data){
    $this->db->where('user_id', $user_id);
    $this->db->update('accom_details', $data);
    return TRUE;
  }
}
