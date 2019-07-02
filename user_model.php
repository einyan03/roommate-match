<?php
class User_model extends CI_Model{

    public function create_new_member(){
      $enc_password = md5($this->input->post('password'));

      $new_member_insert = array(
        'firstname'        => $this->input->post('firstname'),
        'lastname'         => $this->input->post('lastname'),
        'email'            => $this->input->post('email'),
        'phone'            => $this->input->post('phone'),
        'program'          => $this->input->post('program'),
        'semester'         => $this->input->post('semester'),
        'username'         => $this->input->post('username'),
        'password'         => $enc_password
      );

      $insert = $this->db->insert('users', $new_member_insert);
      return $insert;
    }

    public function login_user($username, $password){
      $enc_password = md5($password);

      //Validate
      $this->db->where('username',$username);
      $this->db->where('password',$enc_password);

      $result = $this->db->get('users');
      // one match
      if($result->num_rows() == 1){
          return $result->row(0)->id;
      } else {
          return false;
      }
    }

    public function update_userdata($email, $data){
      $this->db->where('email', $email);
      $this->db->update('users', $data);
      return TRUE;
    }

    public function check_email($email){
      $query = $this->db->from('users');
      $this->db->where('email', $email);
      $data = $this->db->get();

      if ($data->num_rows() > 0){
        return true;
      }else{
        return false;
      }
    }

    public function check_pwCode($code, $email){
      $this->db->from('users');
      $this->db->where('email', $email);
      $this->db->where('forgot_password', $code);

      $data = $this->db->get();

      if ($data->num_rows() > 0){
        return true;
      }else{
        return false;
      }
    }
}
