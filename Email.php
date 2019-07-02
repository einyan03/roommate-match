<?php
class Email extends CI_Controller{

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
            $config['protocol']='smtp';
            $config['smtp_host']='your host';
            $config['smtp_port']='465';
            $config['smtp_timeout']='30';
            $config['smtp_user']='wall.e.3996@gmail.com';
            $config['smtp_pass']='rickandmorty';
            $config['charset']='utf-8';
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);

            $this->email->from('wall.e.3996@gmail.com', 'noreply');
            $this->email->to('einyan03@gmail.com');

            $this->email->subject('Password Reset');
            $url = site_url() . 'users/reset_password/' . $code;
            $body = "\nPlease click the following link to reset your password:\n\n".$url."\n\n";
            $this->email->message($body);

            if($this->email->send()){
              $this->session->set_flashdata('email_sent', 'Please check your email and follow the instruction to reset password.');
              redirect('users/login');
            }
          }
        }
      }
    }
  }
