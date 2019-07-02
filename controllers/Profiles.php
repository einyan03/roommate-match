<?php
class Profiles extends CI_Controller{

  //---------------------------user details------------------------------------//

  public function myprofile(){
    $user_id = $this->session->userdata('user_id');
    $data['info'] = $this->Profile_model->get_record($user_id);

    $data['main_content'] = 'profiles/myprofile';
    $this->load->view('layout', $data);
  }

  public function edit_myprofile($user_id){

    $this->form_validation->set_rules('firstname','First Name','trim|required|xss_clean');
    $this->form_validation->set_rules('lastname','Last Name','trim|required|xss_clean');
    $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
    $this->form_validation->set_rules('phone','Phone','trim|xss_clean');
    $this->form_validation->set_rules('program','Program of Study','trim|required|xss_clean');
    $this->form_validation->set_rules('semester','Current Semester','trim|required|xss_clean');

    if($this->form_validation->run() == FALSE){
        //Get the current list info
        $data['this_profile'] = $this->Profile_model->get_record($user_id);
        //Load view and layout
        $data['main_content'] = 'profiles/edit_myprofile';
        $this->load->view('layout',$data);
    } else {
        //Validation has ran and passed
         //Post values to array
        $data = array(
            'firstname'     => $this->input->post('firstname'),
            'lastname'      => $this->input->post('lastname'),
            'email'         => $this->input->post('email'),
            'phone'         => $this->input->post('phone'),
            'program'       => $this->input->post('program'),
            'semester'      => $this->input->post('semester'),
        );
       if($this->Profile_model->edit_record($user_id,$data)){
            $this->session->set_flashdata('myprofile_updated', 'Your profile has been updated.');
            //Redirect to index page with error above
            redirect('profiles/myprofile');
       }
    }
  }

  public function update_credentials($user_id){
    $this->form_validation->set_rules('password1','Password','trim|required|min_length[4]|max_length[50]|xss_clean');
    $this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password1]|xss_clean');

    if($this->form_validation->run() == FALSE){
        //Get the current list info
        $data['info'] = $this->Profile_model->get_record($user_id);
        //Load view and layout
        $data['main_content'] = 'profiles/update_credentials';
        $this->load->view('layout',$data);
    } else {
        //Validation has ran and passed
         //Post values to array

         if('password' == $this->input->post('current_password')){
           $data = array(
               'username'      => $this->input->post('username'),
               'password'      => md5($this->input->post('password'))
           );
         }
         else {
           $this->session->set_flashdata('password_unmatch', 'Please enter a correct password.');
           redirect('profiles/update_credentials');
         }

         if($this->Profile_model->update_cred($user_id,$data)){
           $this->session->set_flashdata('credentials_updated', 'Your credentials has been updated.');
           //Redirect to index page with error above
           redirect('Users/logout');
       }
    }
  }

  //---------------------------match details------------------------------------//

  public function mymatchprofile(){
    // if there is already a profile then show
    $user_id = $this->session->userdata('user_id');
    $data['info'] = $this->Profile_model->get_record($user_id);
    $data['details'] = $this->Profile_model->get_accomdetails($user_id);

    $data['main_content'] = 'profiles/mymatchprofile';
    $this->load->view('layout', $data);

    // will have to use userdata to store matchprofile true statement
  }

  public function create_matchprofile($user_id){
    $this->form_validation->set_rules('accomodation', 'Accomodation', 'required|xss_clean');
    $this->form_validation->set_rules('roommates', 'No. of Roommates', 'required|xss_clean');
    $this->form_validation->set_rules('location', 'Location', 'required|xss_clean');
    $this->form_validation->set_rules('stay', 'Duration of Stay', 'required|xss_clean');

    if($this->form_validation->run() == FALSE){
        //Load view and layout
        $data['info'] = $this->Profile_model->get_record($user_id);
        $data['this_profile'] = $this->Profile_model->get_accomdetails($user_id);

        $data['main_content'] = 'profiles/create_matchprofile';
        $this->load->view('layout', $data);
    //Validation has ran and passed
    } else {

      if($this->Profile_model->create_mprofile($user_id)){
        $this->session->set_flashdata('created_mprofile', 'Your profile to match your potential roommate has been successfully created.');
        redirect('profiles/mymatchprofile');
       }
    }
  }

  public function edit_matchprofile($user_id){

    $this->form_validation->set_rules('accomodation', 'Accomodation', 'required|xss_clean');
    $this->form_validation->set_rules('roommates', 'No. of Roommates', 'required|xss_clean');
    $this->form_validation->set_rules('location', 'Location', 'required|xss_clean');
    $this->form_validation->set_rules('stay', 'Duration of Stay', 'required|xss_clean');

    if($this->form_validation->run() == FALSE){
        //Get the current list info
        $data['info'] = $this->Profile_model->get_record($user_id);
        $data['this_profile'] = $this->Profile_model->get_accomdetails($user_id);
        //Load view and layout
        $data['main_content'] = 'profiles/edit_matchprofile';
        $this->load->view('layout',$data);
    } else {
        //Validation has ran and passed
         //Post values to array
        $data = array(
          'accom_fees'        => $this->input->post('accomodation'),
          'num_roommates'     => $this->input->post('roommates'),
          'location'          => $this->input->post('location'),
          'stay_duration'     => $this->input->post('stay'),
          'user_id'           => $user_id
        );
       if($this->Profile_model->edit_mprofile($user_id,$data)){
            $this->session->set_flashdata('updated_mprofile', 'Your match profile has been updated.');
            //Redirect to index page with error above
            redirect('profiles/mymatchprofile');
       }
    }
  }
}
