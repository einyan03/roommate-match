<?php
class Users extends CI_Controller{

    public function signup(){

      if($this->session->userdata('logged_in')){
          redirect('home/index');
      }

      $this->form_validation->set_rules('firstname','First Name','trim|required|xss_clean');
      $this->form_validation->set_rules('lastname','Last Name','trim|required|xss_clean');
      $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|is_unique[users.email]');
      $this->form_validation->set_rules('phone','Phone','trim|xss_clean');
      $this->form_validation->set_rules('program','Program of Study','trim|required|xss_clean');
      $this->form_validation->set_rules('semester','Current Semester','trim|required|xss_clean');

      $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|xss_clean|is_unique[users.username]');
      $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');
      $this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]|xss_clean');

      if($this->form_validation->run() == FALSE){
          //Load view and layout
          $data['main_content'] = 'users/signup';
          $this->load->view('layout', $data);
      //Validation has ran and passed
      } else {
        if($this->User_model->create_new_member()){
          $this->session->set_flashdata('signed_up', 'Your account has been successfully created. You can login now.');
          redirect('users/login');
        }
      }
    }

    public function login(){
      $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|xss_clean');
      $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');

      if($this->form_validation->run() == FALSE){
          //Set error
          $data['main_content'] = 'users/login';
          $this->load->view('layout', $data);
        } else {
         //Get from post
         $username = $this->input->post('username');
         $password = $this->input->post('password');

         //Get user id from model
         $user_id = $this->User_model->login_user($username,$password);

         //Validate user
         if($user_id){
             //Create array of user data
             $user_data = array(
                     'user_id'   => $user_id,
                     'username'  => $username,
                     'logged_in' => true
              );
              //Set session userdata
             $this->session->set_userdata($user_data);
             $this->session->set_flashdata('login_success', 'You have successfully logged into MyWEB.');
             redirect('home/index');
          } else {
              //Set error
              $this->session->set_flashdata('login_failed', 'Invalid username or password. Please try again.');
              redirect('users/login');
          }
      }
    }

    public function logout(){
        //Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();

         //Set message
        $this->session->set_flashdata('logged_out', 'You have been logged out of your account.');
        redirect('home/index');
    }

    public function forget_password(){
      $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');

      if($this->form_validation->run() == FALSE){
        $data['main_content'] = 'users/forget_password';
        $this->load->view('layout', $data);
      }else{
        $email = $this->input->post('email');
        if(!$this->User_model->check_email($email)){
          $this->session->set_flashdata('email_notexist', 'The email address you have entered does not exist.');
          redirect('users/forget_password');
        }else{
          $code = mt_rand('5000', '200000');
          $data = array(
            'forgot_password' => $code
          );

          if($this->User_model->update_userdata($email,$data)){
            $this->load->library('email');
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';

            $this->email->initialize($config);// add this line

            $this->email->from('wall.e.3996@gmail.com', 'noreply');
            $this->email->to('einyan03@gmail.com');

            $this->email->subject('Password Reset');
            $url = site_url() . 'users/reset_password/' . $code;
            $body = "\nPlease click the following link to reset your password:\n\n".$url."\n\n";
            $this->email->message($body);
            if($this->email->send())
            {
              $this->session->set_flashdata('email_sent', 'Please check your email and follow the instruction to reset password.');
              redirect('users/login');
            }
            echo $this->email->print_debugger();
          }
        }
      }
    }

    public function reset_password(){
      $this->form_validation->set_rules('code', 'Code', 'required|min_length[4]|max_length[7]|xxs_clean');
      $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
      $this->form_validation->set_rules('password1','New Password','trim|required|min_length[4]|max_length[50]|xss_clean');
      $this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password1]|xss_clean');

      if($this->form_validation->run() == FALSE){
        $data['main_content'] = 'users/reset_password';
        $this->load->view('layout', $data);
      }else{
        if(!$this->User_model->check_pwCode($data['code'], $email)){
          $this->session->set_flashdata('pwCode_notmatch', 'Unsuccessful. Please try again.');
          redirect('users/forget_password');
        }else{
          $enc_new_password = md5($this->input->post('password1'));
          $data = array(
            'password' => $enc_new_password
          );

          if($this->User_model->update_userdata($email, $data)){
            $this->session->set_flashdata('new_password', 'You have successfully reset your password.');
            redirect('users/login');
          }
        }
      }
    }

    /*public function forget_password(){
      $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
      if($this->form_validation->run() == FALSE){
          //Set error
          $data['main_content'] = 'users/forget_password';
          $this->load->view('layout', $data);
      } else {
        $email = $this->input->post('email');
        $clean = $this->security->xss_clean($email);
        $userInfo = $this->User_model->getUserInfoByEmail($clean);

        if(!$userInfo){
          $this->session->set_flashdata('incorrect_email', 'Your email does not exist.');
          redirect('users/login');
        }

        if($userInfo->status != $this->status[1]){
          $this->session->set_flashdata('not_approved', 'Your account is not in approved status');
          redirect('users/login');
        }

        $token = $this->User_model->insertToken($userInfo->id);
        $qstring = $this->base64url_encode($token);
        $url = site_url() . 'main/reset_password/token/' . $qstring;
        $link = '<a href="' . $url . '">' . $url . '</a>';

        $message = '';
        $message .= '<strong>A password reset has been requested for this email account</strong><br>';
        $message .= '<strong>Please click:</strong> ' . $link;
        echo $message; //send this through mail
        exit;
      }
    }*/
}
