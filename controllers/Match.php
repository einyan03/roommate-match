<?php
class Match extends CI_Controller{
  public function find_match(){
    $user_id = $this->session->userdata('user_id');

    $data['this_profile'] = $this->Profile_model->get_accomdetails($user_id);
    $data['m_profiles'] = $this->Match_model->accom_list($user_id);

    $data['main_content'] = 'match/find_match';
    $this->load->view('layout', $data);
  }

  public function match_details($user_id){
    $data['this_details'] = $this->Match_model->match_details($user_id);
    $data['main_content'] = 'match/match_details';
    $this->load->view('layout', $data);
  }

  public function satisfactory_report(){
    $data['main_content'] = 'match/satisfactory_report';
    $this->load->view('layout', $data);
  }
}
